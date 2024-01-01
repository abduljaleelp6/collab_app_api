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
    <title>Add Sub Category</title>
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
                        <h3>Add Sub Category Details
                            <!--<a href="#" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>-->
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" ></div>
                                <div class="card-body">
                                    
                                <form method="post" id="add_category" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group select">
                                        <label for="email">Category</label>
                                                <select name="main_category_id" class="form-control" id="category_id">
                                                <option value="0">Choose Category</option>  
                                                </select>
                                               
                                        </div>
                                        
                                       
                                         <div class="form-group">
                                            <label for="email">Name</label>
                                            <input type="text" name="category_name" placeholder="Enter English Name" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email">Arabic Name</label>
                                            <input type="text" name="category_arabic_name" placeholder="Enter Arabic Name" class="form-control">
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="email">Description</label>
                                            <input type="text" name="category_description" placeholder="Description" class="form-control">
                                        </div>
                                       
                                        <div class="form-group">
                                            <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;">
                                        </div>
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
	$( document ).ready(function() {
       
    $.ajax({
          type:'GET',
          url: '/category',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            //alert(response.data);
			 $.each(response.data, function (key, val) {
			
			$("#category_id").append("<option value="+val.category_identifier+">"+val.category_english_name+"</option>");
			});
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
	}); 
    $('#add_category').submit(function(e) 
    {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/subcategory',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             alert(JSON.stringify(response));
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
    </script>
</body>

</html>