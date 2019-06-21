@extends('layouts.app')

@section('content')
    <div class="" style="padding: 40px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Psycho Test Question</div>

                    <div class="card-body">


                        <a href="{{action('ScoringTypeController@create')}}" class="btn btn-primary">Tambah Penilaian</a>

                        <br><br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Penilaian</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($scoring as $item)
                                <tr>
                                    <td>{{str_replace("_", " ", $item->name)}}</td>
                                    <td>{{$item->type}}</td>
                                    <td class="row">
                                        <a href="{{action('ScoringTypeController@show',$item->id)}}" class="btn btn-info">Show</a>&nbsp
                                        <a href="{{action('ScoringTypeController@edit',$item->id)}}" class="btn btn-warning">Update</a>&nbsp
                                        <form action="{{action('ScoringTypeController@destroy',$item->id)}}" method="POST">
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
