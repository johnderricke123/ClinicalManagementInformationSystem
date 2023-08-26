<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>




    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Patient's Fullname</label>
                    <input type="text" class="form-control" style="width: 100%;" name="PatientName" />
                </div>




                <div class="row"><label>Sex</label></div>
                <div class="form-check form-check-inline">

                    <input class="form-check-input" type="radio" name="Gender" id="inlineRadio1" value="Male">
                    <label>Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="Gender" id="inlineRadio2" value="Female">
                    <label>Female</label>
                </div>

                @php
                $dateNow = now();
                @endphp
                <div class="form-group">
                    <label for="datetime">Date and Time:</label>
                    <input type="datetime-local" class="form-control" id="datetime" name="DateAndTime" value="{{$dateNow}}">
                </div>



            </div>
            <!-- /.col -->
            <div class="col-md-6">
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" class="form-control" style="width: 100%;" name="Age" />
                </div>



                <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" style="width: 100%;" name="Address" />
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

        <textarea class="form-control" placeholder="Type your prescription" style="height: 500px;"></textarea>
        <div class="float-right" style="padding: 20px;">
            <button type="button" class="btn btn-primary btn-md" onclick="printContent()"><i class="fas fa-print"></i> Print</button>
        </div>
        <iframe id="printFrame" style="display: none;"></iframe>

        <!-- /.row -->
    </div>
    <!-- /.card-body -->



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function printContent() {
            const patientName = document.querySelector('input[name="PatientName"]').value;
            const gender = document.querySelector('input[name="Gender"]:checked').value;
            const dateTime = document.querySelector('input[name="DateAndTime"]').value;
            const age = document.querySelector('input[name="Age"]').value;
            const address = document.querySelector('input[name="Address"]').value;
            const nextCheckUp = document.querySelector('input[name="NextCheckUp"]').value;
            const prescription = document.getElementById('prescription').value;

            // Create the printable content
            const printableContent = `
            <h2>Patient's Information</h2>
            <p><strong>Patient's Fullname:</strong> ${patientName}</p>
            <p><strong>Sex:</strong> ${gender}</p>
            <p><strong>Date and Time:</strong> ${dateTime}</p>
            <p><strong>Age:</strong> ${age}</p>
            <p><strong>Address:</strong> ${address}</p>
            <p><strong>Next check up:</strong> ${nextCheckUp}</p>
            <h2>Prescription</h2>
            <p>${prescription}</p>
        `;

            // Create a new document inside the iframe and write the content
            const printFrame = document.getElementById('printFrame').contentWindow.document;
            printFrame.open();
            printFrame.write(`
            <!DOCTYPE html>
            <html>
                <head>
                    <title>Printable Information</title>
                </head>
                <body>
                    ${printableContent}
                </body>
            </html>
        `);
            printFrame.close();

            // Print the content inside the iframe
            printFrame.getElementById('prescription').style.height = '100%'; // Adjust the height of the textarea
            printFrame.getElementById('prescription').style.overflow = 'hidden'; // Hide scrollbar
            printFrame.getElementById('prescription').style.border = 'none'; // Hide textarea border
            printFrame.getElementById('prescription').style.resize = 'none'; // Disable textarea resize
            printFrame.getElementById('prescription').focus(); // Focus on the textarea to ensure printing
            printFrame.getElementById('prescription').select(); // Select the content to ensure printing

            // Print the content inside the iframe
            printFrame.print();
        }
    </script>


</body>

</html>