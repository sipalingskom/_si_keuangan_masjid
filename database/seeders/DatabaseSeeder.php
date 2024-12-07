<?php

namespace Database\Seeders;

use App\Models\RekeningZakat;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $data = RekeningZakat::create([
            'nama' => 'masjid ar rahman',
            'no_rek' => '002123456789',
            'jenis_bank' => 'bri',
        ]);
        // $data->assignRole('super_admin');
    }
}
