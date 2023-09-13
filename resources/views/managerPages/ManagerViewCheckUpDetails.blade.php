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
                                <img class="profile-user-img img-fluid img-circle" src="{{ asset($patient_profiles[0]->Path)}}" style="width: 100px; height: 90px;" alt="Logo">
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

                            <div class="d-flex justify-content-center">
                                <div class="row">
                                    <div style="padding: 3px;">
                                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#UploadPatientProfileModal"><i class="fas fa-file-upload"></i></button>
                                    </div>
                                    <div style="padding: 3px;">
                                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                    </div>
                                </div>
                            </div>
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

                            <p class="text-muted">{{$patient_personal_info->Address}}</p>

                            <hr>

                            <strong><i class="fas fa-birthday-cake mr-1"></i> Age</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">{{$patient_personal_info->Age}}</span>
                            </p>

                            <hr>

                            <strong><i class="fas fa-venus-mars mr-1"></i> Gender</strong>

                            <p class="text-muted">{{$patient_personal_info->Gender}}</p>

                            <hr>

                            <strong><i class="fas fa-address-book mr-1"></i> Contact</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">{{$patient_personal_info->Contact}}</span>
                            </p>

                            <hr>

                            <strong><i class="fas fa-briefcase mr-1"></i> Occupation</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">{{$patient_personal_info->Occupation}}</span>
                            </p>


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
                                <!-- <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Personal Informations</a></li> -->
                                <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Check up history</a></li>
                                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Images</a></li>
                                <li class="nav-item"><a class="nav-link" href="#generatePrescription" data-toggle="tab">Generate a prescription</a></li>
                                <li class="nav-item"><a class="nav-link" href="#prescriptionHistory" data-toggle="tab">Prescription history</a></li>

                            </ul>
                        </div><!-- /.card-header -->
                        <div class="card-body">
                            <div class="tab-content">

                                <!-- personal informations tab -->







                                <div class="active tab-pane" id="timeline">
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
                                            <i class="fas fa-diagnoses"></i>
                                            <div class="timeline-item">


                                                <h3 class="timeline-header"><a href="#">Diagnosis <div class="float-right"> <button class="btn btn-sm text-blue" data-toggle="modal" data-target="#AddPatientDiagnosisModal"> <i class="fas fa-plus"></i> <b>Add a diagnosis</b></button></div> </a></h3>

                                                <div class="timeline-body">


                                                    <!-- diagnosis table -->

                                                    @php
                                                    use Carbon\Carbon;
                                                    use Illuminate\Support\Str;
                                                    @endphp



                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card card-primary">
                                                                        <!-- <div class="card-header">
                                                                            <h4 class="card-title">Diagnosis history</h4>
                                                                        </div> -->
                                                                        <div class="card-body">
                                                                            <!-- <h1>Diagnosis history</h1> -->
                                                                            <!-- prescription history content -->






                                                                            <table id="example3" class="display" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Generated at</th>
                                                                                        <th>Diagnosis</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    @foreach($patient_diagnosis_history as $pdh)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="d-flex justify-content-center">
                                                                                                <div class="badge badge-warning badge-md">{{ Carbon::parse($pdh->DateGenerated)->format('Y/m/d g:i A') }}</div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>{{Str::words($pdh->Diagnosis, 6, ' ...')}}</td>

                                                                                        <td>
                                                                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ViewPatientDiagnosisModal{{$pdh->id}}">View</button>
                                                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeletePatientDiagnosisModal{{$pdh->id}}">Delete</button>

                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach


                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <th>Diagnosis</th>
                                                                                        <th>Generated at</th>
                                                                                        <th>Action</th>
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
                                                    <!-- /.tab-pane -->



                                                    <!-- diagnosis table -->


                                                    <script>
                                                        $('#example3').DataTable({
                                                            "order": [
                                                                    [0, 'desc']
                                                                ], // 0 represents the index of the "Generated at" column, 'desc' means descending order
                                                        });
                                                    </script>



















                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->

                                        <!-- timeline item -->
                                        <div>
                                            <i class="fa-solid fa-flask-gear"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header"><a href="#">Laboratory Findings <div class="float-right"> <button class="btn btn-sm text-blue" data-toggle="modal" data-target="#AddPatientLaboratoryFindingsModal"> <i class="fas fa-plus"></i> <b>Add a laboratory finding</b></button></div></a></h3>
                                                <div class="timeline-body">
                                                    {!! nl2br(e($patient_check_up_details->LabFindings)) !!}




                                                    <!-- laboratory findings table -->
                                                    <section class="content">
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="card card-primary">
                                                                        <!-- <div class="card-header">
                                                                            <h4 class="card-title">Diagnosis history</h4>
                                                                        </div> -->
                                                                        <div class="card-body">
                                                                            <!-- <h1>Diagnosis history</h1> -->
                                                                            <!-- prescription history content -->

                                                                            <table id="example4" class="display" style="width:100%">
                                                                                <thead>
                                                                                    <tr>
                                                                                        <th>Generated at</th>
                                                                                        <th>Findings</th>
                                                                                        <th>Action</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>

                                                                                    @foreach($patient_laboratory_findings as $plf)
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div class="d-flex justify-content-center">
                                                                                                <div class="badge badge-warning badge-md">{{ Carbon::parse($plf->DateGenerated)->format('Y/m/d g:i A') }}</div>
                                                                                            </div>
                                                                                        </td>
                                                                                        <td>{{Str::words($plf->LaboratoryFindings, 6, ' ...')}}</td>

                                                                                        <td>
                                                                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ViewPatientLaboratoryFindingsModal{{$plf->id}}">View</button>
                                                                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#DeletePatientLaboratoryFindingsModal{{$plf->id}}">Delete</button>

                                                                                        </td>
                                                                                    </tr>
                                                                                    @endforeach


                                                                                </tbody>
                                                                                <tfoot>
                                                                                    <tr>
                                                                                        <th>Diagnosis</th>
                                                                                        <th>Generated at</th>
                                                                                        <th>Action</th>
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
                                                    <!-- laboratory findings table -->


                                                    <script>
                                                        $('#example4').DataTable({
                                                            "order": [
                                                                    [0, 'desc']
                                                                ], // 0 represents the index of the "Generated at" column, 'desc' means descending order
                                                        });
                                                    </script>












                                                </div>
                                            </div>
                                        </div>
                                        <!-- END timeline item -->


                                        <div>
                                            <i class="fas fa-clock"></i>

                                            <div class="timeline-item">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><a href="#"><b>Date and time of check up</b></a> </span>
                                                    </div>
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><b>{{ Carbon::parse($patient_check_up_details->DateAndTimeOfCheckUp)->format('Y/m/d g:i A') }}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div>
                                            <i class="fas fa-clock"></i>
                                            <div class="timeline-item">
                                                <div class="row" style="padding: 10px;">
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><a href="#"><b>Registration date</b></a> </span>
                                                    </div>
                                                    <div class="col-sm">
                                                        <span class="timeline-header"><b>{{ Carbon::parse($patient_check_up_details->Added_at)->format('Y/m/d') }}</b></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>












                                        <!-- /.timeline-label -->


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

                                                                            <input type="hidden" value="{{$patient_personal_info->id}}" name="PatientID" />

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
                                                                        <button type="submit" class="btn btn-primary btn-md"><i class="fas fa-print"></i> Print</button>
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










                                                            <div class="container-fluid">
                                                                <table border="0" cellspacing="5" cellpadding="5">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>Minimum date:</td>
                                                                            <td><input type="text" id="min" name="min"></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Maximum date:</td>
                                                                            <td><input type="text" id="max" name="max"></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <table id="example" class="display nowrap" style="width:100%">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Patient Name</th>
                                                                            <th>Gender</th>
                                                                            <th>Prescription</th>
                                                                            <th>Generated at</th>
                                                                            <th>Age</th>
                                                                            <th>Address</th>
                                                                            <th>Next check up</th>
                                                                            <!-- <th>Generated at</th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        @foreach($patient_prescription_histories as $pph)
                                                                        <tr>
                                                                            <td>{{$pph->PatientName}}</td>
                                                                            <td>{{$pph->Gender}}</td>
                                                                            <td>{{Str::words($pph->Prescription, 6, ' ...')}}</td>
                                                                            <td>{{ Carbon::parse($pph->DateAndTime)->format('Y/m/d') }}</td>
                                                                            <td>{{$pph->Age}}</td>
                                                                            <td>{{$pph->Address}}</td>
                                                                            <td>{{$pph->NextCheckUp}}</td>
                                                                            <!-- <td>{{$pph->created_at}}</td> -->
                                                                        </tr>
                                                                        @endforeach

                                                                    </tbody>
                                                                    <tfoot>
                                                                        <tr>
                                                                            <th>Patient Name</th>
                                                                            <th>Gender</th>
                                                                            <th>Prescription</th>
                                                                            <th>Generated at</th>
                                                                            <th>Age</th>
                                                                            <th>Address</th>
                                                                            <th>Next check up</th>
                                                                            <!-- <th>Generated at</th> -->
                                                                        </tr>
                                                                    </tfoot>
                                                                </table>
                                                            </div>











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


