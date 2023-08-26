@extends('manager_layout.managerLayout')

@section('manager_create_account_content')





<head>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <style>
        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        .divider-text span {
            padding: 7px;
            font-size: 12px;
            position: relative;
            z-index: 2;
        }

        .divider-text:after {
            content: "";
            position: absolute;
            width: 100%;
            border-bottom: 1px solid #ddd;
            top: 55%;
            left: 0;
            z-index: 1;
        }

        .btn-facebook {
            background-color: #405D9D;
            color: #fff;
        }

        .btn-twitter {
            background-color: #42AEEC;
            color: #fff;
        }
    </style>


</head>

<body>

      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Create Account</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Account Management</a></li>
                <li class="breadcrumb-item active">Create an account</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->


    <div class="container">

        <div class="card bg-light">
            <article class="card-body mx-auto" style="max-width: 400px;">
            <div class="card">
            <div class="d-flex justify-content-center">
                <h4 class="card-title mt-3 text-center"><b>Create Account</b></h4>
                </div>
                </div>
                <!-- <p class="text-center">Get started with your free account</p>
                <p>
                    <a href="#" class="btn btn-block btn-twitter"> <i class="fab fa-twitter"></i> Login via Twitter</a>
                    <a href="#" class="btn btn-block btn-facebook"> <i class="fab fa-facebook-f"></i> Login via facebook</a>
                </p>
                <p class="divider-text">
                    <span class="bg-light">OR</span>
                </p> -->




                <!-- @if(session('success'))
                    <script>
                        window.onload = function() {
                            alert("{{ session('success') }}");
                        };
                    </script>
                    @endif -->


                {{-- Message --}}
                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Success !</strong> {{ session('success') }}
                </div>
                @endif

                @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>Error !</strong> {{ session('error') }}
                </div>
                @endif













                <form method="post" action="/ManagerAccountRegister">
                    @csrf
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="username" class="form-control" placeholder="Username" type="text">
                        @error('username')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror

                    </div> <!-- form-group// -->

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                        </div>
                        <input name="fname" class="form-control" placeholder="First name" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                        </div>
                        <input name="lname" class="form-control" placeholder="Lastname" type="text">
                    </div> <!-- form-group// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
                        </div>
                        <!-- <select class="custom-select" style="max-width: 80px;"> -->
                        <!-- <option selected="">+91</option>
        <option value="1">+001</option>
        <option value="2">+020</option>
        <option value="3">+011</option> -->
                        <!-- </select> -->
                        <input name="phone" class="form-control" placeholder="Phone number" type="text" id="phone-input">
                    </div> <!-- form-group// -->

                    <script>
                        document.getElementById('phone-input').addEventListener('input', function() {
                            var phoneInput = this.value;
                            var numericValue = phoneInput.replace(/[^0-9]/g, '');

                            if (phoneInput !== numericValue) {
                                this.setCustomValidity('Only numeric characters are allowed.');
                            } else {
                                this.setCustomValidity('');
                            }
                        });
                    </script>

                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        </div>
                        <select class="form-control" name="userRole">
                            <option selected=""> Select job type</option>
                            <option>Doctor</option>
                            <option>Assistant</option>
                            <!-- <option>Mean Stack</option> -->
                        </select>
                    </div> <!-- form-group end.// -->
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" placeholder="Create password" type="password" name="pword">
                    </div> <!-- form-group// -->
                        @error('pword')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror


                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                        </div>
                        <input class="form-control" placeholder="Repeat password" type="password" name="pword_confirmed">
                    </div> <!-- form-group// -->
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block"> Create Account </button>
                    </div> <!-- form-group// -->
                    <p class="text-center">Have an account? <a href="#">Log In</a> </p>
                </form>
            </article>
        </div> <!-- card.// -->

    </div>
    <!--container end.//-->

</body>

</html>





@endsection