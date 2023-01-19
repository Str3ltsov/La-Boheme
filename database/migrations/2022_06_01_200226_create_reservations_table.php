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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->datetime('start_datetime');
            $table->datetime('end_datetime')->nullable(true);
            $table->integer('number_of_people');
            $table->double('rating')->nullable(true);
            $table->foreignId('reservation_type_id')->constrained();
            $table->foreignId("fiztren_id")->references("id")->on("fiztren");
            $table->foreignId("vyrtren_id")->references("id")->on("vyrtren");
            $table->foreignId("vyrtrenass_id")->references("id")->on("vyrtrenass");
//            $table->foreignId("vyrtren_id")->constrained();
//            $table->foreignId("vyrtrenass_id")->constrained();

//            $table->foreignId('table_id')->nullable(true)->constrained();
//            $table->foreignId('hall_id')->nullable(true)->constrained();
            $table->foreignId('client_id')->constrained();
            $table->foreignId('reservation_status_id')->nullable(true)->constrained();
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
        Schema::dropIfExists('reservations');
    }
};
