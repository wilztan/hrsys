<?php

use Illuminate\Database\Seeder;
use App\ScoringType;

class ScoringTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScoringType::create([
            'id'=>1,
            'name'=>'last_education',
            'type'=>'BENEFIT',
            'result_type'=>'EQUAL',
            'execution_type'=>'DEFAULT',
            'weight'=>'5'
        ]);


        ScoringType::create([
            'id'=>2,
            'name'=>'total_work_experience',
            'type'=>'BENEFIT',
            'result_type'=>'BELOW',
            'execution_type'=>'DEFAULT',
            'weight'=>'5'
        ]);


        ScoringType::create([
            'id'=>3,
            'name'=>'age',
            'type'=>'BENEFIT',
            'result_type'=>'BELOW',
            'execution_type'=>'DEFAULT',
            'weight'=>'5'
        ]);


        ScoringType::create([
            'id'=>4,
            'name'=>'gpa',
            'type'=>'BENEFIT',
            'result_type'=>'BELOW',
            'execution_type'=>'DEFAULT',
            'weight'=>'5'
        ]);


        ScoringType::create([
            'id'=>5,
            'name'=>'psy_score',
            'type'=>'BENEFIT',
            'result_type'=>'BELOW',
            'execution_type'=>'DEFAULT',
            'weight'=>'5'
        ]);


        ScoringType::create([
            'id'=>6,
            'name'=>'medical_exam',
            'type'=>'BENEFIT',
            'result_type'=>'BELOW',
            'execution_type'=>'FINAL',
            'weight'=>'5'
        ]);


        ScoringType::create([
            'id'=>7,
            'name'=>'interview_exam',
            'type'=>'BENEFIT',
            'result_type'=>'EQUAL',
            'execution_type'=>'FINAL',
            'weight'=>'3'
        ]);
    }
}
