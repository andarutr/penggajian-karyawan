@extends('layouts.panel')

@section('title', 'Memperbarui Account')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    
    <div class="row">
        <div class="col-12">
            <a href="{{ url('admin/account') }}" class="btn btn-sm btn-success mb-3">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/admin/account/update/{{ $user->id }}" method="POST">@csrf @method('put')
                                <div class="mb-3">
                                    <label for="niku" class="form-label">NIK (opsional)</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nik" class="form-control" placeholder="Masukkan nik" value="{{ $user->nik }}">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama lengkap" value="{{ $user->nama_lengkap }}">
                                    </div>
                                    @error('nama_lengkap')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="email" class="form-control" placeholder="Masukkan email" value="{{ $user->email }}">
                                    </div>
                                    @error('email')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="jenis_kelamin">
                                            <option value="{{ $user->jenis_kelamin }}">{{ $user->jenis_kelamin }}</option>
                                            <option value="Pria">Pria</option>
                                            <option value="Wanita">Wanita</option>
                                        </select>
                                    </div>
                                    @error('jenis_kelamin')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="statusku" class="form-label">Status</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="status">
                                            <option value="{{ $user->status }}">{{ $user->status }}</option>
                                            <option value="Kawin">Kawin</option>
                                            <option value="Belum Menikah">Belum Menikah</option>
                                        </select>
                                    </div>
                                    @error('status')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="agama" class="form-label">Agama</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="agama">
                                            <option value="{{ $user->agama }}">{{ $user->agama }}</option>
                                            <option value="Islam">Islam</option>
                                            <option value="Kristen">Kristen</option>
                                            <option value="Katolik">Katolik</option>
                                            <option value="Budha">Budha</option>
                                            <option value="Hindu">Hindu</option>
                                        </select>
                                    </div>
                                    @error('agama')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="kewarganegaraan" class="form-label">Kewarganegaraan</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="kewarganegaraan">
                                            <option value="{{ $user->kewarganegaraan }}">{{ $user->kewarganegaraan }}</option>
                                            <option value="WNI">WNI</option>
                                            <option value="WNA">WNA</option>
                                        </select>
                                    </div>
                                    @error('kewarganegaraan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="divisi" class="form-label">Divisi</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="divisi_id">
                                            <option value="{{ $user->divisi->id }}">{{ $user->divisi->divisi }}</option>
                                            @foreach($divisi as $div)
                                            <option value="{{ $div->id }}">{{ $div->divisi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('divisi')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="jabatan" class="form-label">Jabatan</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="jabatan_id">
                                            <option value="{{ $user->jabatan->id }}">{{ $user->jabatan->jabatan }}</option>
                                            @foreach($jabatan as $jb)
                                            <option value="{{ $jb->id }}">{{ $jb->jabatan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('jabatan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label">Role</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="role_id">
                                            <option value="{{ $user->role->id }}">{{ $user->role->role }}</option>
                                            @foreach($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->role }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('role')<p class="text-danger">{{ $message }}</p>@enderror
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