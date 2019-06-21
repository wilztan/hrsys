@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Hasil Penilaian</div>

                    <div class="card-body">


                        @if($type=="create")
                            <form method="POST" action="{{ action('ScoringValueController@store') }}">
                                <input type="hidden" name="type_id" value="{{$type_id}}">
                        @else
                            <form method="POST" action="{{ action('ScoringValueController@update',$scoring->id) }}">
                                {{ method_field('PATCH') }}
                                <input type="hidden" name="type_id" value="{{$scoring->type_id}}">
                        @endif

                        @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Hasil</label>

                                <div class="col-md-6">
                                    <input id="value" type="text" class="form-control @error('value') is-invalid @enderror" name="value" required
                                           value="@if($type=="create"){{old('value')}}@else{{$scoring->value}}@endif"
                                    >

                                    @error('value')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Nilai</label>

                                <div class="col-md-6">
                                    <input id="score" type="number" class="form-control @error('score') is-invalid @enderror" name="score" required
                                           value="@if($type=="create"){{old('score')}}@else{{$scoring->score}}@endif"
                                    >

                                    @error('score')
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
