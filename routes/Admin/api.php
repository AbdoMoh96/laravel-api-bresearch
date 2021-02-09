<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Api\ClientsController;
use App\Http\Controllers\Admin\Api\GroupsController;
use App\Http\Controllers\Admin\Api\ClientsEmailController;
use App\Http\Controllers\Admin\Api\ClientTypeController;
use App\Http\Controllers\Admin\Api\InstitutionController;
/*******************************************
 **************=Admin===routs=***************
 *******************************************/


/*<===============Client=Routs==================>*/
  Route::resource('clients' , ClientsController::class)->except( 'create' , 'edit' );
  Route::get('clients/name/{name}' , [ClientsController::class , 'showByName'] )->name('clients.name.search');
  Route::get('clients/emails/{id}' , [ClientsController::class , 'getEmails'] )->name('clients.emails');
  Route::post('clients/joingroup/{id}' , [ClientsController::class , 'joinGroup'] )->name('clients.join.groups');
  Route::get('clients/showgroups/{id}' , [ClientsController::class , 'showGroups'] )->name('clients.show.groups');
/*<==============end=Client=Routs==================>*/




/*<===============Client=email=Routs==================>*/
 Route::get('emails' , [ClientsEmailController::class , 'index'] )->name('emails.index');
 Route::post('emails/{id}' , [ClientsEmailController::class , 'store'])->name('emails.store');
 Route::put('emails/{id}' , [ClientsEmailController::class , 'update'])->name('emails.store');
 Route::delete('emails/{id}' , [ClientsEmailController::class , 'destroy'])->name('emails.delete');
/*<==============end=Client=email=Routs==================>*/


/*<===============Group=Routs==================>*/
 Route::resource('groups' , GroupsController::class)->except('create' , 'edit');
 Route::get('groups/name/{name}' , [GroupsController::class , 'showByName'] )->name('groups.name.search');
/*<==============end=Group=Routs==================>*/

/*<===============Client=Types=Routs==================>*/
 Route::resource('types' , ClientTypeController::class)->except('create' , 'edit');
/*<===========end=Client=Types=Routs==================>*/

/*<===============Institutions=Routs==================>*/
 Route::resource('institutions' , InstitutionController::class)->except('create' , 'edit');
/*<===========end=Institutions=Routs==================>*/
