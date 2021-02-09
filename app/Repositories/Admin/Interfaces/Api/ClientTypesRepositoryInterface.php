<?php


namespace App\Repositories\Admin\Interfaces\Api;


interface ClientTypesRepositoryInterface
{
    public function all();

    public function findById();

    public function findByName();

    public function store();

    public function update();

    public function delete();
}
