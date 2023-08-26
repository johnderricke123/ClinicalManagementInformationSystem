@extends('secretary_layout.secretaryLayout')

@section('secretary_scheduled_list_content')


<!-- @foreach($scheduled_list as $ap)
<h1>{{$ap->ClientName}}</h1>
@endforeach -->


<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Scheduled lists</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Appointments</a></li>
          <li class="breadcrumb-item active">Scheduled lists</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->


<!-- <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Calendar</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Calendar</li>
            </ol>
          </div>
        </div>
      </div>
    </section> -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3">
        <div class="sticky-top mb-3">
          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Add Events</h4>
            </div>
            <div class="card-body">
              <div id="external-events">
                <!-- <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div> -->
                <!-- <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div> -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add</button>

              </div>
            </div>
          </div>

          <div class="card">
            <div class="card-header">
              <h4 class="card-title">Pending event list</h4>
            </div>
            <div class="card-body">
            <div id="external-events" style="height: 800px; overflow-y: scroll;">
                <!-- <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div> -->
                <!-- <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div> -->
                <!-- <button class="btn btn-primary
                " data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add</button> -->

                @php
                use Carbon\Carbon;
                @endphp

                <!-- @foreach($scheduled_past as $sp)
                {{$sp->ClientName}}
                @endforeach -->


                <!-- Past scheduled list -->
                @foreach($scheduled_past as $sp)
                <div class="card card card-danger">
                  <div class="card-header">
                    <div class="row">
                      <div class="col-1">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="{{$sp->id}}" name="CheckBox" id="flexCheckDefault">
                        </div>
                      </div>
                      <div class="col-8">
                        <h3 class="card-title"><i class="fas fa-user"></i> {{$sp->ClientName}}</h3>
                      </div>
                    </div>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">
                    <h5>{{$sp->AppointmentReason}}</h5>
                  </div>

                  <div class="container-fluid" style="font-size: 14px;">
                          <i class="fas fa-clock"></i> {{ Carbon::parse($sp->StartDateAndTime)->toFormattedDateString() }} <b>to</b> {{ Carbon::parse($sp->EndDateAndTime)->toFormattedDateString() }}

                  </div>

                  <div class="card-footer">
                    <div class="container-fluid">
                      <div class="row">

                      

                        <div class="row">
                          <div class="col">
                            <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#MarkCompleteModal{{$sp->id}}" >
                              <i class="fas fa-check"></i>
                            </a>
                          </div>

                          <div class="col">
                            <a href="/ManagerInputCheckUpDetails" class="btn btn-primary btn-sm" >
                            <i class="fas fa-fill"></i>
                            </a>
                          </div>

                          
                          <div class="col">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditFormPastModal{{$sp->id}}">
                            
                            <i class="fas fa-edit"></i>
                            </button>
                          </div>

                          <div class="col">
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventPastModal{{$sp->id}}">
                              <i class="fas fa-trash"></i>
                            </button>
                          </div>




                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->


                @endforeach
                <!-- end -->

                <!-- This day scheduled list -->
                @foreach($scheduled_upcoming as $sl)
                <div class="card card card-primary">
                  <div class="card-header">

                    <div class="row">
                      <div class="col-1">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="{{$sl->id}}" name="CheckBox" id="flexCheckDefault">
                        </div>
                      </div>
                      <div class="col-8">
                        <h3 class="card-title"><i class="fas fa-user"></i> {{$sl->ClientName}}</h3>
                      </div>
                    </div>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                    </div>
                    <!-- /.card-tools -->
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body">
                    <h5>{{$sl->AppointmentReason}}</h5>
                  </div>

                  <div class="container-fluid" style="font-size: 14px;">
                    <i class="fas fa-clock"></i> {{ Carbon::parse($sl->StartDateAndTime)->toFormattedDateString() }} <b>to</b>
                     
                     @if($sl->EndDateAndTime != null)
                          {{ Carbon::parse($sl->EndDateAndTime)->toFormattedDateString() }}
                    @else
                          <span></span>
                    @endif
                  </div>

                  <div class="card-footer">
                    <div class="row">


                      <div class="row">
                        <div class="col">
                          <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#completedMarkUpModal{{$sl->id}}">
                            <i class="fas fa-check"></i>
                          </button>
                        </div>

                        <div class="col">
                          <a href="/ManagerInputCheckUpDetails" class="btn btn-primary btn-sm" >
                            <i class="fas fa-fill"></i>
                          </a>
                        </div>

                        

                        <div class="col">
                          <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#EditFormUpcomingModal{{$sl->id}}">
                            <i class="fas fa-edit"></i>
                          </button>
                        </div>

                        <div class="col">
                          <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEventModal{{$sl->id}}">
                            <i class="fas fa-trash"></i>
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->


                @endforeach

              </div>
            </div>
          </div>
          <!-- /.card -->
          <div class="card">
            <!-- <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div> -->
            <!-- <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                    </ul>
                  </div>
                  <div class="input-group">

                    <div class="input-group">
                      <button class="btn btn-primary" data-toggle="modal" data-target="#addModal"><i class="fas fa-plus"></i> Add</button>
                    </div>
                  </div>
                </div> -->
          </div>
        </div>
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card card-primary">
          <div class="card-body p-0">
            <!-- THE CALENDAR -->
            <div id="calendar"></div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->





