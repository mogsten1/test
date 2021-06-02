<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('make_id');
            $table->unsignedBigInteger('model_id');
            $table->enum('transmission', ['Automatic', 'Manual']);
            $table->unsignedBigInteger('body_id');
            $table->unsignedBigInteger('last_transaction_id')->nullable();
            $table->boolean('can_test_drive')->default(0);
            $table->boolean('can_borrow')->default(0);
            $table->unsignedBigInteger('dealer_id');
            $table->unsignedBigInteger('current_condition_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('listings');
    }
}
