<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Interfaces\Api\ClientEmailRepositoryInterface;
use Illuminate\Http\Request;

class ClientsEmailController extends Controller
{
    private $emailRepository;

    public function __construct(ClientEmailRepositoryInterface $emailRepo)
    {
        $this->emailRepository = $emailRepo;
    }

    public function index()
    {
        $emails = $this->emailRepository->all();
        return response()->json($emails , 200);
    }



    public function store(Request $request , $id)
    {
        $email = $this->emailRepository->store($id , $request);
        return response()->json($email , 200);
    }


    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $email = $this->emailRepository->update($id , $request);
        return response()->json($email , 200);
    }


    public function destroy($id)
    {
        $email = $this->emailRepository->delete($id);
        return response()->json($email , 200);
    }
}