<!-- @foreach($scheduled_upcoming as $sx)
<div class="modal fade" id="upcomingMarkCompleteModal{{$sx->id}}" tabindex="-1" role="dialog" aria-labelledby="upcomingMarkCompleteModalLabel{{$sx->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="upcomingMarkCompleteModalLabel{{$sx->id}}">Mark Complete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        Are you sure you want to mark this item as complete?
        <input type="text" value="{{$sx->id}}" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success">Mark Complete</button>
      </div>
    </div>
  </div>
</div>
@endforeach -->



@foreach($scheduled_past as $su)
<!-- Delete event list modal -->
<div class="modal fade" id="EditFormPastModal{{$su->id}}" tabindex="-1" role="dialog" aria-labelledby="EditFormPastModalLabel{{$su->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditFormPastModalLabel{{$su->id}}">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to edit this event?</p>
        <input type="text" value="{{$su->id}}" />
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



@foreach($scheduled_past as $su)
<!-- Delete event list modal -->
<div class="modal fade" id="MarkCompleteModal{{$su->id}}" tabindex="-1" role="dialog" aria-labelledby="MarkCompleteModalLabel{{$su->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">

<form method="post" action="{{ route('markAsCheckedUp') }}">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="MarkCompleteModalLabel{{$su->id}}">Mark as completed confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this event?</p>
        <input type="text" value="{{$su->id}}" />
        <input type="hidden" value="{{$su->id}}" name="ScheduledID" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Mark as checked up</button>
      </div>
    </div>
</form>

  </div>
</div>
<!-- Delete event list modal -->
@endforeach


@foreach($scheduled_past as $sp)
<!-- Delete event list modal -->
<div class="modal fade" id="deleteEventPastModal{{$sp->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteEventPastModalLabel{{$sp->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">

<form method="POST" action="{{ route('managerDeleteScheduledRecord') }}">
  @csrf
  @method('DELETE')
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteEventPastModalLabel{{$sp->id}}">Delete event confirmation11</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this event?</p>
        <input type="text" value="{{$sp->id}}" />
        <input type="hidden" value="{{$sp->id}}" name="ScheduledID" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger">Delete</button>
      </div>
    </div>
</form>

  </div>
</div>
<!-- Delete event list modal -->
@endforeach




@foreach($scheduled_upcoming as $su)
<!-- Delete event list modal -->
<div class="modal fade" id="deleteEventModal{{$su->id}}" tabindex="-1" role="dialog" aria-labelledby="deleteEventModalLabel{{$su->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteEventModalLabel{{$su->id}}">Delete event confirmation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this event?</p>
        <input type="text" value="{{$su->id}}" />
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


@foreach($scheduled_upcoming as $su)
<!-- Delete event list modal -->
<div class="modal fade" id="completedMarkUpModal{{$su->id}}" tabindex="-1" role="dialog" aria-labelledby="completedMarkUpModalLabel{{$su->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">

<form method="post" action="{{ route('markAsCheckedUp') }}">
  @csrf
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="completedMarkUpLabel{{$su->id}}">Mark as completed confirmation123</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this event?</p>
        <input type="text" value="{{$su->id}}" />
        <input type="hidden" value="{{$su->id}}" name="ScheduledID"/>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Mark as checked up</button>
      </div>
    </div>
</form>


  </div>
</div>
<!-- Delete event list modal -->
@endforeach


@foreach($scheduled_upcoming as $su)
<!-- Delete event list modal -->
<div class="modal fade" id="EditFormUpcomingModal{{$su->id}}" tabindex="-1" role="dialog" aria-labelledby="EditFormUpcomingModalLabel{{$su->id}}" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="EditFormUpcomingLabel{{$su->id}}">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to Edit this event?</p>
        <input type="text" value="{{$su->id}}" />
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





















