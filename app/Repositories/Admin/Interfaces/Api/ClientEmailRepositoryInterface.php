<?php


namespace App\Repositories\Admin\Interfaces\Api;


interface ClientEmailRepositoryInterface
{
    public function all();

    public function store($clientId , $data);

    public function update($id , $data);

    public function  delete($id);
}
