<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as FakerFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Используем ручную инициализацию Faker, чтобы обойти проблемы с автозагрузкой
        $faker = $this->faker ?? FakerFactory::create();
        
        $roles = ['user', 'admin', 'worker'];

        return [
            // ПОЛЯ ИЗ ПЕРВОЙ МИГРАЦИИ
            'fullname' => $faker->name, // ОБЯЗАТЕЛЬНОЕ ПОЛЕ (чтобы избежать ошибки 1364)
            'name' => $faker->userName, 
            'email' => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),

            // ПОЛЯ ИЗ ВТОРОЙ МИГРАЦИИ
            'role' => $faker->randomElement($roles),
            'filename' => $faker->optional(0.5)->word . '.jpg', // nullable
            'alt_text' => $faker->optional(0.5)->sentence(3), // nullable
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    /**
     * Состояние для создания администратора
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }
}