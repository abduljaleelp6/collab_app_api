<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Product Details</title>
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
            <div style="padding-left:10px;padding-right:10px;">
                    <div class="page-title">
                     <h3>
                     <a href="/dashboard/home" class="btn btn-sm btn-outline-danger"><i class="fas fa-home"></i>Home</a>
                         
                        Product Details
                         <a href="#" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i>Brand List</a>
                         <a href="/dashboard/businesslist" class="btn btn-sm btn-outline-primary float-right"><i class="fas fas fa-briefcase"></i>Business List</a>
                         <a href="/dashboard/categorylist" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i>Category List</a>
                        
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    
                                <form method="post" id="products_search" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 select">
                                        
                                                <select id="status_filter" name="status_filter" class="form-control" id="mainactivity">
                                                <option value="">Choose Status</option> 
                                                <option value="0">Pending</option> 
                                                <option value="1">Approved</option> 
                                                <option value="2">Rejected</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="col-md-3">
                                           
                                            <input type="text" name="product_name" placeholder="Product Name" class="form-control">
                                        </div>
                                        <!--<div class="col-md-3">
                                           
                                            <input type="text" name="place_name" placeholder="Enter Place" class="form-control" required>
                                        </div>-->
                                        <div class="col-md-3">
                                           
                                           <input type="text" name="hs_code" placeholder="Enter HS Code" class="form-control">
                                       </div>
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="business_name" placeholder="Enter Provider Name" class="form-control">
                                       </div>
                                       </div><br/>
                                       <div class="row">
                                      
                                       <div class="col-md-3">
                                           
                                           <input type="text" name="country_name" placeholder="Enter Brand Name" class="form-control">
                                       </div>
                                       
                                        <div class="col-md-1">
                                            <input type="submit" class="btn btn-success" value="Search" id="submt_search">
                                            <input id="page_offset" name="page_offset" type="hidden"  value="0">
                                            <input id="per_page_default" name="per_page_default" type="hidden"  value="10">
                                        </div>
                                       
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div style="padding-left:10px;padding-right:10px;">
                    <div class="page-title">
                       
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                        <div class="table-responsive">
                            <table width="100%" class="table table-hover" id="business_table">
                                <thead>
                                   
                                </thead>
                               
                            </table>

                            <!--pagination-->

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-end">
                                    <!--<li class="page-item disabled"><a class="page-link" href="#" tabindex="-1">Previous</a></li>
                                    
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>

                                   <li class="page-item"><a class="page-link" href="#">Next</a></li>-->
                                    
                                </ul>
                                </nav>  
                           <!--end of pagination -->
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
                    $('[data-toggle="tooltip"]').tooltip();
                    
                    //alert();
                  $.ajaxSetup({
        
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
                 }
    });
                                  
             $('#status_filter').on('change', function() {
                    //get_data(this.value);
  
                });     
                });

              
    
    $(document).on("click", ".delete", function(){
        event.preventDefault();	
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
   
 
   
    $(document).on("click", ".edit", function()
    {
        //event.preventDefault();		
        
        //$("tr").find("td:last").before('<td><select><option value="Approved">Approved</option><option value="Pending">Pending</option></select></td>');
        var i=1;
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
            if(i==7)
            {
                $(this).html('<select id="bstatus"><option value="0">Pending</option><option value="1">Approved</option><option value="2">Rejected</option></select>');
            
            }
			    i++;
        });	
        $(".update").show();
		$(".add").attr("disabled", "disabled");
    });

    function updateData(data)
    {


       
        
        var data = data.split(',');
       
        var id=data[0];
        var sts=$('#bstatus').val();
        //alert(id);
        $.ajax({
          type:'POST',
          url: '/product/updateproductstatus',
		 
           data: {product_status:sts,product_identifier:id},
           
           success: (response) => {
            // alert(JSON.stringify(response));
             $(".update").hide();
             location.reload();
             //alert(response.data.business);
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });

    }
    $('#products_search').submit(function(e) 
    {
       e.preventDefault();
       let formData = new FormData(this);
     
       get_data_search(formData);
     
    });


    function get_data_search(formData)
            {
               
    $.ajax({
          type:'POST',
          url: '/search/getProducts_Search',
          dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
           success: (response) => {
            //alert(JSON.stringify(response));
            $("#business_table").html(' <tr>'+
                                        '<th>Photo</th>'+
                                        '<th>HS Code</th>'+
                                        '<th>Name</th>'+
                                        '<th>Arabic Name</th>'+
                                        '<th>Description</th>'+
                                        '<th>Posted By</th>'+
                                        '<th>Status</th>'+
                                        '<th></th>'+
                                    '</tr>');
             $("#business_table").append('<tbody>');
            
             var i=1;
             var count=0;
             $('.pagination').html('');
			 $.each(response.data, function (key, val) {
                 var mx=parseInt(val.tot_rows)/parseInt(val.per_page);
                // $('.pagination').append('<li class="page-item"><a class="page-link" href="#">'+val.tot_rows+'</a></li>');
                
                if(i<=mx)
                {
           // $('.pagination').append('<li class="page-item"><a class="page-link" href="#">'+i+'</a></li>');
                }
                i++;
                
            $('#per_page_default').val(val.per_page);
			var id=val.product_identifier;
            var slabel=["Pending","Approved","Rejected"];
            var scolor=["btn btn-outline-danger","btn btn-outline-success","btn btn-outline-warning"];
            var class_val=scolor[val.product_status];
           
            var status=slabel[val.product_status];
            

            //class_val="btn btn-outline-success";
           //status="Approved";
            var event_data = new Array();
			//event_data.push({name: 'BID', value: id},{name: 'status', value: status});
            event_data.push(id,status);
            
            var img=val.product_main_image;

            count++;
			$("#business_table").append('<tr>'+
            '<td style="width:5%"><a href="/product/view_product/'+id+'"><img width="70px" height="50px;" src="/'+img+'"></a></td>'+
                        '<td style="width:8%">'+val.hs_code+'</td>'+
                        '<td style="width:15%">'+val.english_name+'</td>'+
                        '<td style="width:15%">'+val.arabic_name+'</td>'+
                        '<td style="width:15%"><textarea rows="3">'+val.product_description+'</textarea></td>'+
                        '<td style="width:20%">'+val.provided+'</td>'+
                        '<td style="width:10%"><button class="'+class_val+'">'+status+'</button></td>'+
                        '<td style="width:30%">'+
                        '<a class="btn btn-outline-success btn-rounded update" title="Add" data-toggle="tooltip" style="display:none;" onclick="updateData(\''+event_data+'\')"><i class="fa fa-save"></i></a>'+
                        '&nbsp;&nbsp<a class="btn btn-outline-info btn-rounded edit" data-toggle="tooltip"><i class="fas fa-pen"></i></a>'+
                        '&nbsp;<a class="btn btn-outline-danger btn-rounded delete" data-toggle="tooltip" onclick="deleteData(\''+event_data+'\')"><i class="fas fa-trash"></i></a>'+
                                        '</td></tr>');
                   
			});
            $("#business_table").append('<tr>'+
             '<td style="width:8%"><b>Total : '+count+'</b></td>'+
                       '</tr>');
            $("#business_table").append('</tbody>');
            //$('.update').attr("disabled","disabled");
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
}

                $(document).ready(function(){
                   
                var formData=$('#business_search').serializeArray();
                    get_data_search(formData);
               });

               ///pagination click
             
               $(".page-item").click(function()
               {
                   var per_page=parseInt($('#per_page_default').val());
                 
                   var cnt=($(this).text()*per_page)-per_page;
                  $("#page_offset").val(cnt);
                 
                  $("#products_search").submit();
               });

               $(document).on('click','.page-item',function(){
                var per_page=parseInt($('#per_page_default').val());
                 
                 var cnt=($(this).text()*per_page)-per_page;
                $("#page_offset").val(cnt);
               
                $("#products_search").submit();
});
function deleteData(data)
    {

        var data = data.split(',');
       
        var id=data[0];
        
       
       
        $.ajax({
          type:'GET',
          url: '/product/delete_product/'+id,
		 
           //data: {status:sts,id:id},
           
           success: (response) => {
            //alert(JSON.stringify(response));
            // $(".update").hide();
             //location.reload();
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