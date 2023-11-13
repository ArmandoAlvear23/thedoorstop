<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Door;
use App\Models\Message;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Promotion;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //\App\Models\User::factory(5)->create();

        //Create Promotion records
        Promotion::create([
            'name' => 'hero'
        ]);

        Promotion::created([
            'name' => 'home'
        ]);

        // Create test message
        Message::factory(10)->create();

        // Create category classifications
        Classification::create([
            'name' => 'type'
        ]);

        Classification::create([
            'name' => 'style'
        ]);

        Classification::create([
            'name' => 'material'
        ]);

        // Create door categories
        Category::create([
            'name' => 'interior',
            'classification_id' => 1
        ]);
        Category::create([
            'name' => 'exterior',
            'classification_id' => 1
        ]);
        Category::create([
            'name' => 'modern',
            'classification_id' => 2
        ]);
        Category::create([
            'name' => 'traditional',
            'classification_id' => 2
        ]);
        Category::create([
            'name' => 'rustic',
            'classification_id' => 2
        ]);
        Category::create([
            'name' => 'craftsman',
            'classification_id' => 2
        ]);
        Category::create([
            'name' => 'wood',
            'classification_id' => 3
        ]);
        Category::create([
            'name' => 'metal',
            'classification_id' => 3
        ]);
        Category::create([
            'name' => 'fiberglass',
            'classification_id' => 3
        ]);

        //Create doors
        Door::create([
            'name' => 'Modern Door 1',
            'sku' => 'moderndoor1',
            'img_location' => 'storage/doors/yaasZgAjWUgCxOvWRzXOmWYFpSENPQHfzkPkYVwd.png',
        ]);
        Door::create([
            'name' => 'Traditional Door 1',
            'sku' => 'traddoor1',
            'img_location' => 'storage/doors/hcozZednoKvGmwpMTGOkHNenRfLRmcXbYJOLfdZW.png',
        ]);
        Door::create([
            'name' => 'Rustic Door 1',
            'sku' => 'rusticdoor1',
            'img_location' => 'storage/doors/IueMURBmqrIvJQvpDzjOrfZLIOzQnYCrUYvRLxmX.png',
        ]);
        Door::create([
            'name' => 'Craftsman Door 1',
            'sku' => 'craftdoor1',
            'img_location' => 'storage/doors/ZHTOzbzQLNFzBXWJPkFOAqOlZmKhUGCojQfDkFVG.png',
        ]);
    }
}
