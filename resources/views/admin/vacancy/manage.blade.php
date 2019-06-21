@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Lowongan</div>

                    <div class="card-body">


                        @if($type=="create")
                            <form method="POST" action="{{ action('VacancyController@store') }}">
                        @else
                            <form method="POST" action="{{ action('VacancyController@update',$vacancy->id) }}">
                            {{ method_field('PATCH') }}
                        @endif

                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Vacancy</label>

                                <div class="col-md-6">
                                    <input id="vacancy" type="text" class="form-control @error('vacancy') is-invalid @enderror" name="vacancy" required
                                           value="@if($type=="create"){{old('vacancy')}}@else{{$vacancy->vacancy}}@endif"
                                    >

                                    @error('vacancy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Close Date</label>

                                <div class="col-md-6">
                                    <input id="close_date" type="date" class="form-control @error('close_date') is-invalid @enderror" name="close_date" required
                                           value="@if($type=="create"){{old('close_date')}}@else{{$vacancy->close_date}}@endif"
                                    >

                                    @error('close_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">Vacancy</label>

                                <div class="col-md-6">
                                    <textarea name="description" class="form-control" id="" rows="3">
                                           @if($type=="create"){!! old('description') !!}@else{!! $vacancy->description !!}@endif
                                    </textarea>

                                    @error('description')
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
