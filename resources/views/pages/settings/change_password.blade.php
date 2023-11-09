@extends('layouts.panel')

@section('title', 'Change Password')

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <!-- Start Flash Message -->
    @if(session('success'))
    <div class="alert alert-success alert-dismissible text-bg-success border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        Berhasil memperbarui data!
    </div>
    @elseif(session('failed'))
    <div class="alert alert-danger alert-dismissible text-bg-danger border-0 fade show" role="alert">
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        Password Salah!
    </div>
    @endif
    <!-- End Flash Message -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="/{{ Request::segment(1) }}/settings/change-password" method="POST">@csrf
                                <div class="mb-3">
                                    <label for="password" class="form-label">Old Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="old_password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('old_password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">New Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="new_password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('new_password')<p class="text-danger">{{ $message }}</p>@enderror
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Confirm Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" placeholder="Enter your password" name="confirm_password">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                    @error('confirm_password')<p class="text-danger">{{ $message }}</p>@enderror
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