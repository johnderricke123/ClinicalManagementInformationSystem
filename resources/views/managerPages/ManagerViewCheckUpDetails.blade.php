@extends('manager_layout.managerLayout')

@section('manager_patient_profile_content')

<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<!-- Font Awesome -->
<link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="../../dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">



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
                            <strong><i class="fas fa-book mr-1"></i> Patient ID</strong>

                            <p class="text-muted">
                                {{$patient_personal_info->id}}
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
                                <li class="nav-item"><a class="nav-link" href="#generatePrescription" data-toggle="tab">Generate a prescription</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prescriptionHistory" data-toggle="tab">Prescription history</a></li>

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









                                <div class="tab-pane" id="generatePrescription">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Generate Prescription</h4>
                                                        </div>
                                                        <div class="card-body">

                                                            <form method="get" action="/ManagerGeneratePrescription">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-md-6">

                                                                        <input type="hidden" value="{{$patient_personal_info->id}}" name="PatientID"/>

                                                                            <div class="form-group">
                                                                                <label>Patient's Fullname</label>
                                                                                <input type="text" class="form-control" style="width: 100%;" name="PatientName" value="{{$patient_personal_info->FirstName}} {{$patient_personal_info->LastName}}" required="true" />
                                                                            </div>



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

                                                                            @php
                                                                            $dateNow = now();
                                                                            @endphp
                                                                            <div class="form-group">
                                                                                <label for="datetime">Date and Time:</label>
                                                                                <input type="datetime-local" class="form-control" id="datetime" name="DateAndTime" value="{{$dateNow}}" required="true">
                                                                            </div>



                                                                        </div>
                                                                        <!-- /.col -->
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label>Age</label>
                                                                                <input type="number" class="form-control" style="width: 100%;" value="{{$patient_personal_info->Age}}" name="Age" required="true" />
                                                                            </div>



                                                                            <div class="form-group">
                                                                                <label>Address</label>
                                                                                <input type="text" class="form-control" style="width: 100%;" name="Address" value="{{$patient_personal_info->Address}}" required="true" />
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label>Next check up</label>
                                                                                <input type="date" class="form-control" style="width: 100%;" name="NextCheckUp" />
                                                                            </div>


                                                                            <!-- /.form-group -->
                                                                        </div>
                                                                        <!-- /.col -->
                                                                    </div>
                                                                    <!-- /.row -->

                                                                    <textarea class="form-control" placeholder="Type your prescription" style="height: 500px;" name="Prescription" required="true"></textarea>



                                                                    <div class="float-right" style="padding: 20px;">
                                                                        <button type="submit" class="btn btn-primary btn-md" ><i class="fas fa-print"></i> Print</button>
                                                                    </div>

                                                                    <!-- <div class="float-right" style="padding: 20px;">
                                        <button type="submit" class="btn btn-primary btn-md"><i class="fas fa-print"></i> Print</button>
                                    </div> -->

                                                                    <!-- <div class="float-right" style="padding: 20px;">
                                            <button type="button" class="btn btn-primary btn-md" onclick="generatePrintableContent()"><i class="fas fa-print"></i> Print</button>
                                        </div> -->


                                                                    <!-- /.row -->
                                                                </div>
                                                                <!-- /.card-body -->
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <!-- /.tab-pane -->






                                <div class="tab-pane" id="prescriptionHistory">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card card-primary">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Prescription history</h4>
                                                        </div>
                                                        <div class="card-body">
                                                            <h1>Prescription history</h1>
<!-- prescription history content -->













