<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LaundriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'user_name' => 'Taro',
                'role' => 'student',
                'pickup_code' => 123456,
                'units' => 2,
                'status' => 'completed',
                'created_at' => Carbon::now()->subDays(3),
                'updated_at' => Carbon::now()->subDays(2),
                'price' => 4.00,
            ],
            [
                'user_name' => 'Hanako',
                'role' => 'teacher',
                'pickup_code' => 654321,
                'units' => 5,
                'status' => 'pending',
                'created_at' => Carbon::now()->subDays(2),
                'updated_at' => Carbon::now()->subDays(1),
                'price' => 10.00,
            ],
            [
                'user_name' => 'Ken',
                'role' => 'student',
                'pickup_code' => 112233,
                'units' => 1,
                'status' => 'completed',
                'created_at' => Carbon::now()->subDay(),
                'updated_at' => Carbon::now(),
                'price' => 4.00,
            ],
            [
                'user_name' => 'Yuki',
                'role' => 'teacher',
                'pickup_code' => 332211,
                'units' => 3,
                'status' => 'pending',
                'created_at' => Carbon::now()->subDays(4),
                'updated_at' => Carbon::now()->subDays(3),
                'price' => 6.00,
            ],
            [
                'user_name' => 'Sakura',
                'role' => 'student',
                'pickup_code' => 445566,
                'units' => 4,
                'status' => 'completed',
                'created_at' => Carbon::now()->subDays(5),
                'updated_at' => Carbon::now()->subDays(4),
                'price' => 8.00,
            ],
            [
                'user_name' => 'Takeshi',
                'role' => 'teacher',
                'pickup_code' => 778899,
                'units' => 2,
                'status' => 'pending',
                'created_at' => Carbon::now()->subDays(6),
                'updated_at' => Carbon::now()->subDays(5),
                'price' => 4.00,
            ],
        ];

        DB::table('laundries')->insert($data);
    }
}
