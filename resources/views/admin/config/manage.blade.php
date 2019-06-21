@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Jenis Penilaian</div>

                    <div class="card-body">


                        @if($type=="create")
                            <form method="POST" action="{{ action('ScoringTypeController@store') }}">
                                @else
                                    <form method="POST" action="{{ action('ScoringTypeController@update',$scoring->id) }}">
                                        {{ method_field('PATCH') }}
                                        @endif

                                        @csrf

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Kolom Penilaian</label>

                                            <div class="col-md-6">
                                                <select name="name" id="" class="form-control">
                                                    @if($type=="update")
                                                        <option value="{{$scoring->name}}">{{$scoring->name}}</option>
                                                    @endif
                                                    @foreach($list as $item)
                                                        <option value="{{$item}}">{{str_replace("_", " ", $item)}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Tipe Penilaian</label>

                                            <div class="col-md-6">
                                                <select name="type" id="" class="form-control">
                                                    @if($type=="update")
                                                        <option value="{{$scoring->type}}">{{$scoring->type}}</option>
                                                    @endif
                                                    <option value="BENEFIT">BENEFIT</option>
                                                    <option value="COST">COST</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Tipe Hasil</label>

                                            <div class="col-md-6">
                                                <select name="result_type" id="" class="form-control">
                                                    @if($type=="update")
                                                        <option value="{{$scoring->result_type}}">{{$scoring->result_type}}</option>
                                                    @endif
                                                    <option value="EQUAL">EQUAL // SAMA DENGAN</option>
                                                    <option value="BELOW">BELOW // KURANG DARI PARAMETER</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Tipe Eksekusi</label>

                                            <div class="col-md-6">
                                                <select name="execution_type" id="" class="form-control">
                                                    @if($type=="update")
                                                        <option value="{{$scoring->execution_type}}">{{$scoring->execution_type}}</option>
                                                    @endif
                                                    <option value="DEFAULT">DEFAULT // PENGECEKAN DILAKUKAN 2 X </option>
                                                    <option value="FINAL">FINAL // PENGECEKAN HANYA DILAKUKAN TERAKHIR</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label for="email" class="col-md-4 col-form-label text-md-right">Bobot</label>

                                            <div class="col-md-6">
                                                <input id="weight" type="number" class="form-control @error('weight') is-invalid @enderror" name="weight" required
                                                       value="@if($type=="create"){{old('weight')}}@else{{$scoring->weight}}@endif"
                                                >

                                                @error('weight')
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
