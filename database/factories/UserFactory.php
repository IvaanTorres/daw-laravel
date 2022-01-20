<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class; //*Specify that it's a factory of the model of User

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $login = $this->faker->name();
        return [
            'login' => $login,
            'password' => bcrypt($login),
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
