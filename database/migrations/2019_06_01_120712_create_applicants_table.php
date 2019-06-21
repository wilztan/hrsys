<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('vacancy_id');
            $table->string('name');
            $table->string('phone');
            $table->date('dob');
            $table->string('pob');
            $table->string('marital')->nullable();
            $table->text(' degree_file')->nullable();
            $table->text('transcript_file')->nullable();
            $table->text('photo')->nullable();
            $table->text('ic_file')->nullable();
            $table->text('address');
            $table->string('address_type');
            $table->string('last_education');
            $table->double('gpa')->default(0);
            $table->double('age');
            $table->double('psy_score')->default(-1);
            $table->double('total_work_experience');
            $table->double('medical_exam')->default(-1);
            $table->integer('interview_exam')->default(-1);
            $table->double('first_wp_count')->default(-1);
            $table->double('final_wp_count')->default(-1);
            $table->text('interview_text')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('applicants');
    }
}
