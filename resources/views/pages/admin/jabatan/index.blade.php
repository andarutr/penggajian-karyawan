@extends('layouts.panel')

@section('title', 'Jabatan')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-12">
            <a href="{{ url('admin/jabatan/create') }}" class="btn btn-sm btn-primary mb-3">Tambah data</a>
            <!-- Start Flash Message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                {{ session('success') }}
            </div>
            @endif
            <!-- End Flash Message -->
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th width="5%">ID</th>
                                    <th>Jabatan</th>
                                    <th width="20%">Diperbarui</th>
                                    <th width="20%">Dibuat</th>
                                    <th colspan="2" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jabatan as $jb)
                                <tr>
                                    <td>{{ $jb->id }}</td>
                                    <td>{{ $jb->jabatan }}</td>
                                    <td>{{ \Carbon\Carbon::parse($jb->updated_at)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($jb->created_at)->format('d F Y') }}</td>
                                    <td>
                                        <form action="/admin/jabatan/edit/{{ $jb->id }}" method="POST">@csrf @method('get')
                                            <button type="submit" class="btn btn-success"><i class="ri-edit-line"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/jabatan/destroy/{{ $jb->id }}" method="POST" onclick="return confirm('Yakin ingin menghapus data?')">@csrf @method('delete')
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
        </div><!-- end col-->
    </div>
</div>
@endsection