@extends('layouts.panel')

@section('title', 'Memperbarui Gaji Karyawan')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    
    <div class="row">
        <div class="col-12">
            <a href="{{ url('admin/penggajian') }}" class="btn btn-sm btn-success mb-3">Kembali</a>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/admin/penggajian/update/{{ $gaji->id }}" method="POST">@csrf @method('put')
                                <div class="mb-3">
                                    <label for="no_slip" class="form-label">No. Slip</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" name="no_slip" class="form-control" placeholder="Masukkan nomor slip gaji" value="{{ $gaji->no_slip }}">
                                    </div>
                                    @error('no_slip')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="user_id" class="form-label">Karyawan</label>
                                    <div class="input-group input-group-merge">
                                        <select class="form-control" name="user_id">
                                            <option value="{{ $gaji->user->id }}">{{ $gaji->user->nama_lengkap}}</option>
                                            @foreach($users as $u)
                                            @if($u->role->role !== 'Admin')
                                            <option value="{{ $u->id }}">{{ $u->nama_lengkap }}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('user_id')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="gaji_pokok" class="form-label">Nominal Gaji</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" name="gaji_pokok" class="form-control" placeholder="Masukkan nominal gaji" value="{{ $gaji->gaji_pokok }}">
                                    </div>
                                    @error('gaji_pokok')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="nama_lengkap" class="form-label">Absen</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Dihitung oleh sistem" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="tunjangan" class="form-label">Tunjangan</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" name="tunjangan" class="form-control" placeholder="Masukkan tunjangan bulanan" value="{{ $gaji->tunjangan }}">
                                    </div>
                                    @error('tunjangan')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="total_gaji" class="form-label">Total Gaji</label>
                                    <div class="input-group input-group-merge">
                                        <input type="number" name="total_gaji" class="form-control" placeholder="Dihitung oleh sistem" readonly>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="periode" class="form-label">Periode</label>
                                    <div class="input-group input-group-merge">
                                        <input type="date" name="periode" class="form-control" value="{{ \Carbon\Carbon::parse($gaji->created_at)->format('Y-m-d') }}">
                                    </div>
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