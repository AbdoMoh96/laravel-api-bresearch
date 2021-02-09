<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Interfaces\Api\GroupRepositoryInterface;
use Illuminate\Http\Request;

class GroupsController extends Controller
{

    private $groupRepository;

    public function __construct(GroupRepositoryInterface $groupRepo)
    {
        $this->groupRepository = $groupRepo;
    }

    public function index()
    {
        $groups = $this->groupRepository->all();
        return response()->json($groups , 200);
    }


    public function store(Request $request)
    {
        $group = $this->groupRepository->store($request);
        return response()->json($group , 200);
    }


    public function show($id)
    {
        $group = $this->groupRepository->findById($id);
        return response()->json($group , 200);
    }

    public function showByName($name)
    {
        $group = $this->groupRepository->findByName($name);
        return response()->json($group , 200);
    }




    public function update(Request $request, $id)
    {
        $group = $this->groupRepository->update($id , $request);
        return response()->json($group , 200);
    }


    public function destroy($id)
    {
        $group = $this->groupRepository->delete($id);
        return response()->json($group , 200);
    }
}
