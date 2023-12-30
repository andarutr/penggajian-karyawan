@extends('layouts.panel')

@section('title', 'Absensi Karyawan')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-12">
            <a href="{{ url('karyawan/absensi/create') }}" class="btn btn-sm btn-primary mb-3">Mulai Absen!</a>
            <div class="card">
                <div class="card-body">

                    <h4 class="header-title">{{ Auth::user()->nama_lengkap }}</h4>
                    <p class="text-muted fs-14">
                        Bila tidak sesuai silahkan hubungi administrator.
                    </p>

                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Kota</th>
                                    <th>Waktu</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensi as $absen)
                                <tr>
                                    <td>
                                        <img src="{{ url('assets/images/absensi/'.$absen->picture) }}" width="100">
                                    </td>
                                    <td>
                                        @if($absen->keterangan == 'Hadir')
                                        <span class="badge bg-success">{{ $absen->keterangan }}</span>
                                        @else
                                        <span class="badge bg-warning">{{ $absen->keterangan }}</span>
                                        @endif
                                    </td>
                                    <td>{{ $absen->latitude }}</td>
                                    <td>{{ $absen->longitude}}</td>
                                    <td>{{ $absen->kota }}</td>
                                    <td>{{ $absen->waktu }}</td>
                                    <td>
                                        <iframe src = "https://maps.google.com/maps?q={{ $absen->latitude }},{{ $absen->longitude }}&hl=es;z=14&amp;output=embed" width="200" height="100"></iframe>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
                    {{ $absensi->links() }}
        </div><!-- end col-->
    </div>
</div>
@endsection