@extends('layouts.app')

@section('content')
    <div class="" style="padding: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lowongan</div>

                    <div class="card-body">

                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">Vacancy</label>

                            <div class="col-md-6">{!! $vacancy->vacancy !!}</div>
                        </div>


                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">Status</label>

                            <div class="col-md-6">@if(strtotime($vacancy->close_date) < time()) CLOSED @else OPEN @endif</div>
                        </div>


                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">Close Date</label>

                            <div class="col-md-6">{!! $vacancy->close_date !!}</div>
                        </div>


                        <div class="form-group row">

                            <label for="email" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">{!! $vacancy->description !!}</div>
                        </div>

                        {{-- Table --}}

                        <div class="row">
                            <a href="{{action('ApplicantController@ShowPreCalculated',$vacancy->id)}}" class="btn btn-primary">Pelamar Masuk</a> &nbsp
                            <a href="{{action('ApplicantController@ShowCalculated',$vacancy->id)}}" class="btn btn-info">Pelamar Terproses</a> &nbsp
                            <a href="{{action('ApplicantController@printOut',$vacancy->id)}}" class="btn btn-warning">Cetak</a> &nbsp
                        </div>
                        <br><br>

                        <h4>Perlamar Diterima</h4>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Pelamar</th>
                                <th scope="col">Nilai</th>
                                <th scope="col">option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applicants as $item)
                                <tr>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->final_wp_count}}</td>
                                    <td class="row">
                                        <a href="{{action('ApplicantController@show',$item->id)}}" class="btn btn-info">Lihat Profil</a>&nbsp
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- End Of Table--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
