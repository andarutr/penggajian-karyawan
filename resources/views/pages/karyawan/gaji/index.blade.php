@extends('layouts.panel')

@section('title', 'Rincian Gaji')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-2 mb-3">
            <form action="/karyawan/rincian-gaji/cari" method="GET">
                <input type="text" name="search" class="form-control" placeholder="Cari...">
            </form>
        </div>
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">{{ Auth::user()->nama_lengkap }}</h4>
                    <p class="text-muted fs-14">
                        Bila tidak sesuai silahkan hubungi administrator.
                    </p>

                    <div class="table-responsive-sm">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>No Slip</th>
                                    <th>Nominal Gaji</th>
                                    <th>Periode</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($gaji as $g)
                                @if($g->user->id === Auth::user()->id)
                                <tr>
                                    <td>{{ $g->no_slip }}</td>
                                    <td>Rp{{ number_format($g->gaji_pokok,0,',','.') }}</td>
                                    <td>{{ \Carbon\Carbon::parse($g->created_at)->format('F Y') }}</td>
                                </tr>
                                @endif
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