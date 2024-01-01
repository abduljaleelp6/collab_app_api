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
    <title>Sub Activity Details</title>
    <link href="../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/datatables/datatables.min.css" rel="stylesheet">
    <link href="../adminfiles/css/master.css" rel="stylesheet">
</head>

<body>
    <div class="wrapper">
   
        <div id="body" class="active">
            
            <div class="content">
                <div class="container">
                    <div class="page-title">
                    <a href="/dashboard/home" class="btn btn-sm btn-outline-danger"><i class="fas fa-home"></i>Home</a>
                        <h3>Sub Activity List
                            <a href="subactivityform" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Add Sub Actvity</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-hover" id="business_table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Arabic</th>
                                        <th>Main Activity</th>
                                       
                                        
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                               
                            </table>
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
                $(document).ready(function(){
                   
                  $.ajaxSetup({
        
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
                 }
    });
                                  
                    
                });

                $(document).ready(function(){
                   
                    $( document ).ready(function() {
    $.ajax({
          type:'GET',
          url: '/subactivity',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            //alert(JSON.stringify(response));
             $("#business_table").append('<tbody>');
			 $.each(response.data, function (key, val) {
			
			$("#business_table").append('<tr>'+
                        '<td style="width:20%">'+val.activity_code+'</td>'+
                        '<td style="width:20%">'+val.activity_english_name+'</td>'+
                        '<td style="width:20%">'+val.activity_arabic_name+'</td>'+
                        '<td style="width:20%">'+val.main_activity_id+'</td>'+
                        '<td style="width:20%">'+val.activity_description+'</td>'+
                        '<td class="text-right" style="width:10%">'+
                        '<a href="subactivityEdit/'+val.id+'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>'+
                        '<a href="" class="btn btn-outline-danger btn-rounded delete"><i class="fas fa-trash"></i></a>'+
                                        '</td></tr>');
                   
			});
            $("#business_table").append('</tbody>');
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
	});
                });
                $(document).on("click", ".delete", function(){
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
        $.ajax({
          type:'POST',
          url: '/subactivity/deleteItem',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            //alert(JSON.stringify(response));
             $("#business_table").append('<tbody>');
			
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
    });
            </script>    
</body>

</html>