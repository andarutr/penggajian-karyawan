@extends('layouts.panel')

@section('title', 'Management Account')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-2">
            <a href="/admin/account/create" class="btn btn-sm btn-primary mb-3">Tambah data</a>
            <form action="/admin/account/cari" method="GET">
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
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Divisi</th>
                                    <th>Jabatan</th>
                                    <th>Role</th>
                                    <th colspan="3" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                @if($user->role->role !== 'Admin')
                                <tr>
                                    <td>{{ $user->nama_lengkap }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->divisi->divisi }}</td>
                                    <td>{{ $user->jabatan->jabatan }}</td>
                                    <td>{{ $user->role->role }}</td>
                                    <td>
                                        <form action="/admin/account/show/{{ $user->id }}" method="POST">@csrf @method('get')
                                            <button type="submit" class="btn btn-primary"><i class="ri-eye-line"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/account/edit/{{ $user->id }}" method="POST">@csrf @method('get')
                                            <button type="submit" class="btn btn-success"><i class="ri-edit-line"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/account/destroy/{{ $user->id }}" method="POST" onclick="return confirm('Yakin ingin menghapus data?')">@csrf @method('delete')
                                            <button type="submit" class="btn btn-danger"><i class="ri-delete-bin-line"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div> <!-- end table-responsive-->
                </div> <!-- end card body-->
            </div> <!-- end card -->
            {{ $users->links() }}
        </div><!-- end col-->
    </div>
</div>
@endsection