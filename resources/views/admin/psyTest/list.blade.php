@extends('layouts.app')

@section('content')
    <div class="" style="padding: 40px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Psycho Test Question</div>

                    <div class="card-body">


                        <a href="{{action('PsychoTestController@create')}}" class="btn btn-primary">Tambah Pertanyaan</a>

                        <br><br>

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                <th scope="col">option</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($test as $item)
                                <tr>
                                    <td>{{$item->question}}</td>
                                    <td>{{$item->correct_answer}}</td>
                                    <td class="row">
                                        <a href="{{action('PsychoTestController@show',$item->id)}}" class="btn btn-info">Show</a>&nbsp
                                        <a href="{{action('PsychoTestController@edit',$item->id)}}" class="btn btn-warning">Update</a>&nbsp
                                        <form action="{{action('PsychoTestController@destroy',$item->id)}}" method="POST">
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
