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
    <title>Edit Subcategory Details</title>
    <link href="../../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../adminfiles/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="../../adminfiles/css/master.css" rel="stylesheet">
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
                   
                        <h3>Edit Subcategory Details
                            <!--<a href="#" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>-->
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    
                                <form method="post" id="add_sub_activity" enctype="multipart/form-data">
                              
                                    @csrf
                                  
                                         <div class="form-group">
                                            <input type="hidden" name="category_id" value='<?php echo $result[0]->{'category_id'} ?>'>
                                        </div>
                                        <div class="form-group select">
                                        <label for="email">Main Activity</label>
                                                <select name="main_category_id" class="form-control" id="mainactivity">
                                                <option value=<?php  echo $result[0]->{'main_category_id'}?>>Choose Category</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Arabic Name</label>
                                            <input type="text" name="category_name" placeholder="Enter Arabic Name" class="form-control" required value='<?php  echo $result[0]->{'category_name'}?>'>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">English Name</label>
                                            <input type="text" name="category_description" placeholder="Enter English Name" class="form-control" required value='<?php  echo $result[0]->{'category_description'}?>'> 
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Description</label>
                                            <input type="text" name="category_arabic_name" placeholder="Description" class="form-control" required value='<?php  echo $result[0]->{'category_arabic_name'}?>'>
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
    <script src="../../adminfiles/vendor/jquery/jquery.min.js"></script>
    <script src="../../adminfiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../adminfiles/vendor/datatables/datatables.min.js"></script>
    <script src="../../adminfiles/js/initiate-datatables.js"></script>
    <script src="../../adminfiles/js/script.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	$( document ).ready(function() {
        $("input").focus(function(){
                        $('#submit-alert').hide(); 
});                 
    $.ajax({
          type:'GET',
          url: '/category',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            // alert(response.data);
			 $.each(response.data, function (key, val) {
			
			$("#mainactivity").append("<option value="+val.category_identifier+">"+val.category_english_name+"</option>");
			});
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
	}); 
    $('#add_sub_activity').submit(function(e) 
    {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/subcategory/editsubcategory',
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