<table border="0" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>Minimum date:</td>
            <td><input type="text" id="min" name="min"></td>
        </tr>
        <tr>
            <td>Maximum date:</td>
            <td><input type="text" id="max" name="max"></td>
        </tr>
    </tbody></table>
    <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Tiger Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011-04-25</td>
                <td>$320,800</td>
            </tr>
            <tr>
                <td>Garrett Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011-07-25</td>
                <td>$170,750</td>
            </tr>
            <tr>
                <td>Ashton Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009-01-12</td>
                <td>$86,000</td>
            </tr>
            <tr>
                <td>Cedric Kelly</td>
                <td>Senior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2012-03-29</td>
                <td>$433,060</td>
            </tr>
            <tr>
                <td>Airi Satou</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>33</td>
                <td>2008-11-28</td>
                <td>$162,700</td>
            </tr>
            <tr>
                <td>Brielle Williamson</td>
                <td>Integration Specialist</td>
                <td>New York</td>
                <td>61</td>
                <td>2012-12-02</td>
                <td>$372,000</td>
            </tr>
            <tr>
                <td>Herrod Chandler</td>
                <td>Sales Assistant</td>
                <td>San Francisco</td>
                <td>59</td>
                <td>2012-08-06</td>
                <td>$137,500</td>
            </tr>
            <tr>
                <td>Rhona Davidson</td>
                <td>Integration Specialist</td>
                <td>Tokyo</td>
                <td>55</td>
                <td>2010-10-14</td>
                <td>$327,900</td>
            </tr>
            <tr>
                <td>Colleen Hurst</td>
                <td>Javascript Developer</td>
                <td>San Francisco</td>
                <td>39</td>
                <td>2009-09-15</td>
                <td>$205,500</td>
            </tr>
            <tr>
                <td>Sonya Frost</td>
                <td>Software Engineer</td>
                <td>Edinburgh</td>
                <td>23</td>
                <td>2008-12-13</td>
                <td>$103,600</td>
            </tr>
            <tr>
                <td>Jena Gaines</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>30</td>
                <td>2008-12-19</td>
                <td>$90,560</td>
            </tr>
            <tr>
                <td>Quinn Flynn</td>
                <td>Support Lead</td>
                <td>Edinburgh</td>
                <td>22</td>
                <td>2013-03-03</td>
                <td>$342,000</td>
            </tr>
            <tr>
                <td>Charde Marshall</td>
                <td>Regional Director</td>
                <td>San Francisco</td>
                <td>36</td>
                <td>2008-10-16</td>
                <td>$470,600</td>
            </tr>
            <tr>
                <td>Haley Kennedy</td>
                <td>Senior Marketing Designer</td>
                <td>London</td>
                <td>43</td>
                <td>2012-12-18</td>
                <td>$313,500</td>
            </tr>
            <tr>
                <td>Tatyana Fitzpatrick</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>19</td>
                <td>2010-03-17</td>
                <td>$385,750</td>
            </tr>
            <tr>
                <td>Michael Silva</td>
                <td>Marketing Designer</td>
                <td>London</td>
                <td>66</td>
                <td>2012-11-27</td>
                <td>$198,500</td>
            </tr>
            <tr>
                <td>Paul Byrd</td>
                <td>Chief Financial Officer (CFO)</td>
                <td>New York</td>
                <td>64</td>
                <td>2010-06-09</td>
                <td>$725,000</td>
            </tr>
            <tr>
                <td>Gloria Little</td>
                <td>Systems Administrator</td>
                <td>New York</td>
                <td>59</td>
                <td>2009-04-10</td>
                <td>$237,500</td>
            </tr>
            <tr>
                <td>Bradley Greer</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>41</td>
                <td>2012-10-13</td>
                <td>$132,000</td>
            </tr>
            <tr>
                <td>Dai Rios</td>
                <td>Personnel Lead</td>
                <td>Edinburgh</td>
                <td>35</td>
                <td>2012-09-26</td>
                <td>$217,500</td>
            </tr>
            <tr>
                <td>Jenette Caldwell</td>
                <td>Development Lead</td>
                <td>New York</td>
                <td>30</td>
                <td>2011-09-03</td>
                <td>$345,000</td>
            </tr>
            <tr>
                <td>Yuri Berry</td>
                <td>Chief Marketing Officer (CMO)</td>
                <td>New York</td>
                <td>40</td>
                <td>2009-06-25</td>
                <td>$675,000</td>
            </tr>
            <tr>
                <td>Caesar Vance</td>
                <td>Pre-Sales Support</td>
                <td>New York</td>
                <td>21</td>
                <td>2011-12-12</td>
                <td>$106,450</td>
            </tr>
            <tr>
                <td>Doris Wilder</td>
                <td>Sales Assistant</td>
                <td>Sydney</td>
                <td>23</td>
                <td>2010-09-20</td>
                <td>$85,600</td>
            </tr>
            <tr>
                <td>Angelica Ramos</td>
                <td>Chief Executive Officer (CEO)</td>
                <td>London</td>
                <td>47</td>
                <td>2009-10-09</td>
                <td>$1,200,000</td>
            </tr>
            <tr>
                <td>Gavin Joyce</td>
                <td>Developer</td>
                <td>Edinburgh</td>
                <td>42</td>
                <td>2010-12-22</td>
                <td>$92,575</td>
            </tr>
            <tr>
                <td>Jennifer Chang</td>
                <td>Regional Director</td>
                <td>Singapore</td>
                <td>28</td>
                <td>2010-11-14</td>
                <td>$357,650</td>
            </tr>
            <tr>
                <td>Brenden Wagner</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>28</td>
                <td>2011-06-07</td>
                <td>$206,850</td>
            </tr>
            <tr>
                <td>Fiona Green</td>
                <td>Chief Operating Officer (COO)</td>
                <td>San Francisco</td>
                <td>48</td>
                <td>2010-03-11</td>
                <td>$850,000</td>
            </tr>
            <tr>
                <td>Shou Itou</td>
                <td>Regional Marketing</td>
                <td>Tokyo</td>
                <td>20</td>
                <td>2011-08-14</td>
                <td>$163,000</td>
            </tr>
            <tr>
                <td>Michelle House</td>
                <td>Integration Specialist</td>
                <td>Sydney</td>
                <td>37</td>
                <td>2011-06-02</td>
                <td>$95,400</td>
            </tr>
            <tr>
                <td>Suki Burks</td>
                <td>Developer</td>
                <td>London</td>
                <td>53</td>
                <td>2009-10-22</td>
                <td>$114,500</td>
            </tr>
            <tr>
                <td>Prescott Bartlett</td>
                <td>Technical Author</td>
                <td>London</td>
                <td>27</td>
                <td>2011-05-07</td>
                <td>$145,000</td>
            </tr>
            <tr>
                <td>Gavin Cortez</td>
                <td>Team Leader</td>
                <td>San Francisco</td>
                <td>22</td>
                <td>2008-10-26</td>
                <td>$235,500</td>
            </tr>
            <tr>
                <td>Martena Mccray</td>
                <td>Post-Sales support</td>
                <td>Edinburgh</td>
                <td>46</td>
                <td>2011-03-09</td>
                <td>$324,050</td>
            </tr>
            <tr>
                <td>Unity Butler</td>
                <td>Marketing Designer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009-12-09</td>
                <td>$85,675</td>
            </tr>
            <tr>
                <td>Howard Hatfield</td>
                <td>Office Manager</td>
                <td>San Francisco</td>
                <td>51</td>
                <td>2008-12-16</td>
                <td>$164,500</td>
            </tr>
            <tr>
                <td>Hope Fuentes</td>
                <td>Secretary</td>
                <td>San Francisco</td>
                <td>41</td>
                <td>2010-02-12</td>
                <td>$109,850</td>
            </tr>
            <tr>
                <td>Vivian Harrell</td>
                <td>Financial Controller</td>
                <td>San Francisco</td>
                <td>62</td>
                <td>2009-02-14</td>
                <td>$452,500</td>
            </tr>
            <tr>
                <td>Timothy Mooney</td>
                <td>Office Manager</td>
                <td>London</td>
                <td>37</td>
                <td>2008-12-11</td>
                <td>$136,200</td>
            </tr>
            <tr>
                <td>Jackson Bradshaw</td>
                <td>Director</td>
                <td>New York</td>
                <td>65</td>
                <td>2008-09-26</td>
                <td>$645,750</td>
            </tr>
            <tr>
                <td>Olivia Liang</td>
                <td>Support Engineer</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2011-02-03</td>
                <td>$234,500</td>
            </tr>
            <tr>
                <td>Bruno Nash</td>
                <td>Software Engineer</td>
                <td>London</td>
                <td>38</td>
                <td>2011-05-03</td>
                <td>$163,500</td>
            </tr>
            <tr>
                <td>Sakura Yamamoto</td>
                <td>Support Engineer</td>
                <td>Tokyo</td>
                <td>37</td>
                <td>2009-08-19</td>
                <td>$139,575</td>
            </tr>
            <tr>
                <td>Thor Walton</td>
                <td>Developer</td>
                <td>New York</td>
                <td>61</td>
                <td>2013-08-11</td>
                <td>$98,540</td>
            </tr>
            <tr>
                <td>Finn Camacho</td>
                <td>Support Engineer</td>
                <td>San Francisco</td>
                <td>47</td>
                <td>2009-07-07</td>
                <td>$87,500</td>
            </tr>
            <tr>
                <td>Serge Baldwin</td>
                <td>Data Coordinator</td>
                <td>Singapore</td>
                <td>64</td>
                <td>2012-04-09</td>
                <td>$138,575</td>
            </tr>
            <tr>
                <td>Zenaida Frank</td>
                <td>Software Engineer</td>
                <td>New York</td>
                <td>63</td>
                <td>2010-01-04</td>
                <td>$125,250</td>
            </tr>
            <tr>
                <td>Zorita Serrano</td>
                <td>Software Engineer</td>
                <td>San Francisco</td>
                <td>56</td>
                <td>2012-06-01</td>
                <td>$115,000</td>
            </tr>
            <tr>
                <td>Jennifer Acosta</td>
                <td>Junior Javascript Developer</td>
                <td>Edinburgh</td>
                <td>43</td>
                <td>2013-02-01</td>
                <td>$75,650</td>
            </tr>
            <tr>
                <td>Cara Stevens</td>
                <td>Sales Assistant</td>
                <td>New York</td>
                <td>46</td>
                <td>2011-12-06</td>
                <td>$145,600</td>
            </tr>
            <tr>
                <td>Hermione Butler</td>
                <td>Regional Director</td>
                <td>London</td>
                <td>47</td>
                <td>2011-03-21</td>
                <td>$356,250</td>
            </tr>
            <tr>
                <td>Lael Greer</td>
                <td>Systems Administrator</td>
                <td>London</td>
                <td>21</td>
                <td>2009-02-27</td>
                <td>$103,500</td>
            </tr>
            <tr>
                <td>Jonas Alexander</td>
                <td>Developer</td>
                <td>San Francisco</td>
                <td>30</td>
                <td>2010-07-14</td>
                <td>$86,500</td>
            </tr>
            <tr>
                <td>Shad Decker</td>
                <td>Regional Director</td>
                <td>Edinburgh</td>
                <td>51</td>
                <td>2008-11-13</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Michael Bruce</td>
                <td>Javascript Developer</td>
                <td>Singapore</td>
                <td>29</td>
                <td>2011-06-27</td>
                <td>$183,000</td>
            </tr>
            <tr>
                <td>Donna Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011-01-25</td>
                <td>$112,000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
            </tr>
        </tfoot>
    </table>












<!-- prescription history content -->
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
<!-- <script src="../../dist/js/demo.js"></script> -->



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



<!-- datatable with date range js code -->
<!-- mau ni naka cause ug nganung dile ma click ang image -->
    <!-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> -->
<!-- mau ni naka cause ug nganung dile ma click ang image -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
<script>
        var minDate, maxDate;
    
    // Custom filtering function which will search data in column four between two values
    DataTable.ext.search.push(function (settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[4]);
    
        if (
            (min === null && max === null) ||
            (min === null && date <= max) ||
            (min <= date && max === null) ||
            (min <= date && date <= max)
        ) {
            return true;
        }
        return false;
    });
    
    // Create date inputs
    minDate = new DateTime('#min', {
        format: 'MMMM Do YYYY'
    });
    maxDate = new DateTime('#max', {
        format: 'MMMM Do YYYY'
    });
    
    // DataTables initialisation
    var table = $('#example').DataTable();
    
    // Refilter the table
    $('#min, #max').on('change', function () {
        table.draw();
    });
</script>
@endsection