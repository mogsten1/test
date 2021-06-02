<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_conditions = ['Excellent', 'Very Good', 'Good', 'Restorable', 'Parts Car'];

        foreach($test_conditions as $condition){
            DB::table('conditions')->insert([
                'description' => $condition
            ]);
        }
    }
}
