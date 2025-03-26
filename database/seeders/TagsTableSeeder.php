<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'delicate'],
            ['name' => 'urgent'],
            ['name' => 'large'],
            ['name' => 'small'],
            ['name' => 'dry-clean'],
        ];

        DB::table('tags')->insert($tags);
    }
}

