<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\CarModel;
use App\Models\Listing;

class ListingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<30; $i++){
            $year_id = mt_rand(1, 10);
            $make_id = mt_rand(1, 6);
            $models = CarModel::where('make_id', $make_id)->pluck('id');
            $model_count = CarModel::where('make_id', $make_id)->count();
            $model_id = $models[mt_rand(0, $model_count-1)];
            $transmissions = ['Automatic', 'Manual'];
            $transmission = $transmissions[mt_rand(0,1)];
            $body_id = mt_rand(1,6);
            $can_test_drive = mt_rand(0,1);
            $can_borrow = mt_rand(0,1);
            $dealer_id = mt_rand(1,10);
            $current_condition_id = mt_rand(1,6);

            $listing = new Listing;
            $listing->year_id = $year_id;
            $listing->make_id = $make_id;
            $listing->model_id = $model_id;
            $listing->transmission = $transmission;
            $listing->body_id = $body_id;
            $listing->can_test_drive = $can_test_drive;
            $listing->can_borrow = $can_borrow;
            $listing->dealer_id = $dealer_id;
            $listing->current_condition_id = $current_condition_id;

            $listing->save();
        }
    }
}
