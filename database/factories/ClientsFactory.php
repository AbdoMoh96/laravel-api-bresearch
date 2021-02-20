<?php

namespace Database\Factories;

use App\Models\Clients;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Clients::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'phone_number' => $this->faker->phoneNumber,
            'mobile_number' => $this->faker->phoneNumber,
            'client_type' => $this->faker->numberBetween(1 , 2),
            'address' => $this->faker->address,
            'title' => $this->faker->jobTitle,
            'country' => $this->faker->country,
            'notes' => $this->faker->paragraph,
        ];
    }
}
