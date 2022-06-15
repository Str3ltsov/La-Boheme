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
        Schema::create('table_unavailable_datetimes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hall_unavailable_date_id')->constrained();
            $table->datetime('unavailable_time');
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
        Schema::dropIfExists('table_unavailable_datetimes');
    }
};
