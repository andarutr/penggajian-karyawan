@extends('layouts.panel')

@section('title', 'Edit Profile '.Auth::user()->nama_lengkap)

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    @if(session('success'))
    <div class="alert alert-primary alert-dismissible text-bg-primary border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        Berhasil memperbarui data!
    </div>
    @endif
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <a href="{{ url(Request::segment(1)) }}/settings/profile" class="btn btn-success btn-sm mb-2">Kembali</a>

            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ url('assets/images/users/'.Auth::user()->picture) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-1 mt-2">{{ Auth::user()->nama_lengkap }}</h4>
                    <p class="text-muted">@if(Auth::user()->role_id === 1) Admin @else Karyawan @endif</p>

                    <div class="text-start mt-3">
                        <p class="text-muted mb-2"><strong>NIK :</strong> <span class="ms-2">{{ Auth::user()->nik }}</span></p>

                        <p class="text-muted mb-2"><strong>Nama :</strong> <span class="ms-2">{{ Auth::user()->nama_lengkap }}</span></p>

                        <p class="text-muted mb-2"><strong>Email :</strong> <span class="ms-2">{{ Auth::user()->email }}</span></p>

                        <p class="text-muted mb-2"><strong>Status :</strong> <span class="ms-2">{{ Auth::user()->status }}</span></p>

                        <p class="text-muted mb-2"><strong>Agama :</strong> <span class="ms-2">{{ Auth::user()->agama }}</span></p>
                        
                        <p class="text-muted mb-2"><strong>Jabatan :</strong> <span class="ms-2">{{ Auth::user()->status }}</span></p>
                        
                        <p class="text-muted mb-2"><strong>Divisi :</strong> <span class="ms-2">{{ Auth::user()->status }}</span></p>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col-->

        <div class="col-xl-8 col-lg-7">
            <h3>Edit Profile</h3>
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                            <form action="{{ url(Request::segment(1)) }}/settings/profile/edit" method="POST" enctype="multipart/form-data">@csrf @method('put')
                                <div class="mb-3">
                                    <label for="picture" class="form-label">Foto Profil</label>
                                    <div class="mt-1 mb-1">
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
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="nik" class="form-control" value="{{ Auth::user()->nik }}" name="nik">
                                        @error('nik')<p class="text-danger">{{ $message }}</p>@enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="nama_lengkap" class="form-control" name="nama_lengkap" value="{{ Auth::user()->nama_lengkap }}">
                                    </div>
                                    @error('nama_lengkap')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="email" class="form-control" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
                                        <option value="{{ Auth::user()->jenis_kelamin }}">{{ Auth::user()->jenis_kelamin }}</option>
                                        <option value="Pria">Pria</option>
                                        <option value="Wanita">Wanita</option>
                                    </select>
                                    @error('jenis_kelamin')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status_pernikahan" class="form-label">Status</label>
                                    <select class="form-select" id="status_pernikahan" name="status_pernikahan">
                                        <option value="{{ Auth::user()->status }}">{{ Auth::user()->status }}</option>
                                        <option value="Kawin">Kawin</option>
                                        <option value="Belum Nikah">Belum Nikah</option>
                                    </select>
                                    @error('status_pernikahan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <select class="form-select" id="agama" name="agama">
                                        <option value="{{ Auth::user()->agama }}">{{ Auth::user()->agama }}</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                    </select>
                                    @error('agama')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kewarganegaraan" class="form-label">Warganegara</label>
                                    <select class="form-select" id="kewarganegaraan" name="kewarganegaraan">
                                        <option value="{{ Auth::user()->kewarganegaraan }}">{{ Auth::user()->kewarganegaraan }}</option>
                                        <option value="WNI">WNI</option>
                                        <option value="WNA">WNA</option>
                                    </select>
                                    @error('kewarganegaraan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="divisi_id" class="form-label">Divisi</label>
                                    <select class="form-select" id="divisi_id" name="divisi_id">
                                        <option value="{{ Auth::user()->divisi->id }}">{{ Auth::user()->divisi->divisi }}</option>
                                        @foreach($divisi as $div)
                                        <option value="{{ $div->id }}">{{ $div->divisi }}</option>
                                        @endforeach
                                    </select>
                                    @error('divisi_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan_id" class="form-label">Jabatan</label>
                                    <select class="form-select" id="jabatan_id" name="jabatan_id">
                                        <option value="{{ Auth::user()->jabatan->id }}">{{ Auth::user()->jabatan->jabatan }}</option>
                                        @foreach($jabatan as $jab)
                                        <option value="{{ $jab->id }}">{{ $jab->jabatan }}</option>
                                        @endforeach
                                    </select>
                                    @error('jabatan_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div> <!-- end col -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>
@endsection