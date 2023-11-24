@extends('layouts.panel')

@section('title', 'Memperbarui Jabatan')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    
    <div class="row">
        <div class="col-12">
            <a href="{{ url('admin/jabatan') }}" class="btn btn-sm btn-success mb-3">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/admin/jabatan/update/{{ $jabatan->id }}" method="POST">@csrf @method('put')
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="jabatan" class="form-control" value="{{ $jabatan->jabatan }}">
                                    </div>
                                    @error('jabatan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div><!-- end col -->
    </div><!-- end row -->
</div>
@endsection