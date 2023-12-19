<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="cache-control" content="nocache, no-store, max-age=0, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
  <title>WasteUrBooks | Login</title>

  <!-- Google Font: poppins -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins"/>
 
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('')}}assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('')}}assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('')}}assets/dist/css/adminlte.css">
  <link rel="stylesheet" href="{{asset('')}}assets/dist/css/stylesgue.css">
</head>
<body>
            <div class="d-lg-flex half">
        <div class="bg order-1 order-md-2" style="background-image: url('assets/dist/img/background.png');"></div>
        <div class="contents order-2 order-md-1">

            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7">
                        <div class="mb-4">
                            <img src="{{asset('images/waste-logo.png')}}" alt="" style="width: 60px!important;">
                            <br />
                            <br />
                            <h1>Sign In</h1>
                            <p class="mb-4">Welcome To WasteUrBooks</p>
                        </div>
                        <form action="{{route('loginUser')}}" method="post">
                            {{ csrf_field() }}
                            <div class="form-group first">
                                <input type="email" class="form-control" id="email" name="email" placeholder="email">

                            </div>
                            <div class="form-group last mb-3" style="display:flex;flex-direction:row;">
                                <input type="password" class="form-control" id="passwordLogin" name="passwordLogin" placeholder="password">
                                <button type="button" style="float: right;background-color:transparent; border:none;" onclick="openPassword()"> <span class="btn-show-pass">
                                        <i class="fa fa-eye" id='iconMata'></i>
                                    </span></button>
                            </div>
                            <br />
                            <br />
                            <input type="submit" value="Sign In" class="btn btn-block btn-primary">
                            <!-- <a class="btn btn-success" onClick="loginUser()" href="javascript:void(0)" style="color: #FFFFFF"> Sign In </a> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </div>

<!-- jQuery -->
<script src="{{asset('')}}assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('')}}assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('')}}assets/dist/js/adminlte.min.js"></script>
<script type="text/javascript">
    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    function loginUser(){
            let email = $("input[name=email]").val();
            let password = $("input[name=passwordLogin]").val();

            var sendLogin = {
                    'email': email,
                    'password': password
                };

            $.ajax({
                type: 'POST',
                url: "{{ url('loginUser')}}",
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: sendLogin,
                dataType: 'json',
                success: (data) => {
                    
                }
                , error: function(data) {
                    alert('Username/Password Salah.')
                }
            });
        }
</script>
</body>
</html>