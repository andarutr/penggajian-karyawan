@extends('layouts.panel')

@section('title', 'Dashboard Admin')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row row-cols-1 row-cols-xxl-5 row-cols-lg-3 row-cols-md-2">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Karyawan</h5>
                            <h3 class="my-3">{{ $karyawan }}</h3>
                            <p class="mb-0 text-muted text-truncate">
                                <a href="{{ url('admin/account') }}" class="badge bg-primary me-1"><i class="ri-arrow-right-line"></i> Link</a>
                            </p>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Divisi</h5>
                            <h3 class="my-3">{{ $divisi }}</h3>
                            <p class="mb-0 text-muted text-truncate">
                                <a href="{{ url('admin/divisi') }}" class="badge bg-success me-1"><i class="ri-arrow-right-line"></i> Link</a>
                            </p>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="flex-grow-1 overflow-hidden">
                            <h5 class="text-muted fw-normal mt-0" title="Number of Customers">Jabatan</h5>
                            <h3 class="my-3">{{ $jabatan }}</h3>
                            <p class="mb-0 text-muted text-truncate">
                                <a href="{{ url('admin/jabatan') }}" class="badge bg-info me-1"><i class="ri-arrow-right-line"></i> Link</a>
                            </p>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div> 
    <div class="row">
        <div class="col-xl-4">
            <h4>Absensi Terbaru!</h4>
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
                                    <td>{{ \Carbon\Carbon::parse($abs->waktu)->format('d F Y, H:i') }}</td>
                                    <td><iframe src = "https://maps.google.com/maps?q={{ $abs->latitude }},{{ $abs->longitude }}&hl=es;z=14&amp;output=embed" width="200" height="100"></iframe></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
@endsection