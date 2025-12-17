<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //User::factory(1)->create();

        User::factory()->create([
            'name' => 'Enelis ',
            'last_name' => 'Urieles Navas',
            'phone' => '3174125008',
            'email' => 'enelisurieles@gmail.com',
            'password' => Hash::make('12345'),
            'rol' => 'admin'
        ]);
    }
}
