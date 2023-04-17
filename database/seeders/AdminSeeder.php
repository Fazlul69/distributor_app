<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userData = [
            [
            'name' => 'Bismillah',
            'email' => 'store@bismillahtraders.com',
            'password' => Hash::make('12345678'),
            'role' => '1',
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => Hash::make('12345678'),
                'role' => '2',
            ],
        ];
        foreach ($userData as $key => $val) {
            User::create($val);
        }
    }
}
