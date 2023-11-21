@extends('layouts.panel')

@section('title', 'Dashboard Karyawan')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <center>
                        <img src="{{ url('assets/images/svg/maintenance.svg') }}" height="150" alt="File not found Image">
                        <h3 class="mt-4">Site is Under Maintenance</h3>
                        <p class="text-muted">We're making the system more awesome. We'll be back shortly.</p>
                    </center>
                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
</div>
@endsection