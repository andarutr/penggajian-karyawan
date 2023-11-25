@extends('layouts.panel')

@section('title', 'Show Gaji Karyawan')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-2">
            <a href="{{ url('admin/penggajian') }}" class="btn btn-sm btn-primary mb-3">Kembali</a>
        </div>
        <div class="col-xl-12">
            <center class="mb-4">
                <img src="/assets/images/users/{{ $user->picture }}" class="img-fluid rounded-circle">
                <h4 class="mt-2">{{ $user->nama_lengkap }}</h4>
                <h5>Bergabung sejak {{ \Carbon\Carbon::parse($user->created_at)->format('d F Y') }}</h5>
            </center>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Lengkap</th>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>No Slip</th>
                                    <td>{{ $gaji->no_slip }}</td>
                                    <th>Gaji</th>
                                    <td>Rp{{ number_format($gaji->gaji_pokok,0,',','.') }}</td>
                                </tr>
                                <tr>
                                    <th>Absen</th>
                                    <td>{{ $gaji->absen }}</td>
                                    <th>Tunjangan</th>
                                    <td>{{ $gaji->tunjangan }}</td>
                                </tr>
                                <tr>
                                    <th>Dibuat Pada</th>
                                    <td>{{ \Carbon\Carbon::parse($gaji->created_at)->format('d F Y') }}</td>
                                    <th>Diperbarui Pada</th>
                                    <td>{{ \Carbon\Carbon::parse($gaji->updated_at)->format('d F Y') }}</td>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
@endsection