@foreach($patient_laboratory_findings as $plfMod)
<div class="modal fade" id="ViewPatientLaboratoryFindingsModal{{$plfMod->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewPatientDiagnosisModalLabel{{$plfMod->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewPatientDiagnosisModalLabel{{$plfMod->id}}">Patient's laboratory findings modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span><b>{{$plfMod->DateGenerated}}</b></span>
                <span>{!! nl2br(e($plfMod->LaboratoryFindings)) !!}</span>
            </div>
        </div>
    </div>
</div>

@endforeach


@foreach($patient_laboratory_findings as $plfMod)
<div class="modal fade" id="DeletePatientLaboratoryFindingsModal{{$plfMod->id}}" tabindex="-1" role="dialog" aria-labelledby="DeletePatientLaboratoryFindingsModalLabel{{$plfMod->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeletePatientLaboratoryFindingsModalLabel{{$plfMod->id}}">Patient's laboratory findings modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span><b>{{$plfMod->DateGenerated}}</b></span>
                <span>{!! nl2br(e($plfMod->LaboratoryFindings)) !!}</span>
                <input type="text" value="{{$plfMod->id}}" name="id"/>
            </div>
        </div>
    </div>
</div>

@endforeach

<!-- DeletePatientLaboratoryFindingsModal{{$plf->id}} -->




