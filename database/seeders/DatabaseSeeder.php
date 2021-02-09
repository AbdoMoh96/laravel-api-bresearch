<?php

namespace Database\Seeders;

use App\Models\Clients;
use App\Models\Email;
use Illuminate\Database\Seeder;
use Laravel\Passport\Database\Factories\ClientFactory;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call( ClientTypesSeeder::class);
        $this->call(InstitutionsSeeder::class);
        Clients::factory()->count(40)->has(Email::factory()->count(2))->create();
        $this->call(GroupSeeder::class);
    }
}
