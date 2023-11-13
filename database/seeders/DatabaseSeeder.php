<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Door;
use App\Models\Message;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Promotion;
use App\Models\Testimonial;
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
            'name' => 'hero',
            'description' => 'home page banner pictures'
        ]);

        Promotion::create([
            'name' => 'home',
            'description' => 'home page door list'
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
            'img_location' => 'storage/doors/3x4rYhQu4gtXG3HpuIUaiFJ5LGQyvtn5R9uI2qdp.png',
        ]);
        Door::create([
            'name' => 'Traditional Door 1',
            'sku' => 'traddoor1',
            'img_location' => 'storage/doors/ZXoWOAjjVgzZdHZM1TItTlF1F8NbIgK0qpdZBODG.png',
        ]);
        Door::create([
            'name' => 'Rustic Door 1',
            'sku' => 'rusticdoor1',
            'img_location' => 'storage/doors/4u1V6LRFmBvtt3rfhHIKTr81myIV2brw2UglbgVX.png',
        ]);
        Door::create([
            'name' => 'Craftsman Door 1',
            'sku' => 'craftdoor1',
            'img_location' => 'storage/doors/zUCW08nZyOArsR7TdilF2C1ogNzIFId5pdWAxIXP.png',
        ]);

        Testimonial::create([
            'name' => 'Michael A.',
            'testimonial' => 'Customer services was excellent they where very understanding of our delay and kept door for six months due to a hiccup with so called contractor out of Los Fresnos. Thank you The Door Stop for your wonderful service we appreciate I will recommend every to you.'
        ]);

        Testimonial::create([
            'name' => 'Christopher S.',
            'testimonial' => 'Walked in and they had the door of my dreams waiting. Amazing service and the person they recommended for install was not only fast, but a quality install as well. Highly recommend.'
        ]);

        Testimonial::create([
            'name' => 'Patrick',
            'testimonial' => "About 2 weeks ago I purchased all my doors here for a house I’m having built in Los Fresnos and the customer service was outstanding! The quality and craftsmanship of the doors really does speak for itself and the prices were even better then other vendors I had looked at. Highly recommend and I will definitely be back."
        ]);

        Testimonial::create([
            'name' => 'Adolfo R.',
            'testimonial' => "I have bought multiple house packages from this company for several years without any disappointments . The company never fails to provide the merchandise faster than other door companys throughout the valley . The prices are fair for the quality doors they sell . I won’t be going anywhere else for the remainder of my time working in the residential construction industry."
        ]);

        Testimonial::create([
            'name' => 'Rosie O.',
            'testimonial' => "We are very satisfied with our purchase from The Door Stop.  Thank you Mr. Flores for  providing  great customer service and guiding us every step of the way until we  found the perfect door for our house. If you are in need of a door , The Door Stop is your place to go. They have a large variety of beautiful doors to choose from , you will not be disappointed."
        ]);

        Testimonial::create([
            'name' => 'Michael F.',
            'testimonial' => "The business and staff are extremely professional and deliver great products and service. They are the ONLY place that I will do business with in the valley. 5 stars."
        ]);

        Testimonial::create([
            'name' => 'Jose G.',
            'testimonial' => 'Great selection of quality interior and exterior doors at a great price. Very pleased with my purchase.'
        ]);

        Testimonial::create([
            'name' => 'Dionne W.',
            'testimonial' => 'The staff was very professional and informative. I look forward to doing business with them.'
        ]);

        Testimonial::create([
            'name' => 'Patricia M.',
            'testimonial' => 'Great store with lots of choices. Excellent quality and prices.'
        ]);

        Testimonial::create([
            'name' => 'Arturo T.',
            'testimonial' => 'Very knowledgeable personnel and reasonable prices.'
        ]);

        Testimonial::create([
            'name' => 'Rodolfo P.',
            'testimonial' => 'Great service, reasonable prices and exceptional quality.'
        ]);

        Testimonial::create([
            'name' => 'Adelita G.',
            'testimonial' => 'After looking in several places, we found exactly what we needed there.'
        ]);
    }
}
