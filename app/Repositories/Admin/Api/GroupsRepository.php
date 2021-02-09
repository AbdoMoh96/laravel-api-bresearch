<?php


namespace App\Repositories\Admin\Api;
use App\Models\Groups;
use App\Repositories\Admin\Interfaces\Api\GroupRepositoryInterface;
use Illuminate\Support\Facades\DB;

class GroupsRepository implements GroupRepositoryInterface
{

    public function all()
    {
        return Groups::all();
    }

    public function findById($id)
    {
        $group = Groups::find($id);
        return  $group ;
    }

    public function findByName($name)
    {
        return ['group' => Groups::where('name' , 'like' , '%'.$name.'%')->get() ];
    }

    public function store($data)
    {
        DB::beginTransaction();
        try {
            $group = new Groups();
            $group = $this->group($group , $data);
            DB::transaction(function () use ($group){
                $group->save();
            });
            DB::commit();
            return ['message' => 'group created successfully!!' , 'group' => $group];
        }catch (\Exception $e){
            DB::rollBack();
            return ['message' => 'DataBase Error!! contact backend team!!'];
        }

    }

    public function update($id , $data)
    {
        DB::beginTransaction();
        try {
            $group = Groups::find($id);
            $group = $this->group($group , $data);
            DB::transaction(function () use ($group){
                $group->update();
            });
            DB::commit();
            return ['message' => 'group updated successfully!!' , 'group' => $group];
        }catch (\Exception $e){
            DB::rollBack();
            return ['message' => 'DataBase Error!! contact backend team!!'];
        }
    }

    public function delete($id)
    {
        $group = Groups::find($id);
        $group->delete();
        return ['message' => 'group soft deleted successfully!!' , 'group' => $group];
    }

    private function group($group , $data){
        $group->name =  $data['name'];
        $group->description =  $data['description'];
        return $group;
    }
}
