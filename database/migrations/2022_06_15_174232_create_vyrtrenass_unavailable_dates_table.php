<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vyrtrenass_unavailable_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vyrtrenass_id')->references("id")->on("vyrtrenass");
            $table->date('unavailable_date');
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
        Schema::dropIfExists('vyrtrenass_unavailable_dates');
    }
};
