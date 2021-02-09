<?php

namespace App\Models;

use Database\Seeders\ClientTypesSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Institutions extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'institutions';



    public function clients(){
        return $this->hasMany(Clients::class , 'institution_id' , 'id');
    }
}
