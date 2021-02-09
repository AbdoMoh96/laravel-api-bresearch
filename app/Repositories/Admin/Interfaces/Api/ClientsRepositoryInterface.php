<?php


namespace App\Repositories\Admin\Interfaces\Api;


interface ClientsRepositoryInterface
{
  public function all();

  public function findById($id);

  public function getEmails($id);

  public function findByName($name);

  public function store($data);

  public function update($data , $id);

  public function joinGroup($data , $id);

  public function showGroups($id);

  public function  delete($id);
}
