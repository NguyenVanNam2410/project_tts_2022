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
        Schema::create('question_structs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('point_question');
            $table->tinyInteger('sa_count');
            $table->tinyInteger('ma_count');
            $table->tinyInteger('fa_count');
            $table->bigInteger('exam_struct_id');
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
        Schema::dropIfExists('question_structs');
    }
};
