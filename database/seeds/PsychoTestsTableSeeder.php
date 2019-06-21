<?php

use Illuminate\Database\Seeder;
use App\PsychoTest;

class PsychoTestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PsychoTest::create([
            'question'=>'Berapa 1 + 1 ?',
            'answer_a'=>'1',
            'answer_b'=>'2',
            'answer_c'=>'3',
            'answer_d'=>'4',
            'correct_answer'=>'B'
        ]);


        PsychoTest::create([
            'question'=>'Berapa 1 + 2 ?',
            'answer_a'=>'1',
            'answer_b'=>'2',
            'answer_c'=>'3',
            'answer_d'=>'4',
            'correct_answer'=>'C'
        ]);


        PsychoTest::create([
            'question'=>'Berapa 3 + 1 ?',
            'answer_a'=>'1',
            'answer_b'=>'2',
            'answer_c'=>'3',
            'answer_d'=>'4',
            'correct_answer'=>'D'
        ]);


        PsychoTest::create([
            'question'=>'Berapa 9 + 1 ?',
            'answer_a'=>'10',
            'answer_b'=>'2',
            'answer_c'=>'3',
            'answer_d'=>'4',
            'correct_answer'=>'A'
        ]);


        PsychoTest::create([
            'question'=>'Berapa 1 + 1 ?',
            'answer_a'=>'1',
            'answer_b'=>'2',
            'answer_c'=>'3',
            'answer_d'=>'4',
            'correct_answer'=>'B'
        ]);


        PsychoTest::create([
            'question'=>'Berapa 1 + 1 ?',
            'answer_a'=>'1',
            'answer_b'=>'2',
            'answer_c'=>'3',
            'answer_d'=>'4',
            'correct_answer'=>'B'
        ]);
    }
}
