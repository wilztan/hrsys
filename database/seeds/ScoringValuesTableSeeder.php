<?php

use Illuminate\Database\Seeder;
use App\ScoringValue;

class ScoringValuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ScoringValue::create([
            'type_id'=>'1',
            'value'=>'SLTA',
            'score'=>'1',
        ]);

        ScoringValue::create([
            'type_id'=>'1',
            'value'=>'D1',
            'score'=>'2',
        ]);

        ScoringValue::create([
            'type_id'=>'1',
            'value'=>'D3',
            'score'=>'3',
        ]);

        ScoringValue::create([
            'type_id'=>'1',
            'value'=>'S1',
            'score'=>'4',
        ]);

        ScoringValue::create([
            'type_id'=>'1',
            'value'=>'S2',
            'score'=>'5',
        ]);

        ScoringValue::create([
            'type_id'=>'2',
            'value'=>'1',
            'score'=>'1',
        ]);

        ScoringValue::create([
            'type_id'=>'2',
            'value'=>'2',
            'score'=>'2',
        ]);

        ScoringValue::create([
            'type_id'=>'2',
            'value'=>'2.1',
            'score'=>'3',
        ]);

        ScoringValue::create([
            'type_id'=>'2',
            'value'=>'3.1',
            'score'=>'4',
        ]);



        ScoringValue::create([
            'type_id'=>'3',
            'value'=>'18',
            'score'=>'0',
        ]);

        ScoringValue::create([
            'type_id'=>'3',
            'value'=>'20',
            'score'=>'1',
        ]);

        ScoringValue::create([
            'type_id'=>'3',
            'value'=>'22',
            'score'=>'2',
        ]);

        ScoringValue::create([
            'type_id'=>'3',
            'value'=>'24',
            'score'=>'3',
        ]);

        ScoringValue::create([
            'type_id'=>'3',
            'value'=>'26',
            'score'=>'4',
        ]);

        ScoringValue::create([
            'type_id'=>'4',
            'value'=>'2.75',
            'score'=>'0',
        ]);
        ScoringValue::create([
            'type_id'=>'4',
            'value'=>'3.00',
            'score'=>'1',
        ]);
        ScoringValue::create([
            'type_id'=>'4',
            'value'=>'3.30',
            'score'=>'2',
        ]);
        ScoringValue::create([
            'type_id'=>'4',
            'value'=>'3.60',
            'score'=>'3',
        ]);
        ScoringValue::create([
            'type_id'=>'4',
            'value'=>'3.90',
            'score'=>'4',
        ]);


        ScoringValue::create([
            'type_id'=>'5',
            'value'=>'50',
            'score'=>'0',
        ]);
        ScoringValue::create([
            'type_id'=>'5',
            'value'=>'60',
            'score'=>'1',
        ]);
        ScoringValue::create([
            'type_id'=>'5',
            'value'=>'70',
            'score'=>'2',
        ]);
        ScoringValue::create([
            'type_id'=>'5',
            'value'=>'80',
            'score'=>'3',
        ]);
        ScoringValue::create([
            'type_id'=>'5',
            'value'=>'90',
            'score'=>'4',
        ]);


        ScoringValue::create([
            'type_id'=>'6',
            'value'=>'50',
            'score'=>'0',
        ]);
        ScoringValue::create([
            'type_id'=>'6',
            'value'=>'60',
            'score'=>'1',
        ]);
        ScoringValue::create([
            'type_id'=>'6',
            'value'=>'70',
            'score'=>'2',
        ]);
        ScoringValue::create([
            'type_id'=>'6',
            'value'=>'80',
            'score'=>'3',
        ]);
        ScoringValue::create([
            'type_id'=>'6',
            'value'=>'90',
            'score'=>'4',
        ]);


        ScoringValue::create([
            'type_id'=>'7',
            'value'=>'1',
            'score'=>'1',
        ]);
        ScoringValue::create([
            'type_id'=>'7',
            'value'=>'2',
            'score'=>'2',
        ]);
        ScoringValue::create([
            'type_id'=>'7',
            'value'=>'3',
            'score'=>'3',
        ]);



    }
}
