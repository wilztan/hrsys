@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lowongan</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Vacancy</th>
                                <th scope="col">status</th>
                                <th scope="col">option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vacancies as $item)
                                <tr>
                                    <td>{{$item->vacancy}}</td>
                                    <td>@if(strtotime($item->close_date) < time()) CLOSED @else OPEN @endif</td>
                                    <td class="row">
                                        @if(strtotime($item->close_date) < time()) CLOSED @else
                                            @if(\App\Applicant::where('user_id','=',Auth::User()->id)->where('vacancy_id','=',$item->id)->count() ==0)
                                                <a href="{{action('NewApplicantController@ViewRegisterBiodata',$item->id)}}" class="btn btn-info">Daftar</a>&nbsp
                                            @else
                                                Anda Sudah Daftar
                                            @endif
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
