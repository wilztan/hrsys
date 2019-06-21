<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsychoTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('psycho_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text("question");
            $table->string("answer_a");
            $table->string("answer_b");
            $table->string("answer_c");
            $table->string("answer_d");
            $table->string("correct_answer");
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
        Schema::dropIfExists('psycho_tests');
    }
}
