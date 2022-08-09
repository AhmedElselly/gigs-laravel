<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        Listing::factory(6)->create();

        // Listing::create([
        //     'title' => 'Laravel Senior developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Cairo, Egypt',
        //     'email' => 'ahmedmern07@gmail.com',
        //     'website' => 'www.example.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        //         Pellentesque lobortis ex eu nisi congue ultrices. Pellentesque dignissim erat sit amet sapien viverra ullamcorper.
        //         Phasellus nec neque euismod, iaculis arcu a, consequat sem.'
        // ]);

        // Listing::create([
        //     'title' => 'Full-Stack developer',
        //     'tags' => 'Python, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Cairo, Egypt',
        //     'email' => 'ramy@gmail.com',
        //     'website' => 'www.example.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.
        //         Pellentesque lobortis ex eu nisi congue ultrices. Pellentesque dignissim erat sit amet sapien viverra ullamcorper.
        //         Phasellus nec neque euismod, iaculis arcu a, consequat sem.'
        // ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
