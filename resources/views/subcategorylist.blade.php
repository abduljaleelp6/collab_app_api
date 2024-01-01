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
    <title>Sub Category Details</title>
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
            

                <div class="">
                    <div class="page-title">
                    <a href="/dashboard/home" class="btn btn-sm btn-outline-danger"><i class="fas fa-home"></i>Home</a>
                        <h3>Sub Category List
                            <a href="addsubcategory" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Add Sub Category</a>
                        </h3>
                    </div>

            <!--start of searchform -->
            <div class="row">
                        
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    
                                <form method="post" id="sub_categ_search" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                       
                                        <div class="col-md-3">
                                           
                                            <input type="text" name="category_name" placeholder="Enter Name" class="form-control">
                                        </div>
                                       
                                        <div class="col-lg-3">
                                            <input type="submit" class="btn btn-success" value="Search">
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

            <!--end of search form -->
                    <div class="box box-primary">
                        <div class="box-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-hover" id="business_table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Arabic Name</th>
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

                $('#sub_categ_search').submit(function(e) 
    {
       e.preventDefault();
       let formData = new FormData(this);
     
       get_Date(formData);
     
    });
                   
                    $( document ).ready(function() {
                        get_Date("");
    
	                    });
              
    function get_Date(formData)
    {
        $.ajax({
          type:'POST',
          url: '/search/get_subactivity_list',
          dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
           success: (response) => {
           // alert(JSON.stringify(response));
             $("#business_table").append('<tbody>');
			 $.each(response.data, function (key, val) {
                var event_data = new Array();
			//event_data.push({name: 'BID', value: id},{name: 'status', value: status});
            event_data.push(val.category_id,'test');
			$("#business_table").append('<tr>'+
            '<td style="width:10%">'+val.category_id+'</td>'+
                        '<td style="width:15%">'+val.category_name+'</td>'+
                        '<td style="width:15%">'+val.main_category+'</td>'+
                        
                        '<td style="width:20%">'+val.category_arabic_name+'</td>'+
                        '<td style="width:20%"><textarea>'+val.category_description+'</textarea></td>'+
                        '<td class="text-right" style="width:10%">'+
                        '<a href="/subcategory/EditSubCategory/'+val.category_id+'" class="btn btn-outline-info btn-rounded"><i class="fas fa-pen"></i></a>'+
                        '<a href="" class="btn btn-outline-danger btn-rounded delete"><i class="fas fa-trash" onclick="deleteData(\''+event_data+'\')"></i></a>'+
                                        '</td></tr>');
                   
			});
            $("#business_table").append('</tbody>');
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
    }
    
    function deleteData(data)
    {

        var data = data.split(',');
       
        var id=data[0];
        var sts=$('#bstatus').val();
        //alert(sts);
        $.ajax({
          type:'POST',
          url: '/subcategory/deleteSubCategory/'+id,
		 
           //data: {status:sts,id:id},
           
           success: (response) => {
            alert(JSON.stringify(response));
            // $(".update").hide();
             location.reload();
             //alert(response.data.business);
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });

    }
            </script>    
</body>

</html>