<div class="modal fade" id="AddPatientLaboratoryFindingsModal" tabindex="-1" role="dialog" aria-labelledby="AddPatientLaboratoryFindingsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddPatientLaboratoryFindingsModalLabel">Add a laboratory findings</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Add laboratory findings modal</h4>
                <form method="post" action="{{route ('managerAddPatientLaboratoryFindings')}}">
                    @csrf
                    <span><b>Laboratory findings</b></span>
                    <textarea style="height: 3in;" class="form-control" name="LaboratoryFindings" placeholder="Type your findings"></textarea>
                    <input type="hidden" value="{{$patient_personal_info->id}}" name="PatientID" />

                    <div class="row">
                        <div class="col"></div>
                        <div class="float-right" style="padding: 10px;"><button class="btn btn-primary btn-md" type="submit">Submit</button></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade" id="AddPatientDiagnosisModal" tabindex="-1" role="dialog" aria-labelledby="AddPatientDiagnosisModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AddPatientDiagnosisModalLabel">Upload Patient Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h4>Add diagnosis modal</h4>
                <form method="post" action="{{route ('managerAddPatientDiagnosis')}}">
                    @csrf
                    <span><b>Diagnosis</b></span>
                    <textarea class="form-control" name="Diagnosis" placeholder="Type your diagnosis"></textarea>
                    <input type="hidden" value="{{$patient_personal_info->id}}" name="PatientID" />

                    <div class="row">
                        <div class="col"></div>
                        <div class="float-right" style="padding: 10px;"><button class="btn btn-primary btn-md" type="submit">Submit</button></div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


@foreach($patient_diagnosis_history as $pdhMod)
<div class="modal fade" id="ViewPatientDiagnosisModal{{$pdhMod->id}}" tabindex="-1" role="dialog" aria-labelledby="ViewPatientDiagnosisModalLabel{{$pdhMod->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ViewPatientDiagnosisModalLabel{{$pdhMod->id}}">Patient's diagnosis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <h1>View diagnosis modal {{$pdhMod->id}}</h1> -->
                <span><b>{{$pdhMod->DateGenerated}}</b></span>
                <span>{!! nl2br(e($pdhMod->Diagnosis)) !!}</span>
            </div>
        </div>
    </div>
</div>

@endforeach



@foreach($patient_diagnosis_history as $pdhMod)
<div class="modal fade" id="DeletePatientDiagnosisModal{{$pdhMod->id}}" tabindex="-1" role="dialog" aria-labelledby="DeletePatientDiagnosisModalLabel{{$pdhMod->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="DeletePatientDiagnosisModalLabel{{$pdhMod->id}}">Patient's diagnosis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- <h1>View diagnosis modal {{$pdhMod->id}}</h1> -->
                <span><b>{{$pdhMod->DateGenerated}}</b></span>
                <span>{!! nl2br(e($pdhMod->Diagnosis)) !!}</span>
                <input type="text" value="{{$pdhMod->id}}" name="id"/>
            </div>
        </div>
    </div>
</div>

@endforeach




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




<script src="../plugins/jquery/jquery.min.js"></script>
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<script src="../plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->

<script>
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
    DataTable.ext.search.push(function(settings, data, dataIndex) {
        var min = minDate.val();
        var max = maxDate.val();
        var date = new Date(data[3]);

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
    $('#min, #max').on('change', function() {
        table.draw();
    });
</script>


@endsection