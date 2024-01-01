<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Business Details</title>
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
                      Registered Business List
                      <a href="/dashboard/productlist" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-shopping-cart"></i>Product List</a>
                      <a href="/dashboard/subactivitylist" class="btn btn-sm btn-outline-primary float-right"><i class="fas fa-user-shield"></i>Activity List</a>

                        </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header"></div>
                                <div class="card-body">

                                <form method="post" id="business_search" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-3 select">
                                        <!--<label>Status</label>-->
                                                <select id="status_filter" name="status_filter" class="form-control" id="mainactivity">
                                                <option value="">Choose Status</option>
                                                <option value="0">Pending</option>
                                                <option value="1">Approved</option>
                                                <option value="2">Rejected</option>
                                                <option value="3">Reported</option>
                                                </select>

                                        </div>
                                        <div class="col-md-3">

                                            <input type="text" name="business_name" placeholder="Enter Name" class="form-control">
                                        </div>
                                        <!--<div class="col-md-3">

                                            <input type="text" name="place_name" placeholder="Enter Place" class="form-control" required>
                                        </div>-->
                                        <div class="col-md-3">

                                           <input type="text" name="location_name" placeholder="Enter Address" class="form-control">
                                       </div>
                                       <div class="col-md-3">

                                           <input type="text" name="country_name" placeholder="Enter Country" class="form-control">
                                       </div>

                                       </div><br/>
                                       <div class="row">


                                       <div class="col-md-3">

                                           <input type="text" name="frm_date" placeholder="Enter From Date" class="form-control">
                                       </div>
                                       <div class="col-md-3">

                                           <input type="text" name="to_date" placeholder="Enter To Date" class="form-control">
                                       </div>
                                       <div class="col-md-3">

                                           <input type="text" name="business_start_date" placeholder="Business Start Date" class="form-control">
                                       </div>
                                       <div class="col-md-3">

                                           <input type="text" name="business_expiry_date" placeholder="Business Expiry Date" class="form-control">
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
                                       <div class="col-md-3 select">
                                        <!--<label>Status</label>-->
                                                <select id="token_filter" name="token_filter" class="form-control" id="mainactivity">
                                                <option value="">Choose  Options</option>
                                                <option value="1">By Token</option>
                                                    <option value="2">By Last Scene</option>
                                                    <!--<option value="0">No Token</option> -->

                                                </select>

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
                </div>
                <!--<div class="container">-->
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
                        </div>
                        <span style="color:red;" id="tot_count"></span>
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
                    var tkn='<?php echo $result['mytoken']?>';

                  $.ajaxSetup({

                headers: {
                       // 'noBody': tkn
                       'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'

                        }
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
            if(i==8)
            {
                $(this).html('<select id="bstatus">'+
                '<option value="0">Pending</option>'+
                '<option value="1">Approved</option>'+
                '<option value="2">Rejected</option>'+
                '<option value="3">Reported</option>'+
                '<option value="4">Verified</option>'+
                '<option value="5">Cancelled</option>'+
                '</select>');

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
          url: '/business/updatestatus',

           data: {status:sts,id:id},

           success: (response) => {
               if(response.message=="Unable to Process")
               {
                alert(JSON.stringify("Document Missing"));
                return;
               }

             $(".update").hide();
             location.reload();
             //alert(response.data.business);
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
       // alert(id);
        $.ajax({
          type:'POST',
          url: '/business/deleteBusiness/'+id,

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
    $('#business_search').submit(function(e)
    {
       e.preventDefault();
       let formData = new FormData(this);

       get_data_search(formData);

    });

  function get_data_search(formData)
            {
            $("#business_table").html('');

            $.ajax({
            type:'POST',
            url: '/search/getBusiness_Search',
		    dataType: 'json',
            data: formData,
            contentType: false,
            processData: false,
            success: (response) => {
            //alert(JSON.stringify(response));
            //return;
             $("#business_table").html('<tr>'+
                                        '<th>Photo</th>'+
                                        '<th>Name</th>'+
                                        '<th>Email</th>'+
                                        '<th>Phone</th>'+
                                        '<th>Country</th>'+

                                        '<th>Products</th>'+
                                        '<th>Activity</th>'+
                                        '<th>Status</th>'+
                                        '<th></th>'+
                                    '</tr>');
             $("#business_table").append('<tbody>');
             var tot_count=0;
			 $.each(response.data, function (key, val) {
                tot_count++;
			var id=val.uni_id;
            var slabel=["Pending","Approved","Rejected","Reported","Verified","Cancelled"];
            var scolor=["btn btn-outline-danger","btn btn-outline-success","btn btn-outline-warning","btn btn-outline-info","btn btn-outline-warning","btn btn-outline-info"];
            var class_val=scolor[val.business_account_status];
            var status=slabel[val.business_account_status];
            var event_data = new Array();
			//event_data.push({name: 'BID', value: id},{name: 'status', value: status});
            event_data.push(id,status);
            var event_data1 = new Array();
			//event_data.push({name: 'BID', value: id},{name: 'status', value: status});
            event_data1.push(val.BID,status);
            var sha_id=id;

            var token="fas fa-comment";
            var tkn=val.fcm_token;
            if(tkn=="")
            {
                token="";
            }
            else if(tkn=="null")
            {
                token="";
            }
           //sha_id = <?php //echo hash('sha512', $id)?>;

			$("#business_table").append('<tr>'+
            '<td style="width:5%"><a href="/business/member_profile/'+sha_id+'"><img width="50px" height="30px;" src=/'+val.business_logo+'></a></td>'+

                        '<td style="width:15%">'+val.business_name+'</td>'+

                        '<td style="width:10%">'+val.business_email+'</td>'+
                        '<td style="width:10%">'+val.business_main_phone_number+'</td>'+
                        '<td style="width:15%">'+val.business_country+'</td>'+
                        '<td style="width:10%"><a href="/dashboard/productlist" class="btn btn-outline-danger btn-rounded"><b>'+val.product_count+'</b></a></td>'+
                        '<td style="width:15%">'+val.sub_activity+'</td>'+
                        '<td style="width:5%"><button class="'+class_val+'">'+status+'</button></td>'+
                        '<td style="width:30%">'+
                        '<a class="btn btn-outline-success btn-rounded update" title="Add" data-toggle="tooltip" style="display:none;" onclick="updateData(\''+event_data+'\')"><i class="fa fa-save"></i></a>'+
                        '&nbsp;&nbsp<a class="btn btn-outline-info btn-rounded edit" data-toggle="tooltip"><i class="fas fa-pen"></i></a>'+
                        '&nbsp;<a class="btn btn-outline-danger btn-rounded delete" data-toggle="tooltip"><i class="fas fa-trash" onclick="deleteData(\''+event_data1+'\')"></i></a>'+
                        '&nbsp;<a href="#"   target="_blank" class="btn btn-outline-success btn-rounded" data-toggle="tooltip"><i class="'+token+'"></i></a></td></tr>');

			});
          /* $("#business_table").append('<tr>'+
            '<td style="width:5%"></td>'+

                        '<td style="width:15%"></td>'+

                        '<td style="width:10%"></td>'+
                        '<td style="width:10%"></td>'+
                        '<td style="width:15%"></td>'+
                        '<td style="width:10%"></td>'+
                        '<td style="width:15%">Total Count</td>'+
                        '<td style="width:5%"></td>'+
                        '<td style="width:30%"></td></tr>');

			});*/
            $("#tot_count").html("<b>Total Item : "+tot_count+"</b>");
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
                    //get_data("");
                });

                $('#status_filter').on('change', function() {

                        /*var formData=serializeArray();
                        formData.push({
                                        name: "status_filter",
                                        value: this.value
                                        });
                                        //alert(formData[0]);
                            get_data_search(formData);*/


                        });

     </script>
</body>

</html>
