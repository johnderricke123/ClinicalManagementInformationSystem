@extends('manager_layout.managerLayout')

@section('manager_dashboard_content')







<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
          <!-- <li class="breadcrumb-item active">Sales Reports</li> -->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->




<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        <h3>{{$total_company_accounts}}</h3>

        <p>Total accounts</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="/ManagerManageAccounts" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>{{$total_patients}}</h3>

        <p>Total patients</p>
      </div>
      <div class="icon">
        <i class="ion ion-person"></i>
      </div>
      <a href="/ManagerTransactionHistory" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>

  <!-- ./col -->
  <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{$total_waitlist}}</h3>

            <p>Total Waitlist</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
                <a href="/ManagerToWaitingList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>{{$total_booked_patients}}</h3>

        <p>Booked Patients</p>
      </div>
      <div class="icon">
        <i class="ion ion-pie-graph"></i>
      </div>
      <a href="/ManagerScheduledList" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->
<!-- Main row -->
<div class="row">
  <!-- Left col -->
  <section class="col-lg-7 connectedSortable">

    @php
    use Carbon\Carbon;
    @endphp



    <!-- TO DO List -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">
          <i class="ion ion-clipboard mr-1"></i>
          To Do List
        </h3>

        <!-- <div class="card-tools">
              <ul class="pagination pagination-sm">
                <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
              </ul>
            </div> -->
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        <ul class="todo-list" data-widget="todo-list">
          @foreach($scheduled_list as $sl)
          <li>
            <!-- drag handle -->
                <!-- <span class="handle">
                  <i class="fas fa-ellipsis-v"></i>
                  <i class="fas fa-ellipsis-v"></i>
                </span> -->
            <!-- checkbox -->
            <div class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo1" id="todoCheck{{$sl->id}}">
              <label for="todoCheck{{$sl->id}}"></label>
            </div>
            <!-- todo text -->
                <!-- <div class="step" data-target="#logins-part">
                  <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Logins</span>
                  </button>
                </div> -->
            <span class="text"><a href="#" class="link">{{$sl->ClientName}}</a></span>
            <span class="text">{{$sl->AppointmentReason}}</span>

            <!-- Emphasis label -->
            <small class="badge badge-danger"><i class="far fa-clock"></i> {{ Carbon::parse($sl->StartDateAndTime)->toFormattedDateString() }}

              @if($sl->EndDateAndTime != null)
              <b>to</b> {{ Carbon::parse($sl->EndDateAndTime)->toFormattedDateString() }}
              @else
              <span></span>
              @endif
            </small>
            <!-- General tools such as edit or delete-->
            <div class="tools">
              <i class="fas fa-edit" data-toggle="modal" data-target="#EditListModal{{$sl->id}}"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li>
          @endforeach
          <!-- <li>
            <span class="handle">
              <i class="fas fa-ellipsis-v"></i>
              <i class="fas fa-ellipsis-v"></i>
            </span>
            <div class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo2" id="todoCheck2" checked>
              <label for="todoCheck2"></label>
            </div>
            <span class="text">Make the theme responsive</span>
            <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
            <div class="tools">
              <i class="fas fa-edit"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fas fa-ellipsis-v"></i>
              <i class="fas fa-ellipsis-v"></i>
            </span>
            <div class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo3" id="todoCheck3">
              <label for="todoCheck3"></label>
            </div>
            <span class="text">Let theme shine like a star</span>
            <small class="badge badge-warning"><i class="far fa-clock"></i> 1 day</small>
            <div class="tools">
              <i class="fas fa-edit"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fas fa-ellipsis-v"></i>
              <i class="fas fa-ellipsis-v"></i>
            </span>
            <div class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo4" id="todoCheck4">
              <label for="todoCheck4"></label>
            </div>
            <span class="text">Let theme shine like a star</span>
            <small class="badge badge-success"><i class="far fa-clock"></i> 3 days</small>
            <div class="tools">
              <i class="fas fa-edit"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fas fa-ellipsis-v"></i>
              <i class="fas fa-ellipsis-v"></i>
            </span>
            <div class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo5" id="todoCheck5">
              <label for="todoCheck5"></label>
            </div>
            <span class="text">Check your messages and notifications</span>
            <small class="badge badge-primary"><i class="far fa-clock"></i> 1 week</small>
            <div class="tools">
              <i class="fas fa-edit"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li>
          <li>
            <span class="handle">
              <i class="fas fa-ellipsis-v"></i>
              <i class="fas fa-ellipsis-v"></i>
            </span>
            <div class="icheck-primary d-inline ml-2">
              <input type="checkbox" value="" name="todo6" id="todoCheck6">
              <label for="todoCheck6"></label>
            </div>
            <span class="text">Let theme shine like a star</span>
            <small class="badge badge-secondary"><i class="far fa-clock"></i> 1 month</small>
            <div class="tools">
              <i class="fas fa-edit"></i>
              <i class="fas fa-trash-o"></i>
            </div>
          </li> -->
        </ul>
      </div>
      <!-- /.card-body -->
      <div class="card-footer clearfix">
        <button type="button" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Add item</button>
      </div>
    </div>
    <!-- /.card -->
  </section>
  <!-- /.Left col -->
  <!-- right col (We are only adding the ID to make the widgets sortable)-->
  <section class="col-lg-5 connectedSortable">







  </section>
  <!-- right col -->
</div>
<!-- /.row (main row) -->













@foreach($scheduled_list as $sl)
<!-- Delete event list modal -->
<div class="modal fade" id="EditListModal{{$sl->id}}" tabindex="-1" role="dialog" aria-labelledby="EditListModalLabel{{$sl->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditListModalLabel{{$sl->id}}">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to edit this event?</p>
        <input type="text" value="{{$sl->id}}" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
  </div>
</div>
<!-- Delete event list modal -->
@endforeach








@endsection