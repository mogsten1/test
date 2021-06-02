<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $test_models = array(
            array('make_id' => 1, 'name' => 'Dodge Charger'),
            array('make_id' => 1, 'name' => 'Dodge Challenger'),
            array('make_id' => 2, 'name' => 'Genesis GV80'),
            array('make_id' => 2, 'name' => 'Genesis G80'),
            array('make_id' => 2, 'name' => 'Genesis G70'),
            array('make_id' => 3, 'name' => 'Hyundai Tucson'),
            array('make_id' => 3, 'name' => 'Hyundai Kona'),
            array('make_id' => 4, 'name' => 'Kia Sportage'),
            array('make_id' => 5, 'name' => 'Land Rover Defender'),
            array('make_id' => 5, 'name' => 'Land Rover Discovery'),
            array('make_id' => 6, 'name' => 'Lexus RX'),
            array('make_id' => 6, 'name' => 'Lexus LS')
        );

        foreach($test_models as $test_model){
            DB::table('models')->insert([
                'make_id'   => $test_model['make_id'],
                'name'      => $test_model['name']
            ]);
        }
    }
}
