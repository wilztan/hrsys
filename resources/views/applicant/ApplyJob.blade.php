@extends('layouts.app')

@section('content')
    <form method="POST" action="{{action('NewApplicantController@RegisterBiodata')}}" class="row" enctype="multipart/form-data">

    <div class="container" style="padding-top: 50px">

        @include('applicant.partials.ItemCard')

        @include('applicant.partials.ItemUploadCard')

        @include('applicant.partials.ItemWorkCard')

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Insert Biodata</div>


                    <div class="card-body">
                        <div class="row">


                            @csrf

                            <input name="vacancy_id" type="hidden" value="{{$id}}">

                            <div class="" style="display: none">
                                <div id="my_camera"></div>
                                <br/>
                                <input type="hidden" name="photo" class="image-tag" required>
                            </div>

                            <div class="col-md-12 text-center">
                                <div id="results">Your captured image will appear here...</div>
                                <br>
                                <input type=button value="Take Snapshot" onClick="take_snapshot()">
                            </div>

                            <div class="col-md-12 text-center">
                                <br/>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    </form>
@endsection

@section('header')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
@endsection

@section('footer')
    <script language="JavaScript">
        Webcam.set({
            width: 490,
            height: 390,
            image_format: 'jpeg',
            jpeg_quality: 90
        });

        Webcam.attach( '#my_camera' );

        function take_snapshot() {
            Webcam.snap( function(data_uri) {
                var raw_image_data = data_uri.replace(/^data\:image\/\w+\;base64\,/, '');
                $(".image-tag").val(raw_image_data);
                document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
            } );
        }
    </script>
@endsection