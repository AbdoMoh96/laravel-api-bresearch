<?php


namespace App\Repositories\Admin\Api;


use App\Models\Email;
use App\Repositories\Admin\Api\Traits\EmailTrait;
use App\Repositories\Admin\Interfaces\Api\ClientEmailRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ClientEmailRepository implements ClientEmailRepositoryInterface
{
    use EmailTrait;

    public function all()
    {
       return ['Emails' => Email::all()->map->format()];
    }

    public function store($clientId , $data){
        DB::beginTransaction();
        try {
             $email =  $this->createEmail($data , $clientId);
             DB::commit();
             return ['Email' => $email];
        }catch (\Exception $e){
            DB::rollBack();
            return ['message' => 'DataBase Error!! contact backend team!!'];
        }
    }

    public function update($id , $data)
    {
        DB::beginTransaction();
        try {
            $email = $this->updateEmail($data , $id);
            DB::commit();
            return ['Email' => $email];
        }catch (\Exception $e){
            DB::rollBack();
            return ['message' => 'DataBase Error!! contact backend team!!'];
        }
    }

    public function delete($id)
    {
       return $this->deleteEmail($id);
    }
}
