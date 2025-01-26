<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'nis' => '12209185',
            'name' => 'Muhammad Rasya Yoga F',
            'rombel_id' => '1',
            'rayon_id' => '1'
        ]);
    }
}
