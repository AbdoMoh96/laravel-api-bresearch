<?php

namespace Database\Seeders;

use App\Models\Institutions;
use Illuminate\Database\Seeder;
use Faker\Factory;
class InstitutionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $institution1 = new Institutions();
        $institution1->name = 'Bank Misr' ;
        $institution1->phone_number = $faker->phoneNumber;
        $institution1->notes = $faker->paragraph;
        $institution1->address = $faker->paragraph;
        $institution1->save();

        $institution2 = new Institutions();
        $institution2->name = 'Beltone AssetManagement' ;
        $institution2->phone_number = $faker->phoneNumber;
        $institution2->notes = $faker->paragraph;
        $institution2->address = $faker->paragraph;
        $institution2->save();

        $institution3 = new Institutions();
        $institution3->name = 'CIB' ;
        $institution3->phone_number = $faker->phoneNumber;
        $institution3->notes = $faker->paragraph;
        $institution3->address = $faker->paragraph;
        $institution3->save();

        $institution4 = new Institutions();
        $institution4->name = 'UAE Global Resarch' ;
        $institution4->phone_number = $faker->phoneNumber;
        $institution4->notes = $faker->paragraph;
        $institution4->address = $faker->paragraph;
        $institution4->save();
    }
}
