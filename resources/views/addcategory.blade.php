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
    <title>Category Details</title>
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
                        <h3>Add Category Details
                            <a href="/dashboard/home" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-home"></i>Home</a>
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header" ></div>
                                <div class="card-body">
                                    
                                <form method="post" id="add_category" enctype="multipart/form-data">
                                    @csrf
                                         <div class="form-group">
                                            <label for="email">Name</label>
                                            <input type="text" name="category_english_name" placeholder="Enter English Name" class="form-control" required>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="email">Arabic Name</label>
                                            <input type="text" name="category_arabic_name" placeholder="Enter Arabic Name" class="form-control" required>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label for="email">Description</label>
                                            <input type="text" name="category_description" placeholder="Description" class="form-control" required>
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
    <style>
/*--thank you pop starts here--*/
.thank-you-pop{
	width:100%;
 	padding:20px;
	text-align:center;
}
.thank-you-pop img{
	width:76px;
	height:auto;
	margin:0 auto;
	display:block;
	margin-bottom:25px;
}

.thank-you-pop h1{
	font-size: 42px;
    margin-bottom: 25px;
	color:#5C5C5C;
}
.thank-you-pop p{
	font-size: 20px;
    margin-bottom: 27px;
 	color:#5C5C5C;
}
.thank-you-pop h3.cupon-pop{
	font-size: 25px;
    margin-bottom: 40px;
	color:#222;
	display:inline-block;
	text-align:center;
	padding:10px 20px;
	border:2px dashed #222;
	clear:both;
	font-weight:normal;
}
.thank-you-pop h3.cupon-pop span{
	color:#03A9F4;
}
.thank-you-pop a{
	display: inline-block;
    margin: 0 auto;
    padding: 9px 20px;
    color: #fff;
    text-transform: uppercase;
    font-size: 14px;
    background-color: #8BC34A;
    border-radius: 17px;
}
.thank-you-pop a i{
	margin-right:5px;
	color:#fff;
}
#ignismyModal .modal-header{
    border:0px;
}
/*--thank you pop ends here--*/

</style>

<div class="container">
    <div class="row">
        <!--<a class="btn btn-primary" data-toggle="modal" href="#ignismyModal">open Popup</a>-->
        <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
					
                    <div class="modal-body">
                       
						<div class="thank-you-pop">
							<img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
							<h1>Sucessfully Done</h1>
							
							
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
          url: '/activity',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            // alert(response.data);
			 $.each(response.data, function (key, val) {
			
			$("#mainactivity").append("<option value="+val.activity_code+">"+val.activity_name+"</option>");
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
          url: '/category',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             //alert(JSON.stringify(response));
             $('#ignismyModal').modal('show');
             $("#add_category").trigger("reset");
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
    </script>
</body>

</html>