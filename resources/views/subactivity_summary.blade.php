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
    <title>Activity Summary</title>
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
                     <h3>
                     <a href="/dashboard/home" class="btn btn-sm btn-outline-danger"><i class="fas fa-home"></i>Home</a>
                         
                     Activity Summary
                                 </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    
                                <form method="post" id="sub_act_search" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 select">
                                        <!--<label>Status</label>-->
                                                <select id="status_filter" name="status_filter" class="form-control" id="mainactivity">
                                                <option value="">Choose Status</option> 
                                                <option value="0">Pending</option> 
                                                <option value="1">Approved</option> 
                                                <option value="2">Rejected</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="col-md-3">
                                           
                                           <input type="text" name="frm_date" placeholder="Enter From Date" class="form-control">
                                       </div>
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="to_date" placeholder="Enter To Date" class="form-control">
                                       </div>
                                      
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="country_name" placeholder="Enter Country" class="form-control">
                                       </div>
                                     
                                       </div><br/>
                                      
                                       <div class="row">
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="activity_name" placeholder="Enter Business Actvity" class="form-control">
                                       </div>
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="activity_code" placeholder="Enter Activity Code" class="form-control">
                                       </div>
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="product_name" placeholder="Enter Product Name" class="form-control">
                                       </div>
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="hs_code" placeholder="Enter HS Code" class="form-control">
                                       </div>
                                       
                                        </div><br/>
                                       <div class="row" style="text-align:center;">
                                       <div class="col-md-1">
                                            <input type="submit" class="btn btn-success" value="Search">
                                        </div>
                                        <div class="col-md-1">
                                            <input type="button" class="btn btn-primary" value="Print">
                                        </div>
                                       </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-hover" id="business_table">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Members</th>
                                        <th>Products</th>
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
                   
                    
                $(document).on("click", ".delete", function()
                                {
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
            });

                $(document).ready(function(){
                    var formData=$('#sub_act_search').serializeArray();
                    get_data_search(formData);
                   
                });
    
    
                $('#sub_act_search').submit(function(e) 
                        {
                        e.preventDefault();
                        let formData = new FormData(this);
                        
                        get_data_search(formData);
                        
                        });

  function get_data_search(formData)
            {
                $.ajax({
          type:'POST',
          url: '/search/get_subactivity_summary',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            //alert(JSON.stringify(response));
             $("#business_table").append('<tbody>');
			 $.each(response.data, function (key, val) {
			var bus=val.business_count;
            var products=val.product_count;
			$("#business_table").append('<tr>'+
                        '<td style="width:20%">'+val.activity_code+'</td>'+
                        '<td style="width:20%">'+val.activity_english_name+'</td>'+
                        '<td style="width:20%"><span class="btn btn-outline-danger btn-rounded"><b>'+bus+'</b></span></td>'+
                        '<td style="width:20%"><span class="btn btn-outline-success btn-rounded"><b>'+products+'</b></span></td>'+
                       
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
            }
            </script>    
            
</body>

</html>