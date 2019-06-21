@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 40px">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Telah Daftar</div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Lowongan</th>
                                <th scope="col">Tanggal Daftar</th>
                                <th scope="col">status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($applicant as $item)
                                <tr>
                                    <td>{{$item->vacancy}}</td>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->status}}</td>
                            @endforeach
                            </tbody>
                        </table>


                        {{ $applicant->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
