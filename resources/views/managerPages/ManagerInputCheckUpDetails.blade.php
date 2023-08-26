@extends('manager_layout.managerLayout')

@section('manager_input_check_up_details_content')


<!-- <link href="//cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> -->

<form method="post" action="/ManagerInputCheckUpDetailsSubmit" enctype="multipart/form-data">
  @csrf
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
          <div class="form-group">
            <label>Doctor's Name</label>
            <input type="text" class="form-control" style="width: 100%;" name="DoctorName" required="true" value="{{ old('DoctorName') }}" />
          </div>
          <div class="form-group">
            <label>Laboratory findings</label>
            <textarea class="form-control" multiple="multiple" data-placeholder="Type your findings here" style="width: 100%; height: 100px;" name="LaboratoryFindings" required="true"></textarea>
          </div>
          <!-- /.form-group -->
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Diagnosis</label>
            <textarea class="form-control" multiple="multiple" data-placeholder="Type your diagnosis here" style="width: 100%; height: 100px;" name="Diagnosis" required="true"></textarea>
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
          @php
          $DateNow = now();
          @endphp

          <div class="form-group">
            <label for="datetime">Date and Time:</label>
            <input type="datetime-local" class="form-control" id="datetime" name="DateAndTimeOfCheckUp" value="{{$DateNow}}" required="true">
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
            <input type="text" class="form-control" style="width: 100%;" name="PatientName" required="true" />
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" style="width: 100%;" name="PatientAddress" required="true" />
          </div>
          <div class="form-group">
            <label>Place of birth</label>
            <input type="text" class="form-control" style="width: 100%;" name="PatientPlaceOfBirth" required="true" />
          </div>
          <div class="form-group">
            <label>Occupation</label>
            <input type="text" class="form-control" style="width: 100%;" name="PatientOccupation" required="true" />
          </div>
          <!-- /.form-group -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="form-group">
            <label>Last name</label>
            <input type="text" class="form-control" style="width: 100%;" name="PatientLastName" required="true" />

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
              <div class="form-check form-check-inline">

                <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Male">
                <label>Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Female">
                <label>Female</label>
              </div>

            </div>
            <div class="col-sm">
              <div class="form-group">
                <label for="Age">Age</label>
                <input class="form-control" type="number" name="Age" id="Age" />
              </div>
            </div>

          </div>





          <div class="form-group">
            <label for="datetime">Date of birth</label>
            <input type="date" class="form-control" id="datetime" name="PatientDateOfBirth" required="true">
          </div>

          <div class="form-group">
            <label>Contact number or email</label>
            <input type="text" class="form-control" style="width: 100%;" name="PatientContact" required="true" />
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







  <!-- <div class="card">
    <div style="padding: 5px;">
      <div class="form-control">
        @csrf
        <input type="file" name="files[]" multiple>

      </div>
    </div>
  </div> -->













  <!-- Multiple files upload -->
  <div class="card card-default">
    <div class="card bg-warning card-header">
      <h3 class="card-title">Upload images here </h3>
      <!-- <small><em>jQuery File Upload</em> like look</small> -->
    </div>
    <div class="card-body">

      <div class="container">
        <h1>Image Upload</h1>

        <div class="mb-3">
          <label for="fileInput" class="form-label">Select Files</label>
          <input type="file" name="files[]" id="fileInput" class="form-control" multiple>
        </div>

        <div class="row" id="filePreview" >
          <!-- File preview will be dynamically added here -->
        </div>

        <!-- <button type="submit" class="btn btn-primary mt-3">Upload</button> -->
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
  const fileInput = document.getElementById('fileInput');
  const filePreview = document.getElementById('filePreview');

  fileInput.addEventListener('change', function (event) {
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

        reader.onload = function (event) {
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
      removeButton.addEventListener('click', function () {
        previewContainer.remove();
      });
      previewContainer.appendChild(removeButton);

      // Append the preview container to the file preview element
      filePreview.appendChild(previewContainer);
    }
  });
