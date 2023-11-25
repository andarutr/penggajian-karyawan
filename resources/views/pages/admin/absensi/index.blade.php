@extends('layouts.panel')

@section('title', 'Absensi')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-2">
            <form action="/admin/absensi/cari" method="GET">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </form>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Karyawan</th>
                                    <th>Divisi</th>
                                    <th>Keterangan</th>
                                    <th>CreatedAt</th>
                                    <th>Lokasi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($absensi as $abs)
                                <tr>
                                    <td>
                                        <img src="{{ url('assets/images/absensi/'.$abs->picture) }}" class="img-fluid rounded" width="80">
                                    </td>
                                    <td>{{ $abs->user->nama_lengkap }}</td>
                                    <td>{{ $abs->user->divisi->divisi }}</td>
                                    <td>
                                        @if($abs->keterangan === 'Hadir')
                                        <span class="badge bg-primary">{{ $abs->keterangan }}</span>
                                        @else
                                        <span class="badge bg-warning">{{ $abs->keterangan }}</span>
                                        @endif
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($abs->created_at)->format('d F Y, H:i') }}</td>
                                    <td><iframe src = "https://maps.google.com/maps?q={{ $abs->latitude }},{{ $abs->longitude }}&hl=es;z=14&amp;output=embed" width="200" height="100"></iframe></td>
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