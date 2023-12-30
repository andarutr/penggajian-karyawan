@extends('layouts.panel')

@section('title', 'Mulai Absen')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    
    <div class="row">
        <div class="col-12">
            <a href="{{ url('karyawan/absensi') }}" class="btn btn-sm btn-success mb-3">Kembali</a>
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
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/{{ Request::segment(1) }}/absensi/store" method="POST" enctype="multipart/form-data">@csrf
                                
                                <div class="mb-3">
                                    <label for="picture" class="form-label">Upload Bukti</label>
                                    <div class="mb-2">
                                        <img class="img-fluid rounded" id="output" width="100" />
                                    </div>
                                    <script type="text/javascript">
                                    let loadFile = function(event) {
                                        let image = document.getElementById('output');
                                        image.src = URL.createObjectURL(event.target.files[0]);
                                    };
                                    </script>
                                    <div class="input-group input-group-merge">
                                        <input type="file" id="picture" class="form-control" name="picture" accept="image/*" onchange="loadFile(event)">
                                    </div>
                                    @error('picture')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Old Password</label>
                                    <div class="input-group input-group-merge">
                                        <select name="keterangan" class="form-control">
                                            <option value="">Pilih</option>
                                            <option value="Hadir">Hadir</option>
                                            <option value="Tidak Hadir">Tidak Hadir</option>
                                        </select>
                                    </div>
                                    @error('keterangan')<p class="text-danger">{{ $message }}</p>@enderror
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