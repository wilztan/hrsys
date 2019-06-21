<!DOCTYPE html>
<html>
<head>

</head>
<body>

<h4>Laporan Pelamar {{$vacancy->vacancy}}</h4>
<small>dimulai: {{$vacancy->created_at}}</small>

<br><br>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Pelamar</th>
        <th>Phone</th>
        <th>Pendidikan Terakhir</th>
        <th>Pengalaman Kerja</th>
        <th scope="col">Nilai WP (pertama/akhir)</th>
        <th scope="col">Status</th>
    </tr>
    </thead>
    <tbody>
    @foreach($applicants as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->phone}}</td>
            <td>{{$item->last_education}}</td>
            <td>{{$item->total_work_experience}}</td>
            <td>
                {{number_format($item->first_wp_count, 2, ',', ' ')}}
                /
                @if($item->final_wp_count<0)
                    {{"0 Final Tidak dilakukan"}}
                @else
                    {{number_format($item->final_wp_count, 2, ',', ' ')}}
                @endif
            </td>
            <td>{{$item->status}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>
</html>
