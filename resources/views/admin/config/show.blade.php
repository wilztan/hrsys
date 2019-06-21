@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nilai</div>

                    <div class="card-body">

                        <div>
                            <h4>{!! str_replace("_"," ",$scoring->name) !!}</h4>
                            <p>Type             : {{$scoring->type}}</p>
                            <p>Result type      : {{$scoring->result_type}}</p>
                            <p>Execution type   : {{$scoring->execution_type}}</p>
                            <p>Weight           : {{$scoring->weight}}</p>
                        </div>

                        <a href="{{action('ScoringTypeController@edit',$scoring->id)}}" class="btn btn-warning">Update Penilaian</a>&nbsp

                        <br><br>

                        <a href="{{action('ScoringValueController@create_value',$scoring->id)}}" class="btn btn-primary">Tambah penilaian</a>
                        <br><br>

                        <div>
                            <h5>Values</h5>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Isian</th>
                                    <th scope="col">Nilai</th>
                                    <th scope="col">option</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($values as $item)
                                    <tr>
                                        <td>{{str_replace("_", " ", $item->value)}}</td>
                                        <td>{{$item->score}}</td>
                                        <td class="row">
                                            <a href="{{action('ScoringValueController@edit',$item->id)}}" class="btn btn-warning">Update</a>&nbsp
                                            <form action="{{action('ScoringValueController@destroy',$item->id)}}" method="POST">
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
    </div>
@endsection
