@extends('layouts.panel')

@section('title', 'Divisi')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-12">
            <a href="{{ url('admin/divisi/create') }}" class="btn btn-sm btn-primary mb-3">Tambah data</a>
            <!-- Start Flash Message -->
            @if(session('success'))
            <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
                Berhasil absen!
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
                                    <th>Divisi</th>
                                    <th width="20%">Diperbarui</th>
                                    <th width="20%">Dibuat</th>
                                    <th colspan="2" width="10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($divisi as $div)
                                <tr>
                                    <td>{{ $div->id }}</td>
                                    <td>{{ $div->divisi }}</td>
                                    <td>{{ \Carbon\Carbon::parse($div->updated_at)->format('d F Y') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($div->created_at)->format('d F Y') }}</td>
                                    <td>
                                        <form action="/admin/divisi/edit/{{ $div->id }}" method="POST">@csrf @method('get')
                                            <button type="submit" class="btn btn-success"><i class="ri-edit-line"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="/admin/divisi/destroy/{{ $div->id }}" method="POST" onclick="return confirm('Yakin ingin menghapus data?')">@csrf @method('delete')
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