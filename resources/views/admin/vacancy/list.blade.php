@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lowongan</div>

                    <div class="card-body">

                        <a href="{{action('VacancyController@create')}}" class="btn btn-primary">Tambah Lowongan</a>

                        <br><br>

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
                                            <a href="{{action('VacancyController@show',$item->id)}}" class="btn btn-info">Show</a>&nbsp
                                            <a href="{{action('VacancyController@edit',$item->id)}}" class="btn btn-warning">Update</a>&nbsp
                                            <form action="{{action('VacancyController@destroy',$item->id)}}" method="POST">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">DELETE</button>
                                            </form>
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
