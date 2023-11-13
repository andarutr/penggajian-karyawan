@extends('layouts.panel')

@section('title', 'Profile '.Auth::user()->nama_lengkap)

@section('content')
<div class="container-fluid">
    @include('partials.breadcrumb')
    <div class="row">
        <div class="col-xl-4 col-lg-5">
            <div class="card text-center">
                <div class="card-body">
                    <img src="{{ url('assets/images/users/'.Auth::user()->picture) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                    <h4 class="mb-1 mt-2">{{ Auth::user()->nama_lengkap }}</h4>
                    <p class="text-muted">@if(Auth::user()->role_id === 1) Admin @else Karyawan @endif</p>

                    <a href="{{ url(Request::segment(1)) }}/settings/profile/edit" class="btn btn-success btn-sm mb-2">Edit</a>

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
            <div class="card">
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane show active" id="aboutme">
                            <h5 class="text-uppercase mt-4"><i class="ri-macbook-line me-1"></i>
                                Experience</h5>

                            <div class="timeline-alt pb-0">
                                <div class="timeline-item">
                                    <i class="ri-record-circle-line text-bg-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <h5 class="mt-0 mb-1">Lead designer / Developer</h5>
                                        <p class="fs-14">websitename.com <span class="ms-2 fs-12">Year: 2015 - 18</span></p>
                                        <p class="text-muted mt-2 mb-0 pb-3">Everyone realizes why a new common language
                                            would be desirable: one could refuse to pay expensive translators.
                                            To achieve this, it would be necessary to have uniform grammar,
                                            pronunciation and more common words.</p>
                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ri-record-circle-line text-bg-primary timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <h5 class="mt-0 mb-1">Senior Graphic Designer</h5>
                                        <p class="fs-14">Software Inc. <span class="ms-2 fs-12">Year: 2012 - 15</span></p>
                                        <p class="text-muted mt-2 mb-0 pb-3">If several languages coalesce, the grammar
                                            of the resulting language is more simple and regular than that of
                                            the individual languages. The new common language will be more
                                            simple and regular than the existing European languages.</p>

                                    </div>
                                </div>

                                <div class="timeline-item">
                                    <i class="ri-record-circle-line text-bg-info timeline-icon"></i>
                                    <div class="timeline-item-info">
                                        <h5 class="mt-0 mb-1">Graphic Designer</h5>
                                        <p class="fs-14">Coderthemes Design LLP <span class="ms-2 fs-12">Year: 2010 - 12</span></p>
                                        <p class="text-muted mt-2 mb-0 pb-2">The European languages are members of
                                            the same family. Their separate existence is a myth. For science
                                            music sport etc, Europe uses the same vocabulary. The languages
                                            only differ in their grammar their pronunciation.</p>
                                    </div>
                                </div>

                            </div>
                            <!-- end timeline -->

                        </div> <!-- end tab-pane -->
                        <!-- end about me section content -->

                        <div class="tab-pane" id="timeline">

                            <!-- comment box -->
                            <div class="border rounded mt-2 mb-3">
                                <form action="#" class="comment-area-box">
                                    <textarea rows="3" class="form-control border-0 resize-none" placeholder="Write something...."></textarea>
                                    <div class="p-2 bg-light d-flex justify-content-between align-items-center">
                                        <div>
                                            <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-contacts-book-2-line"></i></a>
                                            <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-map-pin-line"></i></a>
                                            <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-camera-3-line"></i></a>
                                            <a href="#" class="btn btn-sm px-2 fs-16 btn-light"><i class="ri-emoji-sticker-line"></i></a>
                                        </div>
                                        <button type="submit" class="btn btn-sm btn-dark">Post</button>
                                    </div>
                                </form>
                            </div> <!-- end .border-->
                            <!-- end comment box -->

                            <!-- Story Box-->
                            <div class="border border-light rounded p-2 mb-3">
                                <div class="d-flex">
                                    <img class="me-2 rounded-circle" src="assets/images/users/avatar-4.jpg" alt="Generic placeholder image" height="32">
                                    <div>
                                        <h5 class="m-0">Thelma Fridley</h5>
                                        <p class="text-muted"><small>about 1 hour ago</small></p>
                                    </div>
                                </div>
                                <div class="fs-16 text-center fst-italic text-dark">
                                    <i class="ri-double-quotes-l fs-20"></i> Cras sit amet nibh libero, in
                                    gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras
                                    purus odio, vestibulum in vulputate at, tempus viverra turpis. Duis
                                    sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper
                                    porta. Mauris massa.
                                </div>

                                <div class="mx-n2 p-2 mt-3 bg-light">
                                    <div class="d-flex">
                                        <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                                        <div>
                                            <h5 class="mt-0">Jeremy Tomlinson <small class="text-muted">about 2 minuts ago</small></h5>
                                            Nice work, makes me think of The Money Pit.

                                            <br />
                                            <a href="javascript: void(0);" class="text-muted fs-13 d-inline-block mt-2"><i class="ri-reply-line"></i> Reply</a>

                                            <div class="d-flex mt-3">
                                                <a class="pe-2" href="#">
                                                    <img src="assets/images/users/avatar-4.jpg" class="rounded-circle" alt="Generic placeholder image" height="32">
                                                </a>
                                                <div>
                                                    <h5 class="mt-0">Thelma Fridley <small class="text-muted">5 hours ago</small></h5>
                                                    i'm in the middle of a timelapse animation myself! (Very different though.) Awesome stuff.
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex mt-2">
                                        <a class="pe-2" href="#">
                                            <img src="assets/images/users/avatar-1.jpg" class="rounded-circle" alt="Generic placeholder image" height="32">
                                        </a>
                                        <div class="w-100">
                                            <input type="text" id="simpleinput" class="form-control border-0 form-control-sm" placeholder="Add comment">
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-2">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-danger"><i class="ri-heart-line"></i> Like (28)</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-share-line"></i> Share</a>
                                </div>
                            </div>

                            <!-- Story Box-->
                            <div class="border border-light rounded p-2 mb-3">
                                <div class="d-flex">
                                    <img class="me-2 rounded-circle" src="assets/images/users/avatar-3.jpg" alt="Generic placeholder image" height="32">
                                    <div>
                                        <h5 class="m-0">Jeremy Tomlinson</h5>
                                        <p class="text-muted"><small>3 hours ago</small></p>
                                    </div>
                                </div>
                                <p>Story based around the idea of time lapse, animation to post soon!</p>

                                <img src="assets/images/small/small-1.jpg" alt="post-img" class="rounded me-1" height="60" />
                                <img src="assets/images/small/small-2.jpg" alt="post-img" class="rounded me-1" height="60" />
                                <img src="assets/images/small/small-3.jpg" alt="post-img" class="rounded" height="60" />

                                <div class="mt-2">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-reply-line"></i> Reply</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-heart-line"></i> Like</a>
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i class="ri-share-line"></i> Share</a>
                                </div>
                            </div>

                            <!-- Story Box-->
                            <div class="border border-light p-2 mb-3">
                                <div class="d-flex">
                                    <img class="me-2 rounded-circle" src="assets/images/users/avatar-6.jpg" alt="Generic placeholder image" height="32">
                                    <div>
                                        <h5 class="m-0">Martin Williamson</h5>
                                        <p class="text-muted"><small>15 hours ago</small></p>
                                    </div>
                                </div>
                                <p>The parallax is a little odd but O.o that house build is awesome!!</p>

                                <iframe src='https://player.vimeo.com/video/87993762' height='300' class="img-fluid border-0"></iframe>
                            </div>

                            <div class="text-center">
                                <a href="javascript:void(0);" class="text-danger"><i class="ri-loader-fill me-1"></i> Load more </a>
                            </div>

                        </div>
                        <!-- end timeline content-->

                        <div class="tab-pane" id="settings">
                            <form>
                                <h5 class="mb-4 text-uppercase"><i class="ri-contacts-book-2-line me-1"></i> Personal Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">First Name</label>
                                            <input type="text" class="form-control" id="firstname" placeholder="Enter first name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="lastname" class="form-label">Last Name</label>
                                            <input type="text" class="form-control" id="lastname" placeholder="Enter last name">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="userbio" class="form-label">Bio</label>
                                            <textarea class="form-control" id="userbio" rows="4" placeholder="Write something..."></textarea>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="useremail" placeholder="Enter email">
                                            <span class="form-text text-muted"><small>If you want to change email please <a href="javascript: void(0);">click</a> here.</small></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="userpassword" placeholder="Enter password">
                                            <span class="form-text text-muted"><small>If you want to change password please <a href="javascript: void(0);">click</a> here.</small></span>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="ri-building-line me-1"></i> Company Info</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="companyname" class="form-label">Company Name</label>
                                            <input type="text" class="form-control" id="companyname" placeholder="Enter company name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="cwebsite" class="form-label">Website</label>
                                            <input type="text" class="form-control" id="cwebsite" placeholder="Enter website url">
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <h5 class="mb-3 text-uppercase bg-light p-2"><i class="ri-global-line me-1"></i> Social</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-fb" class="form-label">Facebook</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ri-facebook-fill"></i></span>
                                                <input type="text" class="form-control" id="social-fb" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-tw" class="form-label">Twitter</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ri-twitter-line"></i></span>
                                                <input type="text" class="form-control" id="social-tw" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-insta" class="form-label">Instagram</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ri-instagram-line"></i></span>
                                                <input type="text" class="form-control" id="social-insta" placeholder="Url">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-lin" class="form-label">Linkedin</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ri-linkedin-fill"></i></span>
                                                <input type="text" class="form-control" id="social-lin" placeholder="Url">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-sky" class="form-label">Skype</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ri-skype-line"></i></span>
                                                <input type="text" class="form-control" id="social-sky" placeholder="@username">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="social-gh" class="form-label">Github</label>
                                            <div class="input-group">
                                                <span class="input-group-text"><i class="ri-github-line"></i></span>
                                                <input type="text" class="form-control" id="social-gh" placeholder="Username">
                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->

                                <div class="text-end">
                                    <button type="submit" class="btn btn-success mt-2"><i class="ri-save-line"></i> Save</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->

                    </div> <!-- end tab-content -->
                </div> <!-- end card body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
    </div>
</div>
@endsection