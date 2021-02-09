<?php

namespace App\Http\Controllers\Admin\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Api\ClientsStoreRequest;
use App\Http\Requests\Admin\Api\ClientsUpdateRequest;
use App\Repositories\Admin\Api\Traits\EmailTrait;
use App\Repositories\Admin\Interfaces\Api\ClientsRepositoryInterface;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    private $ClientRepository;

   public function __construct(ClientsRepositoryInterface $clientRepo)
   {
       $this->ClientRepository = $clientRepo;
   }

    public function index()
    {
        $clients = $this->ClientRepository->all();
        return response()->json($clients , 200);
    }



    public function store(ClientsStoreRequest $request)
    {
        $client = $this->ClientRepository->store($request);
        return response()->json( $client , 200);
    }



    public function show($id)
    {
        $client = $this->ClientRepository->findById($id);
        return response()->json($client  , 200);
    }

    public function showByName($name){
        $clients = $this->ClientRepository->findByName($name);
        return response()->json($clients , 200);
    }

    public function getEmails($id){
        $emails = $this->ClientRepository->getEmails($id);
        return response()->json($emails , 200);
    }

    public function update(ClientsUpdateRequest $request, $id)
    {
        $client = $this->ClientRepository->update($request , $id);
        return response()->json( $client , 200);
    }

    public function joinGroup(Request $request , $id){
        $client = $this->ClientRepository->joinGroup($request , $id);
        return response()->json( $client , 200);
    }

    public function showGroups($id){
        $client = $this->ClientRepository->showGroups($id);
        return response()->json( $client , 200);
    }


    public function destroy($id)
    {
        $client = $this->ClientRepository->delete($id);
        return response()->json( $client , 200);
    }
}
