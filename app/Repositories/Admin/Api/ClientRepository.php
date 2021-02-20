<?php


namespace App\Repositories\Admin\Api;


use App\Models\Clients;
use App\Repositories\Admin\Api\Traits\EmailTrait;
use App\Repositories\Admin\Interfaces\Api\ClientsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClientRepository implements ClientsRepositoryInterface
{
    use EmailTrait;

    public function all()
    {
       return Clients::all();
    }

    public function getEmails($id)
    {
        $client = Clients::find($id);
        $emails = $client->emails;
        return [
            'client_name' => $client->first_name.' '.$client->last_name,
            'client_emails' => $emails
        ];
    }

    public function findById($id)
    {
        return Clients::find($id);
    }

    public function findByName($name)
    {
        return Clients::where('first_name' , 'like' , '%'.$name.'%')
                        ->orWhere('last_name' , 'like' , '%'.$name.'%')->get();
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $client = new Clients();
            $client = $this->client($client , $data);
            DB::transaction(function() use ($client){
                $client->save();
            });
            $this->createEmails($data , $client->id);
            DB::commit();
            return ['message' => 'client created successfully!!' , 'client' => $client];
        }catch (\Exception $e){
            DB::rollBack();
            return ['message' => 'DataBase Error!! contact backend team!!'.$e];
        }
    }

    public function update($data , $id)
    {
        DB::beginTransaction();
        try {
            $client = Clients::find($id);
            $client = $this->client($client , $data);
            DB::transaction(function() use ($client){
                $client->update();
            });
            DB::commit();
            return ['message' => 'client Updated successfully!!' , 'client' => $client];
        }catch (\Exception $e){
            DB::rollBack();
            return ['message' => 'DataBase Error!! contact backend team!!'];
        }
    }

    public function joinGroup($data , $id){
       $client = Clients::find($id);
       $client->groups()->sync($data['groups']);
       return ['message' => 'groups joined successfully!!'];
    }

    public function showGroups($id){
        $client = Clients::find($id);
        $client = $client->groups;
        return ['groups' => $client];
    }

    public function delete($id)
    {
        $client = Clients::find($id);
        $client->delete();
        return ['message' => 'client Soft Deleted successfully!!' , 'client' => $client];
    }

    private function client($client , $data){
        $client->first_name = $data['first_name'];
        $client->last_name = $data['last_name'];
        $client->phone_number = $data['phone_number'];
        $client->mobile_number = $data['mobile_number'];
        $client->client_type = $data['client_type'];
        $client->address = $data['address'];
        $client->title = $data['title'];
        $client->country = $data['country'];
        $client->notes = $data['notes'];
        return $client;
    }

}
