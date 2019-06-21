@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 50px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Psycho Test</div>

                    <div class="card-body">

                        @php $index=0 @endphp

                        <form action="{{action('NewApplicantController@StorePsychoTest')}}" method="POST">

                            <input type="hidden" name="form_id" value="{{$id}}">

                            @csrf

                            @foreach($tests as $test)
                                <div class="form-group">
                                    <p>{!! $test->question !!}</p>

                                    <input type="hidden" name="question[{{$index}}][id]" value="{{$test->id}}" required>

                                    <input type="radio" name="question[{{$index}}][answer]" value="A" required>&nbsp{{$test->answer_a}}<br>
                                    <input type="radio" name="question[{{$index}}][answer]" value="B">&nbsp{{$test->answer_b}}<br>
                                    <input type="radio" name="question[{{$index}}][answer]" value="C">&nbsp{{$test->answer_c}}<br>
                                    <input type="radio" name="question[{{$index}}][answer]" value="D">&nbsp{{$test->answer_d}} <br>
                                </div>

                                @php( $index++)
                            @endforeach

                            <button class="btn btn-primary" type="submit"> Kirim</button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
