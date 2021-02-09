<?php


namespace App\Repositories\Admin\Api;


use App\Models\Institutions;
use App\Repositories\Admin\Interfaces\Api\InstitutionRepositoryInterface;
use Illuminate\Support\Facades\DB;

class InstitutionsRepository implements InstitutionRepositoryInterface
{

    public function all()
    {
        $institutions = Institutions::all();
        return response()->json($institutions , 200);
    }

    public function findById($id)
    {
       return Institutions::find($id);
    }

    public function findByName($name)
    {
      return Institutions::where('name' , 'like' , '%'.$name.'%')
          ->orWhere('phone_number' , 'like' , '%'.$name.'%')->get();
    }

    public function store($data)
    {
        DB::beginTransaction();
        try{
            $institution = new Institutions();

            $institution = $this->institution($institution , $data);

            DB::transaction(function () use ($institution) {
                $institution->save();
            });
            DB::commit();
            return  response()->json(['message, institution created successfully!!' => $institution] , 200);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['something went wrong!!'] , 200);
        }
    }

    public function update($id , $data)
    {
        DB::beginTransaction();
        try{
            $institution = Institutions::find($id);
            $institution = $this->institution($institution , $data);
            DB::transaction(function () use ($institution) {
                $institution->update();
            });
            DB::commit();
            return response()->json(['message, institution updated successfully!!' => $institution] , 200);
        }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['something went wrong!!'] , 200);
        }
    }

    public function delete($id)
    {
          DB::beginTransaction();
        try {
              $institution = Institutions::find($id);
              $institution->delete();
              DB::commit();
            return response()->json(['message, institution deleted successfully!!' => $institution] , 200);
            }catch (\Exception $e){
            DB::rollBack();
            return response()->json(['something went wrong!!'] , 200);
            }
    }

    private function institution($institution , $data){
        $institution->name = $data['name'];
        $institution->phone_number = $data['phone_number'];
        $institution->notes = $data['notes'];
        $institution->address = $data['address'];
        return $institution;
    }
}
