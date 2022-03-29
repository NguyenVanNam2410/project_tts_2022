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
        Schema::create('exam_structs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->tinyInteger('disorder_question');
            $table->tinyInteger('disorder_answer');
            $table->time('time_exam');
            $table->bigInteger('thematic_id');
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
        Schema::dropIfExists('exam_structs');
    }
};
