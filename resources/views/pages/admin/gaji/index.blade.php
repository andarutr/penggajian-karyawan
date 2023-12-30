@extends('layouts.panel')

@section('title', 'Penggajian')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-2">
            <a href="/admin/penggajian/create" class="btn btn-sm btn-primary mb-3">Tambah data</a>
            <form action="/admin/penggajian/cari" method="GET">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </form>
        </div>
        <!-- Start Flash Message -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            {{ session('success') }}
        </div>
        @endif
        <!-- End Flash Message -->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Nama Karyawan</th>
                                    <th>Divisi</th>
                                    <th>Nominal Gaji</th>
                                    <th>No Slip</th>
                                    <th>Absen</th>
                                    <th>Bulan</th>
                                    <th colspan="3" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gaji as $g)
                                <tr>
                                    <td>{{ $g->user->nama_lengkap }}</td>
                                    <td>{{ $g->user->divisi->divisi }}</td>
                                    <td>Rp{{ number_format($g->gaji_pokok,0,',','.') }}</td>
                                    <td>{{ $g->no_slip }} <a href="/admin/penggajian/show-pdf/{{ $g->id }}" class="badge bg-primary">lihat</a> <a href="/admin/penggajian/download-pdf/{{ $g->id }}" class="badge bg-danger">download</a></td>
                                    <td>{{ $g->absen }}</td>
                                    <td>{{ \Carbon\Carbon::parse($g->created_at)->format('F Y') }}</td>
                                    <td>
                                        <form action="/admin/penggajian/show/{{ $g->id }}" method="POST">@csrf @method('get')
                                            <button type="submit" class="btn btn-primary"><i class="ri-eye-line"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/penggajian/edit/{{ $g->id }}" method="POST">@csrf @method('get')
                                            <button type="submit" class="btn btn-success"><i class="ri-edit-line"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/penggajian/destroy/{{ $g->id }}" method="POST" onclick="return confirm('Yakin ingin menghapus data?')">@csrf @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
            {{ $gaji->links() }}
        </div><!-- end col-->
    </div>
</div>
@endsection