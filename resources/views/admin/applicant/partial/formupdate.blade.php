<div class=" col-md-6">

    <div class="card">
        <div class="card-header">Penyelesaian Proses</div>

        <form class="card-body" method="POST" action="{{action('ApplicantController@update',$applicant->id)}}">
            <div class="">

                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label text-md-right">Hasil Tes Kesehatan</label>
                    <input type="number" class="form-control col-md-10" min="0" max="100" name="medical_exam" required>
                </div>

                <div class="form-group row">

                    <label class="col-md-2 col-form-label text-md-right">Hasil Wawancara</label>
                    <select name="interview_exam" id="" class="form-control col-md-10" required>
                        <option value="3">3 : Baik</option>
                        <option value="2">2 : Cukup</option>
                        <option value="1">1 : Kurang</option>
                    </select>
                </div>

                <div class="form-group row">
                    <label for="" class="col-md-2 col-form-label text-md-right">Hasil Wawancara</label>
                    <textarea class="form-control col-md-10" name="interview_text"></textarea>
                </div>

                <div class="row justify-content-center">
                    @csrf
                    {{ method_field('PATCH') }}

                    <button class="btn btn-primary" type="submit">Proses</button>
                </div>


            </div>
        </form>
    </div>

</div>