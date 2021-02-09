<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Interfaces\Api\ClientTypesRepositoryInterface;
use Illuminate\Http\Request;

class ClientTypeController extends Controller
{
    private $typeRepository;

    public function __construct(ClientTypesRepositoryInterface $types)
    {
        $this->typeRepository = $types;
    }

    public function index()
    {
        $types = $this->typeRepository->all();
        return response()->json($types , 200);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
