<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Types extends Model
{
    use HasFactory , SoftDeletes;
    protected $table = 'client_types';


    public function clients(){
        return $this->hasMany(Clients::class , 'client_type' , 'id');
    }
}
