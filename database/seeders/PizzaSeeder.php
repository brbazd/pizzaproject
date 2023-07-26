<?php

namespace Database\Seeders;

use App\Models\Pizza;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pizza::factory(50)->create();
    }
}
