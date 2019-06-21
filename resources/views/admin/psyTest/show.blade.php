@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Question</div>

                    <div class="card-body">

                        <div>
                            <p>{!! $test->question !!}</p>

                            <input type="hidden" name="question[0]['id']" value="{{$test->id}}">

                            <input type="radio" name="question[0]['answer']" value="A">&nbsp{{$test->answer_a}}<br>
                            <input type="radio" name="question[0]['answer']" value="B">&nbsp{{$test->answer_b}}<br>
                            <input type="radio" name="question[0]['answer']" value="C">&nbsp{{$test->answer_c}}<br>
                            <input type="radio" name="question[0]['answer']" value="D">&nbsp{{$test->answer_d}} <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