</script>
  <!-- Multiple files upload -->














  <div class="row" style="padding-bottom: 20px;">
    <div class="col">
      <div style="padding-right: 20px;">
        <button type="submit" class="btn btn-primary btn-md">Submit</button>
      </div>
    </div>
    <div class="col">
      <div class="float-right" style="padding-right: 20px;">
        <button type="submit" class="btn btn-danger btn-md">Cancel</button>
      </div>
    </div>
  </div>

</form>





<!-- <div class="row">
                        <div class="col-12">
                        <a href="#" class="btn btn-secondary">Cancel</a>
                        <input type="submit" value="Save Changes" class="btn btn-success float-right">
                        </div>
                    </div> -->


<!-- /.row -->



</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
























<script>
  $(function() {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    //Datemask dd/mm/yyyy
    $('#datemask').inputmask('dd/mm/yyyy', {
      'placeholder': 'dd/mm/yyyy'
    })
    //Datemask2 mm/dd/yyyy
    $('#datemask2').inputmask('mm/dd/yyyy', {
      'placeholder': 'mm/dd/yyyy'
    })
    //Money Euro
    $('[data-mask]').inputmask()

    //Date picker
    $('#reservationdate').datetimepicker({
      format: 'L'
    });

    //Date and time picker
    $('#reservationdatetime').datetimepicker({
      icons: {
        time: 'far fa-clock'
      }
    });


    //Date and time picker
    $('#reservationdatetime2').datetimepicker({
      icons: {
        time: 'far fa-clock'
      }
    });

    //Date range picker
    $('#reservation').daterangepicker()
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
    //Date range as a button
    $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },
      function(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

    //Timepicker
    $('#timepicker').datetimepicker({
      format: 'LT'
    })

    //Bootstrap Duallistbox
    $('.duallistbox').bootstrapDualListbox()

    //Colorpicker
    $('.my-colorpicker1').colorpicker()
    //color picker with addon
    $('.my-colorpicker2').colorpicker()

    $('.my-colorpicker2').on('colorpickerChange', function(event) {
      $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
    })

    $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })

  })
  // BS-Stepper Init
  document.addEventListener('DOMContentLoaded', function() {
    window.stepper = new Stepper(document.querySelector('.bs-stepper'))
  })

  // DropzoneJS Demo Code Start
  Dropzone.autoDiscover = false

  // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
  var previewNode = document.querySelector("#template")
  previewNode.id = ""
  var previewTemplate = previewNode.parentNode.innerHTML
  previewNode.parentNode.removeChild(previewNode)

  var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
    url: "/target-url", // Set the url
    thumbnailWidth: 80,
    thumbnailHeight: 80,
    parallelUploads: 20,
    previewTemplate: previewTemplate,
    autoQueue: false, // Make sure the files aren't queued until manually added
    previewsContainer: "#previews", // Define the container to display the previews
    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
  })

  myDropzone.on("addedfile", function(file) {
    // Hookup the start button
    file.previewElement.querySelector(".start").onclick = function() {
      myDropzone.enqueueFile(file)
    }
  })

  // Update the total progress bar
  myDropzone.on("totaluploadprogress", function(progress) {
    document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
  })

  myDropzone.on("sending", function(file) {
    // Show the total progress bar when upload starts
    document.querySelector("#total-progress").style.opacity = "1"
    // And disable the start button
    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
  })

  // Hide the total progress bar when nothing's uploading anymore
  myDropzone.on("queuecomplete", function(progress) {
    document.querySelector("#total-progress").style.opacity = "0"
  })

  // Setup the buttons for all transfers
  // The "add files" button doesn't need to be setup because the config
  // `clickable` has already been specified.
  document.querySelector("#actions .start").onclick = function() {
    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
  }
  document.querySelector("#actions .cancel").onclick = function() {
    myDropzone.removeAllFiles(true)
  }
  // DropzoneJS Demo Code End
</script>










@endsection