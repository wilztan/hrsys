<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    protected $fillable=[
        'user_id',
        'vacancy_id',
        'gpa',
        'name',
        'phone',
        'age',
        'pob',
        'dob',
        'status',
        'address',
        'address_type',
        'marital',
        'degree_file',
        'photo',
        'psy_score',
        'transcript_file',
        'ic_file',
        'last_education',
        'total_work_experience',
        'medical_exam',
        'interview_exam',
        'first_wp_count',
        'final_wp_count',
        'interview_text'
    ];
}
