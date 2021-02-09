<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clients extends Model
{
    use SoftDeletes , HasFactory;

    protected $table = 'clients';

    public function emails(){
       return $this->hasMany(Email::class , 'client_id' , 'id');
    }

    public function groups(){
        return $this->belongsToMany(Groups::class , 'client_group' , 'client_id' , 'group_id');
    }

    public function institution(){
        return $this->belongsTo(Institutions::class , 'institution_id' , 'id' );
    }

    public function types(){
        return $this->belongsTo(Types::class , 'client_type' , 'id');
    }
}
