<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Create User</title>
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/css/auth.css" rel="stylesheet">
    <style>
        .card-header
        {
            background-color:#6c9ecf;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="auth-content">
            <div class="card">
            <div class="card-header" ></div>
                <div class="card-body text-center">
                    <div class="mb-4">
                        <img class="brand" src="../assets/img/logo1.jpg" alt="bootstraper logo">
                    </div>
                    <!--<h6 class="mb-4 text-muted">Login to your account</h6>-->
                    <form method="post" id="upload-image-form" enctype="multipart/form-data">
                    
                        <div class="form-group text-left">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter Email" id="user" required>
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="pass" required>
                        </div>
                        <div class="form-group text-left">
                            <label for="password">Retype Password</label>
                            <input type="password" class="form-control" placeholder="Password" id="pass" required>
                        </div>
                        <!--<<div class="form-group text-left">
                            <div class="custom-control custom-checkbox">
                                input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                                <label class="custom-control-label" for="remember-me">Remember me on this device</label>
                            </div>
                        </div>-->
                        
                        <button type="button" class="btn btn-lg btn-block" style="background-color:#6c9ecf;" id="btn-login"><b><span style="color:white;font-size:15px;">Create User</span></b></button>
                        <div style="display: none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
    

    <script src="../adminfiles/vendor/jquery/jquery.min.js"></script>
    <script src="../adminfiles/vendor/bootstrap/js/bootstrap.min.js"></script>
 
 <script>
                $(document).ready(function(){
                  $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
           // 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
    });
                                       
                    
                });
                $(document).ready(function(){
                   
                    $('#pass').keypress(function(e){
                        if(e.keyCode==13)                                   
                            $('#btn-login').click();  
                        $('#login-alert').hide();
                    });   
                    $("input").focus(function(){
                        $('#login-alert').hide(); 
});                 
                    
                });

                $(document).ready(function(){
                   
                    $("#btn-login").click(function(){
                       
					
                        var user = $('#user').val();
                        var pass = $('#pass').val();
					
                       
                      $.ajax({                            
                            url: 'userValidate',
                            
                            type: 'POST', 
                                                  
                           data : {user_name:user, password:pass},
                          
                            success:
                            function(response)
                            {
                                //alert(JSON.stringify(response));
                                if(response.message=="1")
                        {
                            window.location.href = "/dashboard/home";
                        }
                        else
                        {
                            //alert("invalid");
                            $('#login-alert').html("Invalid Username or Password.");
                            $('#login-alert').show();   
                        }
                            },
                          
           error: function(response){
              alert(JSON.stringify(response));
           }
                        });
                    });
                });
            </script>
</body>
</html>
