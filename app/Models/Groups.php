<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Groups extends Model
{
    use SoftDeletes;
    protected $table = 'groups';

    public function clients(){
        return $this->belongsToMany(Clients::class , 'client_group' , 'group_id' , 'client_id');
    }
}
