<?php


namespace App\Repositories\Admin\Interfaces\Api;


interface GroupRepositoryInterface
{
    public function all();

    public function findById($id);

    public function findByName($name);

    public function store($data);

    public function update($id , $data);

    public function  delete($id);
}
