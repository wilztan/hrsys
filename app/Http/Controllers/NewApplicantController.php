<?php

namespace App\Http\Controllers;

use App\Applicant;
use App\PsychoTest;
use Illuminate\Http\Request;
use App\Vacancy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewApplicantController extends Controller
{

    function ViewApplicant(){
        $data=[
            'vacancies'=>Vacancy::orderBy('close_date','desc')->get(),
        ];
        return view('applicant.ViewJob',$data);
    }

    function ViewRegisterBiodata($id){
        $data=[
            'id'=>$id
        ];
        return view('applicant.ApplyJob',$data);
    }

    function RegisterBiodata(Request $request){
        $applicant = Applicant::create([
            'user_id'=>Auth::user()->id,
            'vacancy_id'=>$request->vacancy_id,
            'name'=>$request->name,
            'phone'=>$request->phone,
            'age'=>$request->age,
            'gpa'=>$request->gpa,
            'pob'=>$request->pob,
            'dob'=>$request->dob,
            'address'=>$request->address,
            'address_type'=>$request->address_type,
            'marital'=>$request->marital,
            'status'=>'PENDING',
            'last_education'=>$request->last_education,
            'total_work_experience'=>$request->total_work_experience,
        ]);

        // Process File
        $photo_filename = $this->manageBase64String($applicant->id, 'photo', $request->photo, "photo.png");
        $ic_filename  = $this->manageFile($applicant->id, 'ic', $request->ic_file, "ic.png");
        $transcript_filename = $this->manageFile($applicant->id, 'transcript', $request->transcript_file, "tnc.png");
        $degree_filename= $this->manageFile($applicant->id, 'degree', $request->degree_file, "dg.png");

        $applicant->photo = $photo_filename;
        $applicant->degree_file = $degree_filename;
        $applicant->transcript_file = $transcript_filename;
        $applicant->ic_file = $ic_filename;

        return redirect()->action('NewApplicantController@ViewPsychoTest',$applicant->id);
    }

    function ViewPsychoTest($id){
        $data=[
            'tests'=>PsychoTest::all(),
            'id'=>$id
        ];
        return view('applicant.PsychoTest',$data);
    }

    function StorePsychoTest(Request $request){
        $score = 0; $total= 0;
        foreach ($request->question as $question){
            $isCorrect = PsychoTest::where('id','=',$question['id'])->where('correct_answer','=',$question['answer'])->count();
            if ($isCorrect>0){
                $score++;
            }
            $total++;
        }
        $final_score = 100*$score/$total;
        Applicant::where('id','=',$request->form_id)->update(['psy_score'=>$final_score]);
        ApplicantController::WeightProductCountingService($request->form_id, false);
        return redirect()->action('NewApplicantController@ApplicationList')->with('message', "Successfully Created");
    }

    public function ApplicationList(){

        $data = [
            'applicant' => Applicant::join('vacancies','vacancies.id','=','applicants.vacancy_id')->where('user_id','=',Auth::user()->id)->paginate(15),
        ];
        return view('applicant.List',$data);

    }


    private function manageFile($id,$path_ext,$photo, $fileName){
        try {
            if (!file_exists(storage_path('app/public/img/' .$path_ext.'/'. $id))) {
                mkdir(storage_path('app/public/img/' .$path_ext.'/'. $id), 0777, true);
            }

            Storage::putFileAs('public/img/' .$path_ext.'/'. $id, $photo, $fileName);

            return $fileName;
        }catch (\Exception $e) {
            return response( )->json("Error! " . $e->getMessage());
        }
    }

    private function manageBase64String($id, $path_ext, $request_post, $fileName){
        try {
            if (!file_exists(storage_path('app/public/img/' .$path_ext.'/'. $id))) {
                mkdir(storage_path('app/public/img/' .$path_ext.'/'. $id), 0777, true);
            }

            $encoded_data = $request_post;
            $binary_data = base64_decode( $encoded_data );

            // save to server (beware of permissions)
            Storage::put('public/img/' .$path_ext.'/'. $id.'/'.$fileName, $binary_data);

            return $fileName;
        }catch (\Exception $e) {
            return response( )->json("Error! " . $e->getMessage());
        }
    }
}
