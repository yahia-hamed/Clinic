<?php

namespace Database\Factories;

use App\Models\Major;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'email'=>fake()->email(),
            'password'=>fake()->password(),
            'phone'=>fake()->phoneNumber(),
            'city'=>fake()->city(),
            'image'=>fake()->imageUrl(),
            'major_id'=>Major::inRandomorder()->first()?->id
        ];
    }
}
