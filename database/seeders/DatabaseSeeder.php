<?php

namespace Database\Seeders;

use App\Models\Condition;
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
        $this->call([
            YearSeeder::class,
            MakeSeeder::class,
            ModelSeeder::class,
            BodySeeder::class,
            CheckTypeSeeder::class,
            ConditionSeeder::class,
            DealerSeeder::class
        ]);
    }
}
