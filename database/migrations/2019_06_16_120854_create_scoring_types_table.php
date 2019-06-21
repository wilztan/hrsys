<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoringTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoring_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("type"); // type COST, BENEFIT
            $table->string("result_type")->default("EQUAL"); // EQUAL, BELOW
            $table->string('execution_type')->default('DEFAULT'); // DEFAULT, FINAL
            $table->string("name");
            $table->integer("weight");
            $table->boolean("active")->default(true);
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
        Schema::dropIfExists('scoring_types');
    }
}
