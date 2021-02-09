<?php


namespace App\Repositories\Admin\Api;


use App\Models\Types;
use App\Repositories\Admin\Interfaces\Api\ClientTypesRepositoryInterface;

class ClientTypesRepository implements ClientTypesRepositoryInterface
{

    public function all()
    {
        return Types::all();
    }

    public function findById()
    {
        // TODO: Implement findById() method.
    }

    public function findByName()
    {
        // TODO: Implement findByName() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }
}
