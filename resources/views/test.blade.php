<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">


    <style>
        body {
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .emp-profile {
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }

        .profile-img {
            text-align: center;
        }

        .profile-img img {
            width: 70%;
            height: 100%;
        }

        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }

        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }

        .profile-head h5 {
            color: #333;
        }

        .profile-head h6 {
            color: #0062cc;
        }

        .profile-edit-btn {
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }

        .proile-rating {
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }

        .proile-rating span {
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }

        .profile-head .nav-tabs {
            margin-bottom: 5%;
        }

        .profile-head .nav-tabs .nav-link {
            font-weight: 600;
            border: none;
        }

        .profile-head .nav-tabs .nav-link.active {
            border: none;
            border-bottom: 2px solid #0062cc;
        }

        .profile-work {
            padding: 14%;
            margin-top: -15%;
        }

        .profile-work p {
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }

        .profile-work a {
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }

        .profile-work ul {
            list-style: none;
        }

        .profile-tab label {
            font-weight: 600;
        }

        .profile-tab p {
            font-weight: 600;
            color: #0062cc;
        }
    </style>



</head>

<body>

    @include('sweetalert::alert')

    <div class="container emp-profile">
        <!-- <form method="post"> -->
        <div class="row">
            <div class="col-md-4">
                <div style="text-align: center;">
                    <div class="profile-img">
                        <!-- <img src="dist/img/user2-160x160.jpg" alt=""/> -->
                        @if($patient_profiles->count() > 0)
                        <img src="{{ asset($patient_profiles[0]->Path)}}" style="width: 200px; height: 200px;" alt="Logo">
                        @endif
                        @if($patient_profiles->count() <= 0 && $patient_personal_info->Gender == 'Male' )
                            <img src="{{ asset('dist/img/avatar.png')}}" alt="profile" />
                            <!-- <img src="dist/img/avatar.png" alt="profile"/> -->

                            @endif
                            @if($patient_profiles->count() <= 0 && $patient_personal_info->Gender == 'Female' )
                                <img src="{{ asset('dist/img/avatar2.png')}}" alt="profile" />
                                <!-- <img src="dist/img/avatar.png" alt="profile"/> -->

                                @endif
                                <div class="file btn btn-lg btn-primary" data-toggle="modal" data-target="#UploadPatientProfileModal">
                                    Change Photo
                                    <!-- <input type="file" name="file" /> -->


                                </div>
                    </div>
                </div>
                <!-- </form> -->

                <div class="container" style="text-align: center;">

                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Go back"/> -->

                    <a href="/ManagerTransactionHistory" class="btn btn-danger btn-sm">
                        <i class="fas fa-edit"></i> Go back
                    </a>

                    <!-- <button class="btn btn-success btn-sm">
                            <i class="fas fa-edit"></i> Make receipt
                        </button> -->

                    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditPatientModal">
                        <i class="fas fa-edit"></i> Edit

                    </button>




                    <!-- <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-fill"></i> Go back
                        </a> -->





                </div>

            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{$patient_personal_info->FirstName}} {{$patient_personal_info->LastName}}
                    </h5>
                    <h6>
                        {{$patient_personal_info->Occupation}}
                    </h6>
                    <p class="proile-rating">Patient ID : <span>{{$patient_personal_info->id}}</span></p>

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Check up informations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="files-tab" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="prescription-tab" data-toggle="tab" href="#prescription" role="tab" aria-controls="prescription" aria-selected="false">Make prescription</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <!-- <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="">Website Link</a><br/>
                            <a href="">Bootsnipp Profile</a><br/>
                            <a href="">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="">Web Designer</a><br/>
                            <a href="">Web Developer</a><br/>
                            <a href="">WordPress</a><br/>
                            <a href="">WooCommerce</a><br/>
                            <a href="">PHP, .Net</a><br/>
                        </div> -->
            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
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
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Doctor's Name</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_check_up_details->DoctorName}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Diagnosis</label>
                            </div>
                            <div class="col-md-6">
                                <p>{!! nl2br(e($patient_check_up_details->Diagnosis)) !!}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Laboratory Findings</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_check_up_details->LabFindings}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Date and time of check up</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_check_up_details->DateAndTimeOfCheckUp}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Registration date</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{$patient_check_up_details->Added_at}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Your Bio</label><br />
                                <p>Your detail description</p>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="files" role="tabpanel" aria-labelledby="files-tab">
                        <!-- Main content -->
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
                                                                                    <img src="{{ asset($pf->Path)}}" class="img-fluid mb-2" alt="white sample" style="height: 100px;" />


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
                    <div class="tab-pane fade" id="prescription" role="tabpanel" aria-labelledby="prescription-tab">
                        <div class="container-fluid" style="padding: 30px;">
                            <div class="card card-primary border-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Patients check up details</h3>

                                    <div class="card-tools">
                                        <!-- <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button> -->
                                    </div>
                                </div>
                                <!-- /.card-header -->

                                <form method="get" action="/popup">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
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

                                        <textarea class="form-control" placeholder="Type your prescription" style="height: 500px;" required="true"></textarea>

                                        <div class="float-right" style="padding: 20px;">
                                            <button type="submit" class="btn btn-primary btn-md" onclick="openPopup()"><i class="fas fa-print"></i> Print</button>
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
                            <!-- /.card -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        </form>
    </div>







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



</body>

</html>