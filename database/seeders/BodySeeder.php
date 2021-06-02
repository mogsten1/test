<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BodySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_bodies = array('SEDAN', 'COUPE', 'SPORTS CAR', 'STATION WAGON', 'HATCHBACK', 'CONVERTIBLE');

        foreach($test_bodies as $test_body){
            DB::table('bodies')->insert([
                'name'      => $test_body
            ]);
        }
    }
}
