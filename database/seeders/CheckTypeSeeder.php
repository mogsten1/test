<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CheckTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $check_types = ['loan', 'test_drive', 'return', 'sell'];

        foreach($check_types as $check_type){
            DB::table('check_types')->insert([
                'name' => $check_type,
            ]);
        }
    }
}
