<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_makes = ['Dodge', 'Genesis', 'Hyundai', 'Kia', 'Land Rover', 'Lexus'];

        foreach($test_makes as $test_make){
            DB::table('makes')->insert([
                'name' => $test_make,
            ]);
        }
    }
}
