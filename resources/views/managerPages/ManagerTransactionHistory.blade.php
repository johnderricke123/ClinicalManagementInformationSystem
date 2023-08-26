@extends('manager_layout.managerLayout')

@section('manager_transaction_history_content')


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css">

<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js"></script>
<script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>








<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Records</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Monitoring</a></li>
          <li class="breadcrumb-item active">Records</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->










<div class="container-fluid">
  <div class="mb-3">
    <div class="float-right">
      <!-- <button class="btn btn-secondary" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add</button> -->
      <a href="/ManagerInputCheckUpDetails" class="btn btn-secondary" ><i class="fas fa-plus"></i> Add</a>
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














@php
use Carbon\Carbon;
$i = 0;
@endphp






<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Waiting list</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table border="0" cellspacing="5" cellpadding="5">
              <tbody>
                <tr>
                  <td>Minimum date:</td>
                  <td><input type="text" id="min" name="min"></td>

                  <td>Maximum date:</td>
                  <td><input type="text" id="max" name="max"></td>

                </tr>
              </tbody>
            </table>

            <table table id="example" class="display nowrap" style="width:100%">
              <thead>
                <tr>
                  <th>Date and time added</th>
                  <th>Patient ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Contact</th>
                  <th>Date of birth</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>





                @foreach($waiting_list as $wl)
                <tr>
                  <td>{{ Carbon::parse($wl->Added_at)->format('Y-m-d') }}</td>
                  <td>{{$wl->id}}</td>
                  <td>{{$wl->FirstName}} {{$wl->LastName}}</td>
                  <td>{{$wl->Address}}</td>
                  <td>{{$wl->Contact}}</td>
                  <td>{{$wl->DateOfBirth}}</td>

                  <td>
                    <div class="d-flex justify-content-center">
                      <div class="p-1">
                        <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#proceedModal{{$wl->id}}">View</button> -->
                          <a href="/ManagerViewCheckUpDetails/{{$wl->id}}" class="btn btn-success" >View check up details</a>
                          <!-- @verbatim
                          <script>
                            function printContent(id) {
                              window.open("/ManagerViewCheckUpDetails/" + id, "_blank", "width=800,height=600");
                            }
                          </script>
                          @endverbatim -->
                        </div>

                      <div class="p-1">
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removeModal{{$wl->id}}">Remove</button>
                      </div>
                      <!-- <button class="btn btn-primary btn-sm">Edit</button> -->
                      <!-- <div class="p-1">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{$wl->id}}">Edit</button>
                      </div> -->

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
                        <a href="/ManagerRemoveCheckUpRecords/{{$wl->id}}" class="btn btn-danger">Remove</a>
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
                        <h5 class="modal-title" id="proceedModalLabel{{$wl->id}}">View check up details confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p>Are you sure you want to proceed this entry?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <!-- <a href="/ManagerViewCheckUpDetails/{{$wl->id}}" class="btn btn-success" >View check up details</a> -->

                        <a href="#" class="btn btn-success" onclick="printContent({{$wl->id}})">View check up details</a>
                        @verbatim
                        <script>
                          function printContent(id) {
                            window.open("/ManagerViewCheckUpDetails/" + id, "_blank", "width=800,height=600");
                          }
                        </script>
                        @endverbatim



                      </div>
                    </div>
                  </div>
                </div>
                @endif












                @endforeach










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
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->













<!-- <table border="0" cellspacing="5" cellpadding="5">
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

      <th>Date and time added</th>
      <th>Patient ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Date of birth</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>

    @foreach($waiting_list as $wl)
    <tr>
      <td>{{ Carbon::parse($wl->Added_at)->format('Y-m-d') }}</td>
      <td>{{$wl->id}}</td>
      <td>{{$wl->FirstName}} {{$wl->LastName}}</td>
      <td>{{$wl->Address}}</td>
      <td>{{$wl->Contact}}</td>
      <td>{{$wl->DateOfBirth}}</td>

      <td>
        <div class="d-flex justify-content-center">
          <div class="p-1">
            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#proceedModal{{$wl->id}}">View</button>
          </div>
          <div class="p-1">
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#removeModal{{$wl->id}}">Remove</button>
          </div>

          <div class="p-1">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{$wl->id}}">Edit</button>
          </div>

        </div>
      </td>
    </tr>
    @endforeach

  </tbody>
  <tfoot>
    <tr>
      <th>Date and time added</th>
      <th>Patient ID</th>
      <th>Name</th>
      <th>Address</th>
      <th>Contact</th>
      <th>Date of birth</th>
      <th>Action</th>

    </tr>
  </tfoot>
</table> -->





<script>
  var minDate, maxDate;

  // Custom filtering function which will search data in column four between two values
  DataTable.ext.search.push(function(settings, data, dataIndex) {
    var min = minDate.val();
    var max = maxDate.val();
    var date = new Date(data[0]);

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