<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Создание 10 случайных пользователей через фабрику
        User::factory(10)->create(); 

        // 2. Создание тестового пользователя (админа)
        // ВАЖНО: Добавлено обязательное поле 'fullname' и 'role'
        User::factory()->create([
            'fullname' => 'Administrator User', // <--- ДОБАВЛЕНО
            'name' => 'Admin',
            'email' => 'admin@inspa.com',
            'role' => 'admin', // Задаем роль явно
        ]);
        
        // 3. Создание обычного тестового пользователя
        User::factory()->create([
            'fullname' => 'Test User', // <--- ДОБАВЛЕНО
            'name' => 'Test',
            'email' => 'test@example.com',
            'role' => 'user', // Задаем роль явно
        ]);
    }
}