<div class="col-md-6">
    <div class="card">
        <div class="card-header">Other Information</div>

        <div class="card-body">

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label text-md-right">Hasil Tes Kesehatan</label>
                <input type="number" class="form-control col-md-10" min="0" max="100" name="medical_exam" value="{{$applicant->medical_exam}}" disabled>
            </div>

            <div class="form-group row">

                <label class="col-md-2 col-form-label text-md-right">Hasil Wawancara</label>
                <select name="interview_exam" id="" class="form-control col-md-10" disabled>
                    <option value="3">{{$applicant->interview_exam}}</option>
                </select>
            </div>

            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label text-md-right">Hasil Wawancara</label>
                <textarea class="form-control col-md-10" name="interview_text" disabled>{{$applicant->interview_text}}</textarea>
            </div>
        </div>
    </div>

    <br><br>

    <div class="card">
        <div class="card-header">Result Information</div>

        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label text-md-right">Hasil Akhir</label>
                <input type="number" class="form-control col-md-10" min="0" max="10" name="medical_exam" value="{{$applicant->final_wp_count}}" disabled>
            </div>
            <div class="form-group row">
                <label for="" class="col-md-2 col-form-label text-md-right">STATUS Akhir</label>
                <input type="text" class="form-control col-md-10" value="{{$applicant->status}}" disabled>
            </div>

            @if($applicant->status == "PROCESSED")
                <div class="justify-content-center">
                    <a href="{{action('ApplicantController@AcceptApplicant',$applicant->id)}}" class="btn btn-success">Terima</a>&nbsp
                    <a href="{{action('ApplicantController@RejectApplicant',$applicant->id)}}" class="btn btn-danger">Tolak</a>&nbsp
                </div>
            @endif
        </div>
    </div>
</div>