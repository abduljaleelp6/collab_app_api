<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Post Report Details</title>
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
                    <a href="/dashboard/home" class="btn btn-sm btn-outline-danger"><i class="fas fa-home"></i>Home</a>
                        <h3>Post Report Details
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
                                    <div class="row">
                                        <div class="col-md-4 select">
                                        
                                                <select id="status_filter" class="form-control" id="mainactivity">
                                                <option value="0">Choose Status</option> 
                                                <option value="0">Pending</option> 
                                                <option value="1">Approved</option> 
                                                <option value="2">Rejected</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="col-md-3">
                                           
                                            <input type="text" name="activity_arabic_name" placeholder="Name" class="form-control" required>
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
                </div>
                <!--<div class="container">-->
            <div style="padding-left:10px;padding-right:10px;">
                    <div class="page-title">
                       
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <table width="100%" class="table table-hover" id="business_table">
                                <thead>
                                    <tr>
                                        <th>Post</th>
                                        <th>Posted By</th>
                                        <th>Reported By</th>
                                        
                                        <th>Comments</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                               
                            </table>
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
                    get_data(this.value);
  
                });     
                });
function get_data(id)
{
    $.ajax({
          type:'POST',
          url: '/post/getAllPostReport',
		  data:{search:id},
           success: (response) => {
             //alert(response.data);
            // $("#business_table").html('');
             $("#business_table").append('<tbody>');
			 $.each(response.data, function (key, val) {
			var id=val.post_id;
            var slabel=["Pending","Approved","Rejected"];
            var scolor=["btn btn-outline-danger","btn btn-outline-success","btn btn-outline-warning"];
            var class_val=scolor[val.post_status];
            var status=slabel[val.post_status];

            //class_val="btn btn-outline-success";
            //status="Approved";
            var event_data = new Array();
			//event_data.push({name: 'BID', value: id},{name: 'status', value: status});
            event_data.push(id,status);
            
            
			$("#business_table").append('<tr>'+
                        '<td style="width:20%">'+val.post_text+'</td>'+
                        '<td style="width:20%">'+val.posted_by+'</td>'+
                        '<td style="width:20%">'+val.reported_by+'</td>'+
                        '<td style="width:20%">'+val.comments+'</td>'+
                        '<td style="width:10%"><button class="'+class_val+'">'+status+'</button></td>'+
                        '<td style="width:20%">'+
                        '<a class="btn btn-outline-success btn-rounded update" title="Add" data-toggle="tooltip" style="display:none;" onclick="updateData(\''+event_data+'\')"><i class="fa fa-save"></i></a>'+
                        '&nbsp;&nbsp<a class="btn btn-outline-info btn-rounded edit" data-toggle="tooltip"><i class="fas fa-pen"></i></a>'+
                        '&nbsp;<a class="btn btn-outline-danger btn-rounded delete" data-toggle="tooltip"><i class="fas fa-trash"></i></a>'+
                                        '</td></tr>');
                   
			});
            $("#business_table").append('</tbody>');
            //$('.update').attr("disabled","disabled");
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
}
                $(document).ready(function(){
                   
                    get_data("");
                });
    
    $(document).on("click", ".delete", function(){
        event.preventDefault();	
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
   
 function deletepost(pid)
 {
    $.ajax({
          type:'POST',
          url: '/post/deletepost',
		 
           data: {id:pid},
           
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
   
    $(document).on("click", ".edit", function()
    {
        //event.preventDefault();		
        
        //$("tr").find("td:last").before('<td><select><option value="Approved">Approved</option><option value="Pending">Pending</option></select></td>');
        var i=1;
        $(this).parents("tr").find("td:not(:last-child)").each(function(){
            if(i==5)
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
        //alert(sts);
        $.ajax({
          type:'POST',
          url: '/post/editpoststatus',
		 
           data: {post_status:sts,p_id:id},
           
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
            </script>    
</body>

</html>