<?php

namespace App\Http\Controllers\Admin\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Admin\Interfaces\Api\InstitutionRepositoryInterface;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    private $InstitutionRepository;

    public function __construct(InstitutionRepositoryInterface $institution)
    {
        $this->InstitutionRepository = $institution;
    }

    public function index()
    {
        return $this->InstitutionRepository->all();
    }


    public function store(Request $request)
    {
        return $this->InstitutionRepository->store($request);
    }


    public function update(Request $request, $id)
    {
       return  $this->InstitutionRepository->update($id , $request);
    }


    public function destroy($id)
    {
        return $this->InstitutionRepository->delete($id);
    }
}
