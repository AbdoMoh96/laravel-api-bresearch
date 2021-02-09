<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatabaseRealations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::table('', function (Blueprint $table) {
//        });

        Schema::table('clients', function (Blueprint $table) {
            $table->foreign('client_type')
                ->references('id')
                ->on('client_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('institution_id')
                ->references('id')
                ->on('institutions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        Schema::table('clients_email', function (Blueprint $table) {
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


        Schema::table('client_group', function (Blueprint $table) {
            $table->foreign('client_id')
                ->references('id')
                ->on('clients')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('group_id')
                ->references('id')
                ->on('groups')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