<!-- Scheduled Form Modal -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add a scheduled list1</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/ManagerAddScheduledList">
          @csrf


          <div class="p-1">
            <input class="form-control" placeholder="Name" name="ClientName" />
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
</div>
<!-- Scheduled Form Modal -->




<!-- ManagerScheduledList.blade.php -->

<!-- Modal -->

<div class="modal" id="eventModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Event Details</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="/ManagerScheduledEventDelete">
        @csrf
        <div class="modal-body">

          <span class="form-control" id="eventTitle" placeholder="Title" name="EventTitle" ></span>
          <span class="form-control" id="Reason" name="EventAppointmentReason"></span>
          <!-- <input id="Reason" name="EventAppointmentReason"/> -->

          <div class="row">
            <div class="col p-2">
              <span class="form-control" id="eventStartDate" name="EventStartDate" ></span>
            </div>

              <p class="p-2">to</p>
            
            <div class="col p-2">
              <span class="form-control" id="eventEndDate" name="EventEndDate" ></span>
            </div>
          </div> 
            <input type="text" id="eventid" name="id" />

        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button class="btn btn-primary">Submit</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </form>
    </div>
  </div>
</div>

@foreach($scheduled_list as $items)
<h1>{{$items->AppointmentReason}}</h1>
@endforeach


<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jQuery UI -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/fullcalendar/main.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function() {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function() {

        // create an Event Object (https://fullcalendar.io/docs/event-object)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0 //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
        };
      }
    });


    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      themeSystem: 'bootstrap',

      eventClick: function(info) {
            // Get the event data from the clicked event
            var event = info.event;


            // Update the modal content with the event data
            // document.getElementById('eventTitle').textContent = event.title;
            document.getElementById('Reason').textContent = event.title;

            // if (event.reason && event.reason.trim() !== '') {
            //     document.getElementById('eventReason').textContent = event.reason;
            // } else {
            //     document.getElementById('eventReason').textContent = 'No reason available';
            // }

            // Convert the date to a human-readable format (e.g., "July 26, 2023 4:47 PM")
            var startDate = new Date(event.start);
            var formattedStartDate = startDate.toLocaleString('en-US', {
                year: 'numeric',
                month: 'long',
                day: 'numeric',
                hour: 'numeric',
                minute: 'numeric',
                hour12: true
            });
            // document.getElementById('eventStartDate').value = formattedStartDate;
            document.getElementById('eventStartDate').textContent = formattedStartDate;

            // var endDate = new Date(event.end);
            // var formattedEndDate = endDate.toLocaleString('en-US', {
            //     year: 'numeric',
            //     month: 'long',
            //     day: 'numeric',
            //     hour: 'numeric',
            //     minute: 'numeric',
            //     hour12: true
            // });
            // document.getElementById('eventEndDate').textContent = formattedEndDate;

            if (event.end && event.end !== null) {
                var endDate = new Date(event.end);
                var formattedEndDate = endDate.toLocaleString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });
                document.getElementById('eventEndDate').textContent = formattedEndDate;
            } else {
                // If there is no end date, set the content to an empty string
                document.getElementById('eventEndDate').textContent = '';
            }



            document.getElementById('eventid').value = event.id; // Update the hidden input field value

            // Show the modal
            $('#eventModal').modal('show');
        },


      events: [
        @foreach($scheduled_list as $item) {
          // title: '{{ $item->ClientName }}',
          start: '{{ $item->StartDateAndTime }}', // Make sure your date format is compatible
          end: '{{$item->EndDateAndTime}}',
          title: '{{ $item->AppointmentReason }}',
          backgroundColor: '#f56954', //red
          borderColor: '#f56954', //red
          id: '{{$item->id}}', //red

        },
        @endforeach
      ],
      // editable  : true,
      droppable: true,
      drop: function(info) {
        if (checkbox.checked) {
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }
    });

    calendar.render();


    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    // Color chooser button
    $('#color-chooser > li > a').click(function(e) {
      e.preventDefault()
      // Save color
      currColor = $(this).css('color')
      // Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color': currColor
      })
    })
    $('#add-new-event').click(function(e) {
      e.preventDefault()
      // Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      // Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color': currColor,
        'color': '#fff'
      }).addClass('external-event')
      event.text(val)
      $('#external-events').prepend(event)

      // Add draggable funtionality
      ini_events(event)

      // Remove event from text input
      $('#new-event').val('')
    })
  })
</script>


@endsection