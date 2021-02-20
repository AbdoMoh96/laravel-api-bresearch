<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('first_name' , 50);
            $table->string('last_name' , 100);
            $table->string('phone_number' , 200);
            $table->string('mobile_number' , 200);
            $table->integer('client_type' , false , true)->nullable();
            $table->text('address');
            $table->string('title' , 250)->nullable();
            $table->string('country' , 250);
            $table->text('notes')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
