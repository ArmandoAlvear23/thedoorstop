<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Door;
use App\Models\Message;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(5)->create();

        // Create test message
        Message::factory(50)->create();

        // Create door categories
        Category::create([
            'name' => 'interior',
        ]);
        Category::create([
            'name' => 'exterior',
        ]);
        Category::create([
            'name' => 'modern',
        ]);
        Category::create([
            'name' => 'traditional',
        ]);
        Category::create([
            'name' => 'rustic',
        ]);
        Category::create([
            'name' => 'craftsman',
        ]);

        // Create doors
        // Door::create([
        //     'name' => '',
        //     'sku' => '',
        //     'img_location' => '',
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
