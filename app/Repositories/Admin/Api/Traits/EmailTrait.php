<?php


namespace App\Repositories\Admin\Api\Traits;


use App\Models\Email;
use Illuminate\Support\Facades\DB;

trait EmailTrait
{
    private function createEmail($request , $clientId)
    {
            $email = new Email();
            $email = $this->email($email , $request , 'create' , $clientId );
            DB::transaction(function () use ($email) {
                $email->save();
            });
            return ['Email' => $email];
    }

    private function createEmails($request , $clientId)
    {
        $emailList = $this->emailArray($request['emails']);
        $emails = [];
        foreach ( $emailList as $listItem) {
        $email = new Email();
        $email = $this->email($email , [ 'email' => $listItem ] , 'create' , $clientId );
        DB::transaction(function () use ($email) {
            $email->save();
        });
        array_push($emails , $email);
    }
       return ['Email' => $emails];
    }


    private function updateEmail($request , $id){
        $email = Email::find($id);
        $email = $this->email($email , $request , 'update');
        DB::transaction(function () use ($email) {
            $email->update();
        });
        return  $email;
    }

    private function deleteEmail($id){
        $email = Email::find($id);
        $email->delete();
        return ['message' => 'email Soft Deleted successfully!!' , 'email' => $email];
    }

    private function restoreEmail($id){
    }


    private function email($email  , $data , $mode , $clientId = null ){
        if ($mode === 'create') {
            $email->client_id = $clientId;
        }
        $email->email = $data['email'];
        return $email;
    }

    private function emailArray($data){
        return explode(',' , $data);
    }
}
