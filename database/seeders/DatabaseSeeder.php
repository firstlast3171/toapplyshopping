<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        //     'username' => 'BhoneThit',
        //     'email' => 'firstlast3171@gmail',
        //     'phone'=>'09683407873',
        //     'password'=>'12345678'
        // ]);
    }
}
