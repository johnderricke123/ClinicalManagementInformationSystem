<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha384-9B8x5lW37J5n1P5PAv/DlWjt9GRs1lPb/+hTGvMn5K9u4l1KjqUpj1B9/KJOWIbL" crossorigin="anonymous">

  <style>
    @media print {

      /* Define the size of the printed page */
      @page {
        size: 5in 11in;
        /* Set the width and height to 5in and 8in */
        margin: 0;
        /* No margins to maximize the available space */
      }

      /* Style the content to fit within the page size */
      body {
        margin: 0;
        /* No margins to maximize the available space */
        font-size: 8pt;
        /* Adjust font size as needed */
        line-height: 1.5;
        /* Adjust line height as needed */
        padding: 0.5in;
        /* Add padding to keep content away from edges */
      }

      /* Target the specific div you want to print */
      #secondDiv {
        /* Add additional styles as needed */
      }
    }
  </style>


</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        One of three columns
      </div>

      <div class="col-sm-8" id="secondDiv" style="width: 5in; height: 11in;">
        <!-- card start -->
        <div class="card" style="border-radius: 0px;">

          <div style="text-align: center;">
            <div class="row" style="padding-top: 10px;">
              <h4 style="line-height: 1;"><b>ROSARIO V. FLORES, M.D.</b></h4>
              <span style="line-height: 1;"><b>Diplomate, Phil. Board of Obstetrics & Gynecology</b></span>
              <span style="line-height: 1;"><b>Fellow Philippine Obstetrics & Gynecology Society</b></span>
            </div>
          </div>
          <div class="row" style="padding-top: 20px;">
            <div class="col">
              <div class="row" style="text-align: justify; margin-left: 10%;">
                <span><b>HOLY CHILD HOSPITAL</b></span>
                <span style="line-height: 1;"><b>BW-109</b></span>
                <span style="line-height: 1;"><b>Dumaguete City</b></span>
                <span style="line-height: 1;"><b>Tel.# : 225-8218</b></span>
              </div>
            </div>
            <div class="col">

              <div class="row" style="text-align: justify;">
                <span><b>Clinic Hours:</b></span>
                <span style="line-height: 1;"><b>Mon. - Fri. : 9:00 AM - 12:00 NN</b></span>
                <span style="line-height: 1;"><b>2:00 PM - 4:00 PM</b></span>
                <span style="line-height: 1;"><b>Wednesday : 9:00 AM - 12:00 NN</b></span>
                <span style="line-height: 1;"><b>Saturday : 9:00 AM - 12:00 NN</b></span>
              </div>
              <!-- </div> -->
            </div>
          </div>

          <div class="row">
            <span style="text-align: center;"><i>Hospital Affiliation: SUMC, NOPH</i></span>
          </div>
          <div style="text-align: center;">
            <div class="row">
              <span style="line-height: 5px;">____________________________________________________________________</span>
              <span style="line-height: 5px;">____________________________________________________________________</span>
              <span style="line-height: 5px;">____________________________________________________________________</span>
            </div>
          </div>

          @php
          use Carbon\Carbon;
          $i = 0;
          @endphp
          <!-- <div class="row" style="margin: 0% 10% 0% 10%; padding-top: 10px;">
            <div class="col-sm-8"><span>Patient: <b>{{$request->PatientName}}</b></span></div>
            <div class="col-sm"><span>Age: <b>{{$request->Age}}</b></span></div>
            <div class="col-sm"><span>Sex: <b>{{$request->Gender}}</b></span></div>
          </div>

          <div class="row" style="margin: 0% 10% 0% 10%;">
            <div class="col-sm-8">Address: <b>{{$request->Address}}</b></div>
            <div class="col-sm">Date: <b>{{ Carbon::parse($request->DateAndTime)->format('Y-m-d') }}</b></div>
          </div> -->



          <div class="row" style="padding-top: 20px;">
            <div class="col-6">
              <div class="row" style="margin-left: 10%;">
                <span>Patient:<b> {{$request->PatientName}}</b></span>
                <span style="line-height: 1;">Address:<b> {{$request->Address}}</b></span>
                <!-- <span style="line-height: 1;"><b>Dumaguete City</b></span>
                <span style="line-height: 1;"><b>Tel.# : 225-8218</b></span> -->
              </div>
            </div>
            <div class="col">

              <div class="row" >
                <span>Age:<b> {{$request->Age}}</b></span>
                <!-- <span style="line-height: 1;"><b>Mon. - Fri. : 9:00 AM - 12:00 NN</b></span>
                <span style="line-height: 1;"><b>2:00 PM - 4:00 PM</b></span>
                <span style="line-height: 1;"><b>Wednesday : 9:00 AM - 12:00 NN</b></span>
                <span style="line-height: 1;"><b>Saturday : 9:00 AM - 12:00 NN</b></span> -->
              </div>
              <!-- </div> -->
            </div>

            <div class="col">

              <div class="row" >
                <span>Sex:<b> {{$request->Gender}}</b></span>
                <span style="line-height: 1;">Date:<b> {{ Carbon::parse($request->DateAndTime)->format('Y/m/d') }}</b></span>
                <!-- <span style="line-height: 1;"><b>2:00 PM - 4:00 PM</b></span>
                <span style="line-height: 1;"><b>Wednesday : 9:00 AM - 12:00 NN</b></span>
                <span style="line-height: 1;"><b>Saturday : 9:00 AM - 12:00 NN</b></span> -->
              </div>
              <!-- </div> -->
            </div>
          </div>





          <div class="row">
            <div style="margin-left: 10%;">
              <!-- <img src="{{ asset('img/avatar5.png')}}" alt="Logo"> -->
              <h1>Rx</h1>
            </div>
          </div>



          <!-- <div class="container" style="padding-top: 50px;">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Handle</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div> -->
          <div style="margin: 5% 5% 5% 15%;">
            <span><b>{!! nl2br(e($request->Prescription)) !!}</b></span>
          </div>



          <!-- <div class="row" style="margin: 0% 10% 0% 10%;">
            <div class="col-sm">
              <span>Next Check-up:</span>
            </div>
            <div class="col-sm">
              <div class="row">
                <span>Rosario V. Flores, M.D.</span>
                <span>Lic. No. :</span>
                <span>PTR No.:</span>
                <span>S2 No:</span>
              </div>
            </div>

          </div> -->



          <div class="row" style="padding-top: 20px;">
            <div class="col">
              <div class="row" style="margin-left: 10%;">
                <span>Next Check-up:<b> {{ Carbon::parse($request->DateAndTime)->format('Y/m/d') }}</b></span>
                <!-- <span style="line-height: 1;">Address:<b> {{$request->Address}}</b></span> -->
                <!-- <span style="line-height: 1;"><b>Dumaguete City</b></span>
                <span style="line-height: 1;"><b>Tel.# : 225-8218</b></span> -->
              </div>
            </div>


            <div class="col">

              <div class="row" >
                <span>Rosario V. Flores, M.D.</span>
                <span>Lic. No. :</span>
                <span>PTR No.:</span>
                <span>S2 No:</span>


                <!-- <span style="line-height: 1;">Date:<b> {{ Carbon::parse($request->DateAndTime)->format('Y/m/d') }}</b></span> -->
                <!-- <span style="line-height: 1;"><b>2:00 PM - 4:00 PM</b></span>
                <span style="line-height: 1;"><b>Wednesday : 9:00 AM - 12:00 NN</b></span>
                <span style="line-height: 1;"><b>Saturday : 9:00 AM - 12:00 NN</b></span> -->
              </div>
              <!-- </div> -->
            </div>
          </div>




        </div>
        <!-- card end -->
      </div>
      <div class="col-sm">
        One of three columns
      </div>
    </div>
  </div>






  <button class="btn btn-primary btn-sm" onclick="printDiv('secondDiv')">Print Second Div</button>

  <script>
    function printDiv(divId) {
      // Ensure the div ID is correctly spelled and exists in the HTML
      var divToPrint = document.getElementById(divId);
      if (!divToPrint) {
        console.error('Div with ID ' + divId + ' not found.');
        return;
      }

      var printContents = divToPrint.innerHTML;
      var originalContents = document.body.innerHTML;

      // Replace the entire body content with the contents of the specified div
      document.body.innerHTML = printContents;

      // Print the contents of the modified body
      window.print();

      // Restore the original contents after printing
      document.body.innerHTML = originalContents;
    }
  </script>




</body>

</html>