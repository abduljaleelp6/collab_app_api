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
    <title>Create Chat Group</title>
    <link href="../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="../adminfiles/css/master.css" rel="stylesheet">
    <link rel="stylesheet" href="../adminfiles/plugins/select2/select2.min.css">
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
                        <h3>Add Group Details
                            <!--<a href="#" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>-->
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" ></div>
                                <div class="card-body">
                                    
                                <form method="post" id="add_group" enctype="multipart/form-data">
                                    @csrf
                                         <div class="form-group">
                                            <label for="email">Group Name</label>
                                            <input type="text" name="gp_name" id="gp_name" placeholder="Enter Group Name" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Business Name</label>
                                            
                                            <select class="form-control select2" id="business_name" name="business_name">
                                        
                            
                                            </select>
                                        
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--<script src="http://192.168.0.104:3000/socket.io/socket.io.js"></script>-->
    <script src="http://localhost:3000/socket.io/socket.io.js"></script>
    <script>
        // var ip = "http://192.168.0.104:3000";
        var ip = "http://localhost:3000/";
        var socket = io.connect(ip, {
            query: "userId=24c3a3c7-b913-4a1f-9a85-d23ebd07615a_1ecb2710-e3b8-11eb-bf79-09c326791bd3"
        });
      
        $(document).ready(function() {
            get_data_search("name");
            
            // When you retrieve the login response
          

           
            // When you retrieve the login response
            /* socket.on('add-message-response', function(data) {
                 alert(JSON.stringify(data));
             });*/


        });
    </script>
    <script src="../adminfiles/vendor/jquery/jquery.min.js"></script>
    <script src="../adminfiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminfiles/vendor/datatables/datatables.min.js"></script>
    <script src="../adminfiles/js/initiate-datatables.js"></script>
    <script src="../adminfiles/js/script.js"></script>
    <script src="../adminfiles/plugins/select2/select2.full.min.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	function get_data_search(formData)
            {
          
              
            $.ajax({
            type:'POST',
            url: '/search/getBusiness_With_Token',
		    dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
               // alert(JSON.stringify(response));
                var cnt=0;
                $.each(response.data, function (key, val) 
                {
                    if(val.fcm_token!="")
                    {
                        cnt++;
                        $("#business_name").append("<option value="+val.BID+">"+val.business_name+"</option>");
                    }
                 
               });
             
              },
              error: function(response){
                 alert(JSON.stringify(response));
              }
        });
    }
    $('#add_group').submit(function(e) 
    {
       e.preventDefault();
      // alert($('#business_name').val());
       return;
       socket.emit('create_group', {
                group_name:  $('#gp_name').val(),
                created_by: $('#business_name').val(),
               
            });
            socket.on('create_group_response', function(data) {
                alert(JSON.stringify(data));
            });

  });
   $(".select2").select2({
                tags: true
                });
    </script>
</body>

</html>