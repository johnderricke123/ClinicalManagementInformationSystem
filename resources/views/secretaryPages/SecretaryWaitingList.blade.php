@extends('secretary_layout.secretaryLayout')

@section('secretary_waiting_list_content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">


<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Waiting lists</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Appointments</a></li>
                    <li class="breadcrumb-item active">Waiting list</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->




<div class="container-fluid">
    <div class="mb-3">
        <div class="float-right">
            <button class="btn btn-secondary" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add</button>
        </div>
        <!-- <button class="btn btn-link" id="search-toggle">
            <i class="fas fa-search"></i>
        </button> -->
    </div>
    <!-- <div id="search-box" class="input-group mb-3" style="display: none;">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="button">Search</button>
        </div>
    </div> -->
    <div class="table-responsive">
        <table id="users-table" class="table table-bordered">

            <thead>
                <tr>

                </tr>
            </thead>
            <tbody>
                @foreach($waiting_list as $wl)






                <div class="modal fade" id="editModal{{$wl->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$wl->id}}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form method="post" action="/ManagerEditClientWaitingList/{{$wl->id}}">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="editName">Name:</label>
                                        <input type="text" class="form-control" value="{{$wl->ClientName}}" name="ClientName">
                                    </div>
                                    <div class="form-group">
                                        <label for="editAppointmentReason">Appointment Reason:</label>
                                        <input type="text" class="form-control" value="{{$wl->AppointmentReason}}" name="AppointmentReason">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>









                @endforeach
            </tbody>


        </table>
    </div>
</div>








<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add a client</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="/SecretaryAddWaitingList">
                    @csrf
                    <div class="p-1">
                        <input class="form-control" placeholder="Name" name="ClientName" />
                    </div>
                    <div class="p-1">

                        <textarea class="form-control" placeholder="Reason for Appointment(Optional)" name="AppointmentReason"></textarea>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
</div>




<script>
    $(document).ready(function() {
        $('#search-toggle').click(function() {
            $('#search-box').toggle();
        });
    });
</script>
















<!-- new datatable -->





<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">DataTable with default features</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">



                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Date and time</th>
                                    <th>Name</th>
                                    <th>Appointment Reason</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>





                            @foreach($waiting_list as $wl)
                                <tr>
                                    <td>{{$wl->Added_at}}</td>
                                    <td>{{$wl->ClientName}}</td>
                                    <td>{{$wl->AppointmentReason}}</td>

                                    <td>
                                        {{$wl->Status}}
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            @if($wl->Status == 'Waiting')
                                            <div class="p-1">
                                                <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#proceedModal{{$wl->id}}">Proceed to check up</button>
                                            </div>
                                            @else
                                            <div class="p-1">
                                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#MarkAsWaitingModal{{$wl->id}}">Mark as waiting</button>
                                            </div>
                                            @endif
                                            <div class="p-1">
                                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removeModal{{$wl->id}}">Remove</button>
                                            </div>
                                            <!-- <button class="btn btn-primary btn-sm">Edit</button> -->
                                            <div class="p-1">
                                                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{$wl->id}}">Edit</button>
                                            </div>

                                        </div>
                                    </td>
                                </tr>




                                <!-- Edit Modal -->
                                <div class="modal fade" id="editModal{{$wl->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{$wl->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editModalLabel">Edit Entry</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form method="post" action="/ManagerEditClientWaitingList/{{$wl->id}}">
                                                @csrf
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label for="editName">Name:</label>
                                                        <input type="text" class="form-control" value="{{$wl->ClientName}}" name="ClientName">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="editAppointmentReason">Appointment Reason:</label>
                                                        <input type="text" class="form-control" value="{{$wl->AppointmentReason}}" name="AppointmentReason">
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>








                                <!-- Remove modal -->
                                @if($waiting_list->count() > 0)


                                <div class="modal fade" id="removeModal{{$wl->id}}" tabindex="-1" role="dialog" aria-labelledby="removeModalLabel{{$wl->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="removeModalLabel{{$wl->id}}">Remove Confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to remove this entry?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="/ManagerRemoveWaitingListClient/{{$wl->id}}" class="btn btn-danger">Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                <!-- Proceed modal -->
                                @if($waiting_list->count() > 0)


                                <div class="modal fade" id="proceedModal{{$wl->id}}" tabindex="-1" role="dialog" aria-labelledby="proceedModalLabel{{$wl->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="proceedModalLabel{{$wl->id}}">Proceed to check up confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to proceed this entry?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="/SecretaryProceedWaitingListClient/{{$wl->id}}" class="btn btn-success">Proceed to check up</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif


                                @if($waiting_list->count() > 0)


                                <div class="modal fade" id="MarkAsWaitingModal{{$wl->id}}" tabindex="-1" role="dialog" aria-labelledby="MarkAsWaitingModalLabel{{$wl->id}}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="MarkAsWaitingModalLabel{{$wl->id}}">Mark as waiting confirmation</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to proceed this entry?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                <a href="/SecretaryMarkAsWaitingClient/{{$wl->id}}" class="btn btn-success">Mark as waiting</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif












                                @endforeach





                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Date and time</th>
                                    <th>Name</th>
                                    <th>Appointment Reason</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>

                            </tfoot>
                        </table>


                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>












<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>



<script>
    $('#example').DataTable({
        pagingType: 'full_numbers'
    });
</script>
<!-- new datatable -->











































<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->





@endsection