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
        Schema::create('reservation_question_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_question_id')->constrained();
            $table->foreignId('reservation_id')->constrained();
            $table->string('answer');
            $table->string('comment')->nullable(true);
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
        Schema::dropIfExists('reservation_question_answers');
    }
};
