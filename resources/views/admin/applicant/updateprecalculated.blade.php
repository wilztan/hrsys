@extends('layouts.app')

@section('content')
    <div class="" style="padding: 40px">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Data Pelamar</div>

                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{'/storage/public/img/photo/'.$applicant->id.'/photo.png'}}" alt="" style="width: 100%; border-radius: 10px">
                            </div>

                            <div class="col-md-6">
                                <h4> Applicants {{$applicant->vacancy}}</h4>
                                <p>Submission Date : {{$applicant->created_at}}</p>
                                <div class="row">
                                    <label class="col-md-6 col-form-label text-md-right">Name</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->name}}">
                                    </div>
                                    <br><br>

                                    <label class="col-md-6 col-form-label text-md-right">email</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->email}}">
                                    </div>
                                    <br><br>

                                    <label class="col-md-6 col-form-label text-md-right">phone</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->phone}}">
                                    </div>
                                    <br><br>

                                    <label class="col-md-6 col-form-label text-md-right">Tempat Tangal Lahir</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->pob}} {{$applicant->dob}}">
                                    </div>
                                    <br><br>


                                    <label class="col-md-6 col-form-label text-md-right">Status</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->marital}}">
                                    </div>
                                    <br><br>

                                    <label class="col-md-6 col-form-label text-md-right">Alamat</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->address}}">
                                    </div>
                                    <br><br>

                                    <label class="col-md-6 col-form-label text-md-right">Umur</label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" disabled value="{{$applicant->age}}">
                                    </div>
                                    <br><br>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <br><br>

                <div class="card">
                    <div class="card-header">Data Pekerjaan</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-md-6 row">
                                <label class="col-md-6 col-form-label text-md-right">Pendidikan Terakhir</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" disabled value="{{$applicant->last_education}}">
                                </div>
                            </div>


                            <div class="form-group col-md-6 row">
                                <label class="col-md-6 col-form-label text-md-right">Total Pengalaman Kerja</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" disabled value="{{$applicant->total_work_experience}}">
                                </div>
                            </div>


                            <div class="form-group col-md-6 row">
                                <label class="col-md-6 col-form-label text-md-right">Psychological Test Result</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" disabled value="{{$applicant->psy_score}}">
                                </div>
                            </div>

                            <div class="form-group col-md-6 row">
                                <label class="col-md-6 col-form-label text-md-right">Nilai Perhitungan Pertama</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" disabled value="{{$applicant->first_wp_count}}">
                                </div>
                            </div>

                            <div class="form-group col-md-12">
                                <h5>Link</h5>

                                <a href="{{'/storage/public/img/ic/'.$applicant->id.'/ic.png'}}">Foto KTP</a> <br>
                                <a href="{{'/storage/public/img/transcript/'.$applicant->id.'/tnc.png'}}">Foto Transkrip</a> <br>
                                <a href="{{'/storage/public/img/degree/'.$applicant->id.'/dg.png'}}">Foto Pendidikan</a> <br>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <br><br>

            @if($applicant->status=="PENDING")
                @include('admin.applicant.partial.formupdate')
            @else
                @include('admin.applicant.partial.showcalculated')
            @endif


        </div>
    </div>
@endsection
