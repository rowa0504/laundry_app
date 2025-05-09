<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LaundrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Laundry::factory(10)->create()->each(function ($laundry) {
            $laundry->tags()->attach(\App\Models\Tag::all()->random(2));
        });
    }
}
