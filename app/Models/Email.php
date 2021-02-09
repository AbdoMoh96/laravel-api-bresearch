<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes , HasFactory;
    protected $table = 'clients_email';

    public function format(){
       $client = $this->client->first_name.' '.$this->client->last_name;
        return [
           'Email_Id' => $this->id,
            'Client_id' => $this->client_id,
            'Client_Name' => $client,
            'Client_Email' => $this->email,
            'Creation_Date' => $this->created_at->format('d M Y')
        ];
    }

    public function client(){
      return  $this->belongsTo(Clients::class , 'client_id' , 'id');
    }
}
