<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        User::factory(5)->create();

        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);
    
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design'
        ]);
    
        Category::create([
            'name' => 'Personal',
            'slug' => 'personal'
        ]);

        post::factory(20)->create();
    }
}
