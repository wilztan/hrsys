<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\ScoringType;
use App\ScoringValue;
use App\Vacancy;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{

    public static function WeightProductCountingService($id, $isFinal){

        $type_schema = ScoringType::where('active','=',1);

        $scoring_types = $isFinal?
            $type_schema->get():
            $type_schema->where('execution_type','=','DEFAULT')->get();

        $totalWeight = 0;


        $applicant = Applicant::where('id','=',$id)->first();

        foreach ($scoring_types as $scoring){
            $totalWeight+=$scoring->weight;
        }


        echo "TOTAL WEIGHT ".$totalWeight."<br>";

        $result = 1;

        foreach ($scoring_types as $scoring){

            $cost_benefit = $scoring->type == "BENEFIT"? 1: -1;

            $nomalize_weight = $scoring->weight* $cost_benefit / $totalWeight;

            $applicant_value = $applicant[$scoring->name];

            $value = (double) 1;

            echo $scoring->name;
            echo "<br>";
            echo "NORMALIZED WEIGHT ".$nomalize_weight;
            echo "<br>";

            if ($scoring->result_type == "EQUAL"){
                $value =(double) ScoringValue::where('type_id','=',$scoring->id)->where('value','=',$applicant_value)->first()->score;
                echo "EQUALS PROCESS VALUE ".$value."<br>";
            }else{
                $scoringValues = ScoringValue::where('type_id','=',$scoring->id)->orderby('score')->get();
                $current = null;
                $last_process = 0;
                foreach ($scoringValues as $scoringValue){
                    echo "value prop".$scoringValue->value." applicant value ".$applicant_value." ".($last_process==1?"recorded":"passed")." <br>";
                    if ((double) $scoringValue->value > $applicant_value && $last_process == 0){
                        $last_process = 1;
                        $current = (double) $scoringValue->score;
                        echo "BELOW ON VALUE <br>";
                    }
                    if ($last_process==1){
                        break;
                    }
                }
                if ($last_process == 0 ){
                    $current = (double) $scoring->weight;
                    echo "LAST PROCESS";
                    echo "<br>";
                }
                $value = $current;
                echo "Final CURRENT VALUE ".$current."<br>";
            }

            if($value == 0 ){
                $value = 0.1;
            }

            $weighted = (pow($value, $nomalize_weight));
            $result = $result * $weighted;

            echo "WEIGHT = ".$weighted;
            echo "<br>";
            echo "<br>";
        }

        if ($isFinal){
            $applicant->update(['final_wp_count'=>$result]);
        }else{
            $applicant->update(['first_wp_count'=>$result]);
        }

        echo "<br> Resulted = ".$result;

        return;
    }

    public function ShowPreCalculated($id){

        $data=[
            'vacancy'=>Vacancy::find($id),
            'applicants'=>Applicant::where('vacancy_id','=',$id)
                ->where('status','=',"PENDING")
                ->OrderBy('first_wp_count','desc')->paginate(10),
        ];

        return view('admin.applicant.precalculated',$data);
    }

    public function ShowCalculated($id){

        $data=[
            'vacancy'=>Vacancy::find($id),
            'applicants'=>Applicant::where('vacancy_id','=',$id)
                ->where('status','=','PROCESSED')
                ->OrderBy('final_wp_count','desc')
                ->paginate(10),
        ];

        return view('admin.applicant.calculated',$data);
    }

    public function AcceptApplicant($id){
        $applicant = Applicant::find($id);
        $applicant->update(['status'=>'ACCEPTED']);
        return redirect()->action('VacancyController@show',$applicant->vacancy_id);
    }

    public function RejectApplicant($id){
        $applicant = Applicant::find($id);
        $applicant->update(['status'=>'REJECTED']);
        return redirect()->action('VacancyController@show',$applicant->vacancy_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $applicants = Applicant::where('vacancies.id','=',2)->join('users','users.id','=','applicants.user_id')->join('vacancies','vacancies.id','=','applicants.vacancy_id')
            ->select(
                'applicants.id as id_',
                'users.email as email',
                'vacancies.vacancy as vacancy',
                'applicants.*'
            )
            ->orderBy('final_wp_count','desc')
            ->get();
        $data=['applicants'=>$applicants,'vacancy'=>Vacancy::find(2)];
        return view('admin.pdftemplate.template',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $applicant = Applicant::where('applicants.id','=',$id)->join('users','users.id','=','applicants.user_id')->join('vacancies','vacancies.id','=','applicants.vacancy_id')
            ->select(
                'applicants.id as id_',
                'users.email as email',
                'vacancies.vacancy as vacancy',
                'applicants.*'
            )
            ->first();
        $data = [
            'applicant'=>$applicant,
            'type'=>'show'
        ];
        return view('admin.applicant.updateprecalculated',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $applicant = Applicant::where('applicants.id','=',$id)->join('users','users.id','=','applicants.user_id')->join('vacancies','vacancies.id','=','applicants.vacancy_id')
            ->select(
                'applicants.id as id_',
                'users.email as email',
                'vacancies.vacancy as vacancy',
                'applicants.*'
            )
            ->first();
        $data = [
            'applicant'=>$applicant,
            'type'=>'update'
        ];
        return view('admin.applicant.updateprecalculated',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $applicant = Applicant::where('id','=',$id)->first();
        $applicant->update([
            'interview_text'=>$request->interview_text,
            'interview_exam'=>$request->interview_exam,
            'medical_exam'=>$request->medical_exam,
            'status'=>'PROCESSED'
        ]);
//        return
            self::WeightProductCountingService($id,true);
        return redirect()->action('ApplicantController@ShowCalculated',$applicant->vacancy_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }

    public function printOut($vacancy_id){

        $applicants = Applicant::where('vacancies.id','=',$vacancy_id)->join('users','users.id','=','applicants.user_id')->join('vacancies','vacancies.id','=','applicants.vacancy_id')
            ->select(
                'applicants.id as id_',
                'users.email as email',
                'vacancies.vacancy as vacancy',
                'applicants.*'
            )
            ->orderBy('final_wp_count','desc')
            ->get();
        $data=['applicants'=>$applicants,'vacancy'=>Vacancy::find($vacancy_id)];

        $pdf = PDF::loadView('admin.pdftemplate.template',$data);
        return $pdf->download('laporan-lamaran-pdf');
    }
}
