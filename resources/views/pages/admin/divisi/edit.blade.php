@extends('layouts.panel')

@section('title', 'Memperbarui Divisi')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    
    <div class="row">
        <div class="col-12">
            <a href="{{ url('admin/divisi') }}" class="btn btn-sm btn-success mb-3">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/admin/divisi/update/{{ $divisi->id }}" method="POST">@csrf @method('put')
                                <div class="mb-3">
                                    <label for="divisi" class="form-label">Divisi</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="divisi" class="form-control" value="{{ $divisi->divisi }}">
                                    </div>
                                    @error('divisi')<p class="text-danger">{{ $message }}</p>@enderror
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