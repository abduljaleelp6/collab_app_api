<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Guest</title>
    <link href="../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="../adminfiles/css/master.css" rel="stylesheet">
    <style>
        .card-header
        {
            background-color:#6c9ecf;
        }
    </style>
</head>

<body>
    <div class="wrapper">
   
        <div id="body" class="active">
            
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Add Guest Details
                            <!--<a href="#" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>-->
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" ></div>
                                <div class="card-body">
                                    
                                <form method="post" id="add_activity" enctype="multipart/form-data">
                                    @csrf
                                         <div class="form-group">
                                            <label for="email">Name</label>
                                            <input type="text" name="guest_name" placeholder="Enter Name" class="form-control" required>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <label for="email">Phone</label>
                                            <input type="text" name="guest_phone" placeholder="Enter Phone" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="guest_email" placeholder="Enter Email" class="form-control" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;">
                                        </div>
                                        <div style="display: none" id="submit-alert" class="alert alert-success col-sm-12"></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../adminfiles/vendor/jquery/jquery.min.js"></script>
    <script src="../adminfiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminfiles/vendor/datatables/datatables.min.js"></script>
    <script src="../adminfiles/js/initiate-datatables.js"></script>
    <script src="../adminfiles/js/script.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	
    $('#add_activity').submit(function(e) 
    {
        e.preventDefault();
          alert("under process");return;
          
          
      
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/activity',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             //alert(JSON.stringify(response));
             $('#submit-alert').html(response.message);
                            $('#submit-alert').show();  
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
    </script>
</body>

</html>