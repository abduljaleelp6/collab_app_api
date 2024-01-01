<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Advertisement Details</title>
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
                    <!--<a href="/dashboard/home" class="btn btn-sm btn-outline-danger"><i class="fas fa-home"></i>Home</a>-->
                        <h3>Add Details
                            <!--<a href="#" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i> Roles</a>-->
                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">
                                    
                                <form method="post" id="adds_search" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 select">
                                        
                                                <select id="status_filter" name="status_filter" class="form-control" id="mainactivity">
                                                <option value="">Choose Status</option> 
                                                <option value="0">Pending</option> 
                                                <option value="1">Approved</option> 
                                                <option value="2">Rejected</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="col-md-3">
                                           
                                            <input type="text" name="ad_title" placeholder="Title" class="form-control">
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
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                       
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
                                  
              
                });

   

               
    
    $(document).on("click", ".delete", function(){
        event.preventDefault();	
        $(this).parents("tr").remove();
		$(".add-new").removeAttr("disabled");
    });
   
 function delete_adv(pid)
 {
     
    $.ajax({
          type:'POST',
          url: '/advertisement/delete_Advertisement',
		 
           data: {ad_id:pid},
           
           success: (response) => {
            //alert(JSON.stringify(response));
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
                $(this).html('<select id="bstatus"><option value="0">Pending</option><option value="1">Approved</option><option value="2">Rejected</option><option value="3">Blocked</option></select>');
            
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
          url: '/advertisement/change_adds_status',
		 
           data: {ad_status:sts,ad_id:id},
           
           success: (response) => {
            //alert(JSON.stringify(response));
             $(".update").hide();
             location.reload();
             //alert(response.data.business);
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });

    }

  /* $('#status_filter').on('change', function() {

    var form_data = new Array();
	form_data.push({name: 'status_filter', value: this.value});
    
    get_data(form_data);
  
                });  */
    $('#adds_search').submit(function(e) 
    {
       e.preventDefault();
       let formData = new FormData(this);
    
       get_data(formData);
     
    });

    $(document).ready(function(){
                   
                  get_data("");
               });


    function get_data(formData)
        {
    $.ajax({
          type:'POST',
          url: '/search/get_All_Adds',
		  dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
          
            //alert(JSON.stringify(response));
            // $("#business_table").html('');
            $("#business_table").html('<thead><tr><th>Image</th><th>Title</th><th>Description</th>'+
            '<th>Category</th><th>Status</th><th></th></tr></thead>');                         
               
             $("#business_table").append('<tbody>');
             
			 $.each(response.data, function (key, val) {
			var id=val.ad_id;
            var slabel=["Pending","Approved","Rejected","Blocked"];
            var scolor=["btn btn-outline-danger","btn btn-outline-success","btn btn-outline-warning","btn btn-outline-info"];
            var class_val=scolor[val.ad_status];
            var status=slabel[val.ad_status];
            var rcount=val.post_report_count;
           // class_val="btn btn-outline-success";
            //status="Approved";
            var event_data = new Array();
			//event_data.push({name: 'BID', value: id},{name: 'status', value: status});
            event_data.push(id,status);
            
            
			$("#business_table").append('<tr>'+
                        '<td style="width:10%"><img width="70px" height="50px;" src=/'+val.ad_image+'></td>'+
                        '<td style="width:20%">'+val.ad_title+'</td>'+
                        '<td style="width:30%"><textarea style="width:100%;" disabled>'+val.ad_text+'</textarea></td>'+
                        '<td style="width:15%">'+val.add_category+'</td>'+
                          '<td style="width:8%"><button class="'+class_val+'">'+status+'</button></td>'+
                        '<td style="width:30%">'+
                        '<a class="btn btn-outline-success btn-rounded update" title="Add" data-toggle="tooltip" style="display:none;" onclick="updateData(\''+event_data+'\')"><i class="fa fa-save"></i></a>'+
                        '&nbsp;&nbsp<a class="btn btn-outline-info btn-rounded edit" data-toggle="tooltip"><i class="fas fa-pen"></i></a>'+
                        '&nbsp;<a class="btn btn-outline-danger btn-rounded delete" data-toggle="tooltip" onclick="delete_adv('+id+')"><i class="fas fa-trash"></i></a>'+
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


            </script>    
</body>

</html>