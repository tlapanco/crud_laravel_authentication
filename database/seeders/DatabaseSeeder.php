<?php

namespace Database\Seeders;

use App\Models\Prueba;
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
        Prueba::factory(5)->create();
    }
}
