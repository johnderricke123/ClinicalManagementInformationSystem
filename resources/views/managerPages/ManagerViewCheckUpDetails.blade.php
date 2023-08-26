@extends('manager_layout.managerLayout')

@section('manager_patient_profile_content')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">





<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Patient profile</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
          <li class="breadcrumb-item active">Records</li>
          <li class="breadcrumb-item active">View patient records</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->




<div class="wrapper">
    <!-- Navbar -->









    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center" data-toggle="modal" data-target="#UploadPatientProfileModal">
                                <!-- <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture"> -->
                                <!-- <img src="dist/img/user2-160x160.jpg" alt=""/> -->
                                @if($patient_profiles->count() > 0)
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($patient_profiles[0]->Path)}}" style="width: 200px; height: 200px;" alt="Logo">
                                @endif
                                @if($patient_profiles->count() <= 0 && $patient_personal_info->Gender == 'Male' )
                                    <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/avatar.png')}}" alt="profile" />
                                    <!-- <img src="dist/img/avatar.png" alt="profile"/> -->

                                    @endif
                                    @if($patient_profiles->count() <= 0 && $patient_personal_info->Gender == 'Female' )
                                        <img class="profile-user-img img-fluid img-circle" src="{{ asset('dist/img/avatar2.png')}}" alt="profile" />
                                        <!-- <img src="dist/img/avatar.png" alt="profile"/> -->

                                        @endif
                                        <!-- <div class="file btn btn-lg btn-primary" data-toggle="modal" data-target="#UploadPatientProfileModal">
                                            Change Photo
                                        </div> -->

                            </div>

                            <h3 class="profile-username text-center">{{$patient_personal_info->FirstName}} {{$patient_personal_info->LastName}}</h3>

                            <p class="text-muted text-center">{{$patient_personal_info->Occupation}}</p>

                            <!-- <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Followers</b> <a class="float-right">1,322</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Following</b> <a class="float-right">543</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Friends</b> <a class="float-right">13,287</a>
                                </li>
                            </ul> -->

                            <a href="#" class="btn btn-primary btn-block" data-toggle="modal" data-target="#EditPatientModal"><b>Edit profile</b></a>

                            <!-- <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditPatientModal">
                                <i class="fas fa-edit"></i> Edit
                            </button> -->

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">About Me</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Education</strong>

                            <p class="text-muted">
                                B.S. in Computer Science from the University of Tennessee at Knoxville
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                            <p class="text-muted">Malibu, California</p>

                            <hr>

                            <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">UI Design</span>
                                <span class="tag tag-success">Coding</span>
                                <span class="tag tag-info">Javascript</span>
                                <span class="tag tag-warning">PHP</span>
                                <span class="tag tag-primary">Node.js</span>
                            </p>

                            <hr>

                            <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Informations</a></li>
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Check up history</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Images</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Generate a prescription</a></li>
                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- personal informations tab -->
                                <div class="active tab-pane" id="activity">
                                    <!-- Post -->
                                    <div class="post">






                                        <div class="timeline timeline-inverse">
                                            <!-- timeline time label -->
                                            <!-- <div class="time-label">
                                                        <span class="bg-danger">
                                                            10 Feb. 2014
                                                        </span>
                                                    </div> -->
                                            <!-- /.timeline-label -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-map-marker-alt"></i>
                                                <!-- <h3 class="badge badge-primary">Address</h3> -->
                                                <!-- <h4><i class="badge badge-secondary bg-primary">A</i></h4> -->

                                                <div class="timeline-item">

                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><a href="#"><b>Address</b></a> </span>
                                                        </div>
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><b>{{$patient_personal_info->Address}}</b></span>
                                                        </div>
                                                        <!-- <div class="col-sm">
                                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                            </div> -->
                                                    </div>


                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->

                                            <div>
                                                <i class="fas fa-user bg-info"></i>

                                                <div class="timeline-item">
                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><a href="#"><b>Fullname</b></a> </span>
                                                        </div>
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><b>{{$patient_personal_info->FirstName}} {{$patient_personal_info->LastName}}</b></span>
                                                        </div>
                                                        <!-- <div class="col-sm">
                                                                    <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                                </div> -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->


                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-birthday-cake bg-warning"></i>

                                                <div class="timeline-item">
                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><a href="#"><b>Age</b></a> </span>
                                                        </div>
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><b>{{$patient_personal_info->Age}}</b></span>
                                                        </div>
                                                        <!-- <div class="col-sm">
                                                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                                    </div> -->
                                                    </div>

                                                </div>
                                            </div>



                                            <div>
                                                <i class="fas fa-venus-mars bg-secondary"></i>

                                                <div class="timeline-item">
                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><a href="#"><b>Gender</b></a> </span>
                                                        </div>
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><b>{{$patient_personal_info->Gender}}</b></span>
                                                        </div>
                                                        <!-- <div class="col-sm">
                                                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                                    </div> -->
                                                    </div>

                                                </div>
                                            </div>




                                            <div>
                                                <i class="fas fa-address-book bg-info"></i>

                                                <div class="timeline-item">
                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><a href="#"><b>Contact</b></a> </span>
                                                        </div>
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><b>{{$patient_personal_info->Contact}}</b></span>
                                                        </div>
                                                        <!-- <div class="col-sm">
                                                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                                    </div> -->
                                                    </div>

                                                </div>
                                            </div>





                                            <div>
                                                <i class="fas fa-briefcase bg-secondary"></i>

                                                <div class="timeline-item">
                                                    <div class="row" style="padding: 10px;">
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><a href="#"><b>Occupation</b></a> </span>
                                                        </div>
                                                        <div class="col-sm">
                                                            <span class="timeline-header"><b>{{$patient_personal_info->Occupation}}</b></span>
                                                        </div>
                                                        <!-- <div class="col-sm">
                                                                        <span class="time"><i class="far fa-clock"></i> 12:05</span>
                                                                    </div> -->
                                                    </div>

                                                </div>
                                            </div>



                                            <!-- 
                                            <div>
                                                <i class="far fa-clock bg-gray"></i>
                                            </div> -->
                                        </div>



                                        <!-- <div class="row">
                            <div class="col-md-6">
                                <label>Address</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->Address}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->FirstName}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Surname</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->LastName}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Age</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->Age}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Gender</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->Gender}}</p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <label>Phone</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->Contact}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Occupation</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_personal_info->Occupation}}</p>
                            </div>
                        </div> -->




                                    </div>
                                    <!-- /.post -->

                                    <!-- /.post -->

                                    <!-- /.post -->
                                </div>
                                <!-- /.tab-pane -->


                                <!-- personal informations tab -->






                                <div class="tab-pane" id="timeline">
                                    <!-- The timeline -->
                                    <div class="timeline timeline-inverse">
                                        <!-- timeline time label -->

                                        <!-- /.timeline-label -->


                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-user bg-info"></i>
                                            <div class="timeline-item">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><a href="#"><b>Doctor's Name</b></a> </span>
                                                    </div>
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><b>{{$patient_check_up_details->DoctorName}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->




                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-envelope bg-primary"></i>
                                            <div class="timeline-item">
                                                <span class="time"><i class="far fa-clock"></i> 12:05</span>

                                                <h3 class="timeline-header"><a href="#">Diagnosis</a></h3>

                                                <div class="timeline-body">
                                                    {!! nl2br(e($patient_check_up_details->Diagnosis)) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->

                                        <!-- timeline item -->
                                        <div>
                                            <i class="fas fa-comments bg-warning"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header"><a href="#">Laboratory Findings</a></h3>
                                                <div class="timeline-body">
                                                    {!! nl2br(e($patient_check_up_details->LabFindings)) !!}
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->


                                        <div>
                                            <i class="fas fa-user bg-info"></i>

                                            <div class="timeline-item">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><a href="#"><b>Date and time of check up</b></a> </span>
                                                    </div>
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><b>{{$patient_check_up_details->DateAndTimeOfCheckUp}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div>
                                            <i class="fas fa-user bg-info"></i>
                                            <div class="timeline-item">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><a href="#"><b>Registration date</b></a> </span>
                                                    </div>
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><b>{{$patient_check_up_details->Added_at}}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>












                                        <!-- /.timeline-label -->

                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.tab-pane -->



                                <div class="tab-pane" id="settings">















                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Files</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                @foreach($patient_files as $pf)
                                                                <div class="col-sm-2">
                                                                    <!-- <a href="{{ asset($pf->Path)}}" data-toggle="lightbox" data-title="{{$pf->FileName}}" data-gallery="gallery" style="height: 1000px;"> -->
                                                                    <!-- <img src="https://via.placeholder.com/300/FFFFFF?text=1" class="img-fluid mb-2" alt="white sample"/> -->
                                                                    <!-- <img src="{{ asset($pf->Path)}}" class="img-fluid mb-2" alt="white sample" style="height: 100px;" /> -->
                                                                    </a>
                                                                </div>
                                                                @endforeach

                                                                <!-- Testing table for images -->
                                                                <form method="post" action="{{ route('managerDeleteAllSelectedImages')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="card">
                                                                        <div class="card-header border-0">
                                                                            <h3 class="card-title">Images</h3>
                                                                            <div class="card-tools">
                                                                                <a href="#" class="btn btn-tool btn-sm" data-toggle="modal" data-target="#UploadPatientImageModal">
                                                                                    <i class="fas fa-plus"></i> Upload
                                                                                </a>
                                                                                <button type="submit" class="btn btn-tool btn-sm">
                                                                                    <i class="fas fa-trash"></i> Delete Selection
                                                                                </button>
                                                                            </div>
                                                                        </div>


                                                                        <div class="card-body table-responsive p-0">
                                                                            <table class="table table-striped table-valign-middle">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Checkbox</th>
                                                                                        <th>Image</th>
                                                                                        <th>Filename</th>
                                                                                        <th>Date and time uploaded</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @foreach($patient_files as $pf)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="form-check">
                                                                                                <div class="d-flex justify-content-center">
                                                                                                    <input class="form-check-input" type="checkbox" value="{{$pf->id}}" name="imageID[]" id="flexCheckDefault">
                                                                                                    <!-- <input type="hidden" value="{{$pf->Path}}" name="ImagePath[]" id="flexCheckDefault" /> -->

                                                                                                </div>

                                                                                            </div>
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="{{ asset($pf->Path)}}" data-toggle="lightbox" data-title="{{$pf->FileName}}" data-gallery="gallery" style="height: 1000px;">
                                                                                                <!-- <img src="{{ asset($pf->Path)}}" alt="Product 1" class="img-circle img-size-32 mr-2"> -->
                                                                                                <img src="{{ asset($pf->Path)}}" class="img-fluid mb-2" alt="white sample" style="height: 100px; width: 100px;" />


                                                                                        </td>
                                                                                        <td>{{$pf->FileName}}</td>
                                                                                        <td>
                                                                                            <!-- <small class="text-success mr-1">
                                                                            <i class="fas fa-arrow-up"></i>
                                                                            12%
                                                                        </small>
                                                                        12,000 Sold -->
                                                                                            {{$pf->Added_at}}
                                                                                        </td>
                                                                                        <td>
                                                                                            <a href="#" class="text-muted">
                                                                                                <!-- <form method="post" action="/ManagerDeleteImage">
                                                                                    @csrf -->
                                                                                                <!-- <button class="btn btn-tool btn-sm" data-toggle="modal" data-target="#UploadPatientImageModal"> -->
                                                                                                <a class="btn btn-danger btn-sm text-white" data-toggle="modal" data-target="#DeleteImageModal{{$pf->id}}">
                                                                                                    <i class="fas fa-trash"></i> Delete
                                                                                                </a>

                                                                                                <!-- <input type="hidden" value="{{$pf->Path}}" name="ImagePath"/> -->
                                                                                                <!-- </form> -->
                                                                                            </a>
                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach

                                                                                </tbody>
                                                                            </table>
                                                                        </div>



                                                                    </div>
                                                                </form>
                                                                <!-- /.card -->
                                                                <!-- Testing table for images -->


                                                                <!-- <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/000000.png?text=2" data-toggle="lightbox" data-title="sample 2 - black" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/000000?text=2" class="img-fluid mb-2" alt="black sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=3" data-toggle="lightbox" data-title="sample 3 - red" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=3" class="img-fluid mb-2" alt="red sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=4" data-toggle="lightbox" data-title="sample 4 - red" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=4" class="img-fluid mb-2" alt="red sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/000000.png?text=5" data-toggle="lightbox" data-title="sample 5 - black" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/000000?text=5" class="img-fluid mb-2" alt="black sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=6" data-toggle="lightbox" data-title="sample 6 - white" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FFFFFF?text=6" class="img-fluid mb-2" alt="white sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=7" data-toggle="lightbox" data-title="sample 7 - white" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FFFFFF?text=7" class="img-fluid mb-2" alt="white sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/000000.png?text=8" data-toggle="lightbox" data-title="sample 8 - black" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/000000?text=8" class="img-fluid mb-2" alt="black sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FF0000/FFFFFF.png?text=9" data-toggle="lightbox" data-title="sample 9 - red" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FF0000/FFFFFF?text=9" class="img-fluid mb-2" alt="red sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=10" data-toggle="lightbox" data-title="sample 10 - white" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FFFFFF?text=10" class="img-fluid mb-2" alt="white sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/FFFFFF.png?text=11" data-toggle="lightbox" data-title="sample 11 - white" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/FFFFFF?text=11" class="img-fluid mb-2" alt="white sample"/>
                                                    </a>
                                                </div>
                                                <div class="col-sm-2">
                                                    <a href="https://via.placeholder.com/1200/000000.png?text=12" data-toggle="lightbox" data-title="sample 12 - black" data-gallery="gallery">
                                                    <img src="https://via.placeholder.com/300/000000?text=12" class="img-fluid mb-2" alt="black sample"/>
                                                    </a>
                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
































                                </div>
                                <!-- /.tab-pane -->
                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->















<!-- _________________________Modals_________________________ -->



<form method="post" action="{{ route('managerEditPatientInformations')}}">
    @csrf
    <div class="modal fade" id="EditPatientModal" tabindex="-1" role="dialog" aria-labelledby="EditPatientModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Patients Personal Informations and check up details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>One fine body&hellip;</p>






                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Patients check up details</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" value="{{$patient_check_up_details->id}}" name="patientID" />
                                    <div class="form-group">
                                        <label>Doctor's Name</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="DoctorName" value="{{$patient_check_up_details->DoctorName}}" required="true" />
                                    </div>
                                    <div class="form-group">
                                        <label>Laboratory findings</label>
                                        <textarea class="form-control" multiple="multiple" data-placeholder="Type your findings here" style="width: 100%; height: 100px;" name="LaboratoryFindings" required="true"> {{$patient_check_up_details->LabFindings}}</textarea>
                                    </div>
                                    <!-- /.form-group -->
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Diagnosis</label>
                                        <textarea class="form-control" multiple="multiple" style="width: 100%; height: 100px;" name="Diagnosis" required="true"> {{$patient_check_up_details->Diagnosis}} </textarea>
                                    </div>
                                    <!-- /.form-group -->
                                    <!-- <div class="form-group">
            <label>Date and time of check up</label>
            <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" name="DateAndTimeOfCheckUp" />
              <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div> -->

                                    <div class="form-group">
                                        <label for="datetime">Date and Time:</label>
                                        <input type="datetime-local" class="form-control" id="datetime" name="DateAndTimeOfCheckUp" value="{{$patient_check_up_details->DateAndTimeOfCheckUp}}" required="true">
                                    </div>


                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <!-- <div class="card-footer">
      Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
      the plugin.
    </div> -->
                    </div>
                    <!-- /.card -->









                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-secondary">
                        <div class="card-header">
                            <h3 class="card-title">Patient's Personal Informations</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>First name</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="PatientName" value="{{$patient_personal_info->FirstName}}" required="true" />
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="PatientAddress" value="{{$patient_personal_info->Address}}" required="true" />
                                    </div>
                                    <div class="form-group">
                                        <label>Place of birth</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="PatientPlaceOfBirth" value="{{$patient_personal_info->PlaceOfBirth}}" required="true" />
                                    </div>
                                    <div class="form-group">
                                        <label>Occupation</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="PatientOccupation" value="{{$patient_personal_info->Occupation}}" required="true" />
                                    </div>
                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Last name</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="PatientLastName" value="{{$patient_personal_info->LastName}}" required="true" />

                                    </div>
                                    <!-- /.form-group -->
                                    <!-- <div class="form-group">
            <label>Date of birth</label>
            <div class="input-group date" id="reservationdatetime2" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime2" name="PatientDateOfBirth" />
              <div class="input-group-append" data-target="#reservationdatetime2" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
              </div>
            </div>
          </div> -->
                                    <div class="row">

                                        <div class="col-sm">
                                            <div class="row"><label>Sex</label></div>
                                            @if($patient_personal_info->Gender == 'Male')
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Male" checked>
                                                <label>Male</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Female">
                                                <label>Female</label>
                                            </div>

                                            @endif

                                            @if($patient_personal_info->Gender == 'Female')
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Male">
                                                <label>Male</label>
                                            </div>

                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Female" checked>
                                                <label>Female</label>
                                            </div>
                                            @endif

                                        </div>
                                        <div class="col-sm">
                                            <div class="form-group">
                                                <label for="Age">Age</label>
                                                <input class="form-control" type="number" value="{{$patient_personal_info->Age}}" name="Age" id="Age" />
                                            </div>
                                        </div>

                                    </div>


                                    <div class="form-group">
                                        <label for="datetime">Date of birth</label>
                                        <input type="date" class="form-control" id="datetime" name="PatientDateOfBirth" value="{{$patient_personal_info->DateOfBirth}}" required="true">
                                    </div>

                                    <div class="form-group">
                                        <label>Contact number or email</label>
                                        <input type="text" class="form-control" style="width: 100%;" name="PatientContact" value="{{$patient_personal_info->Contact}}" required="true" />
                                    </div>


                                    <!-- /.form-group -->
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                            the plugin.
                        </div>
                    </div>
                    <!-- /.card -->

</form>














</div>
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Save changes</button>
</div>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!-- /.modal -->











@foreach($patient_files as $pf)
<div class="modal fade" id="DeleteImageModal{{$pf->id}}" tabindex="-1" role="dialog" aria-labelledby="DeleteImageModalLabel{{$pf->id}}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Delete Confirmation</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are yuo sure you want to delete this image?</p>
                <!-- <input type="text" value="{{$pf->FileName}}" name="ImagePath" /> -->
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->

                <form method="post" action="/ManagerDeleteImage">
                    @csrf
                    <!-- <button class="btn btn-tool btn-sm" data-toggle="modal" data-target="#UploadPatientImageModal"> -->
                    <button type="submit" class="btn btn-danger btn-sm" value="{{$pf->id}}" name="ImageID">
                        <i class="fas fa-trash"></i> Delete
                    </button>

                    <input type="hidden" value="{{$pf->Path}}" name="ImagePath" />
                </form>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
@endforeach







<div class="modal fade" id="UploadPatientImageModal" tabindex="-1" role="dialog" aria-labelledby="UploadPatientImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <form method="post" action="{{route('managerUploadImage')}}" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="UploadPatientImageModalLabel">Upload Patient Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- Multiple files upload -->
                    <div class="card card-default">
                        <!-- <div class="card bg-warning card-header">
                            <h3 class="card-title">Upload images here </h3> 
                            </div> -->
                        <div class="card-body">

                            <div class="container">
                                <h1>Image Upload</h1>

                                <div class="mb-3">
                                    <label for="fileInput" class="form-label">Select Files</label>
                                    <input type="file" name="files[]" id="fileInput" class="form-control" required="true" multiple>
                                    <input type="hidden" value="{{$patient_personal_info->id}}" name="PatientID" />
                                </div>

                                <div class="row" id="filePreview">
                                    <!-- File preview will be dynamically added here -->
                                </div>

                                <!-- <button type="submit" class="btn btn-primary mt-3">Upload</button> -->
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>




<!-- <form method="post" action="{{ route('uploadPatientProfilePicture')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="file" name="file" />
                            </form> -->



<div class="modal fade" id="UploadPatientProfileModal" tabindex="-1" role="dialog" aria-labelledby="UploadPatientProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="UploadPatientProfileModalLabel">Upload Patient Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('uploadPatientProfilePicture')}}" enctype="multipart/form-data">
                    @csrf

                    <input type="file" name="file" />
                    <input type="hidden" value="{{$patient_personal_info->id}}" name="patientID" />

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>





<!-- Scheduled Form Modal -->
<!-- <div class="modal fade" id="UploadPatientImageModal" tabindex="-1" role="dialog" aria-labelledby="UploadPatientImageModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="UploadPatientImageModalLabel">Upload Patient Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/ManagerAddScheduledList">
                        @csrf


                        <div class="p-1">
                            <input class="form-control" placeholder="Doctor's Name" name="DoctorsName" />
                        </div>
                        <div class="p-1">

                            <textarea class="form-control" placeholder="Reason for Appointment(Optional)" name="AppointmentReason"></textarea>
                        </div>
                        <div class="p-1">
                            <input type="datetime-local" class="form-control" placeholder="Start date and time" name="StartDateAndTime" />
                        </div>
                        <div class="p-1">
                            <input type="datetime-local" class="form-control" placeholder="End date and time" name="EndDateAndTime" />
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
                </form>
            </div>
        </div>
    </div> -->
<!-- Scheduled Form Modal -->











<!-- _________________________End Modals_________________________ -->



















<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="../../dist/js/demo.js"></script>
 -->











<!-- <script>
        function openPopup() {
            const popupUrl = "{{ route('open-popup') }}";


            const popupWindow = window.open(popupUrl, "_blank", "width=600,height=400");
        }
    </script> -->

<script src="{{ asset('vendor/sweetalert/sweetalert.all.js') }}"></script>

<!-- mau ni hinungdan nganung dile maclick ang images -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- mau ni hinungdan nganung dile maclick ang images -->

<script>
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');

    fileInput.addEventListener('change', function(event) {
        const fileList = event.target.files;

        // Clear previous file preview
        filePreview.innerHTML = '';

        // Display file preview for each selected file
        for (let i = 0; i < fileList.length; i++) {
            const file = fileList[i];
            const reader = new FileReader();

            // Create a preview container for the file
            const previewContainer = document.createElement('div');
            previewContainer.classList.add('col-md-3', 'mt-3');

            // Create an image element for image files
            if (file.type.startsWith('image/')) {
                const imgElement = document.createElement('img');
                imgElement.classList.add('img-thumbnail');

                // Apply a static width and height to the image
                imgElement.style.width = '200px'; // Set your desired width
                imgElement.style.height = '200px'; // Set your desired height

                reader.onload = function(event) {
                    imgElement.src = event.target.result;
                };
                reader.readAsDataURL(file);
                previewContainer.appendChild(imgElement);
            }

            // Create a preview text for non-image files
            else {
                const previewText = document.createElement('p');
                previewText.textContent = file.name;
                previewContainer.appendChild(previewText);
            }

            // Create a remove button for the file
            const removeButton = document.createElement('button');
            removeButton.classList.add('btn', 'btn-danger', 'mt-2');
            removeButton.textContent = 'Remove';
            removeButton.addEventListener('click', function() {
                previewContainer.remove();
            });
            previewContainer.appendChild(removeButton);

            // Append the preview container to the file preview element
            filePreview.appendChild(previewContainer);
        }
    });
</script>




<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Ekko Lightbox -->
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- Filterizr-->
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    // function printContent() {
    //     window.open("/ManagerPrescriptionPrint", "_blank", "width=800,height=600");
    // }

    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

        $('.filter-container').filterizr({
            gutterPixels: 3
        });
        $('.btn[data-filter]').on('click', function() {
            $('.btn[data-filter]').removeClass('active');
            $(this).addClass('active');
        });
    })
</script>

@endsection