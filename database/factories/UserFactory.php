<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user_types = [\App\Constants\GlobalConstants::USER_TYPE_FRONTEND,
        \App\Constants\GlobalConstants::USER_TYPE_BACKEND];
        $randomType = array_rand(array_flip($user_types));
        return [
            // 'name' => $this->faker->name(),
            // 'email' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),

            'fname' => $this->faker->name,
            'lname' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'type' => $randomType,
            'country' => $this->faker->country,
            'salary' => $this->faker->unique()->numberBetween($min = 1000, $max = 500000),
            'address' => $this->faker->address,
            'password' => Hash::make('123456'),
            'social_photo' => $this->faker->imageUrl($width = 200, $height = 200),
            'remember_token' => Str::random(10)

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
