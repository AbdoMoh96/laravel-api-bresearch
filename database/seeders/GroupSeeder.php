<?php

namespace Database\Seeders;

use App\Models\Clients;
use App\Models\Groups;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $group1 = new Groups();
         $group1->name = 'Technical Analysis';
         $group1->description = 'random description' ;
         $group1->save();

        $group2 = new Groups();
        $group2->name = 'Beltone-Internal';
        $group2->description = 'random description' ;
        $group2->save();

        $group3 = new Groups();
        $group3->name = 'Research and Brokerage departments';
        $group3->description = 'random description' ;
        $group3->save();

        $group4 = new Groups();
        $group4->name = 'Arabic News';
        $group4->description = 'random description' ;
        $group4->save();



        $clients = Clients::all();
        foreach ($clients as $client){
            $randArr = [ rand(1 , 4) , rand(1 , 4) , rand(1 , 4) , rand(1 , 4) ];
            $client->groups()->sync($randArr);
        }
    }
}
