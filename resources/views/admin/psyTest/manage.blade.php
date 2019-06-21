@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        @if($type=="create")
                            <form method="POST" action="{{ action('PsychoTestController@store') }}">
                        @else
                            <form method="POST" action="{{ action('PsychoTestController@update',$test->id) }}">
                            {{ method_field('PATCH') }}
                        @endif

                            @csrf

                            <div class="form-group row">
                                <label for="Question" class="col-md-4 col-form-label text-md-right">Question</label>

                                <div class="col-md-6">
                                    <input id="question" type="text" class="form-control @error('question') is-invalid @enderror" name="question" required
                                           value="@if($type=="create"){{old('question')}}@else{{$test->question}}@endif"
                                    >

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Question" class="col-md-4 col-form-label text-md-right">Answer A</label>

                                <div class="col-md-6">
                                    <input id="answer_a" type="text" class="form-control @error('answer_a') is-invalid @enderror" name="answer_a" required
                                           value="@if($type=="create"){{old('answer_a')}}@else{{$test->answer_a}}@endif"
                                    >

                                    @error('answer_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Question" class="col-md-4 col-form-label text-md-right">Answer B</label>

                                <div class="col-md-6">
                                    <input id="answer_b" type="text" class="form-control @error('answer_b') is-invalid @enderror" name="answer_b" required
                                           value="@if($type=="create"){{old('answer_b')}}@else{{$test->answer_b}}@endif"
                                    >

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Question" class="col-md-4 col-form-label text-md-right">Answer C</label>

                                <div class="col-md-6">
                                    <input id="answer_c" type="text" class="form-control @error('answer_c') is-invalid @enderror" name="answer_c" required
                                           value="@if($type=="create"){{old('answer_c')}}@else{{$test->answer_c}}@endif"
                                    >

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Question" class="col-md-4 col-form-label text-md-right">Answer D</label>

                                <div class="col-md-6">
                                    <input id="answer_d" type="text" class="form-control @error('answer_d') is-invalid @enderror" name="answer_d" required
                                           value="@if($type=="create"){{old('answer_d')}}@else{{$test->answer_d}}@endif"
                                    >

                                    @error('answer_d')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="Question" class="col-md-4 col-form-label text-md-right">Answer</label>

                                <div class="col-md-6">
                                    <select name="correct_answer" class="form-control">
                                        @if($type=="update")<option value="{{$test->correct_answer}}">{{$test->correct_answer}}</option> @endif
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </select>

                                    @error('question')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>

                                <div class="form-group row">
                                    <button class="btn btn-info offset-md-4" >Ubah</button>
                                </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
