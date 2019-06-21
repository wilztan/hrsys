@extends('layouts.app')

@section('content')
    <div class="" style="padding: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lowongan</div>

                    <div class="card-body">

                        <div class="form-group row">
                            <h4 class="col-md-6">{!! $vacancy->vacancy !!}</h4>
                        </div>

                        {{-- Table --}}

                        <h4>Nilai Pelamar Terproses</h4>

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
                                    <td>@if($item->final_wp_count<0)belum di proses @else{{$item->final_wp_count}}@endif</td>
                                    <td class="row">
                                        <a href="{{action('ApplicantController@show',$item->id)}}" class="btn btn-info">Lihat Profil</a>&nbsp
                                        <a href="{{action('ApplicantController@AcceptApplicant',$item->id)}}" class="btn btn-success">Terima</a>&nbsp
                                        <a href="{{action('ApplicantController@RejectApplicant',$item->id)}}" class="btn btn-danger">Tolak</a>&nbsp
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{-- End Of Table--}}


                        {{ $applicants->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
