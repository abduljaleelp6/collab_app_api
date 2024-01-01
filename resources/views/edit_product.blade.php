<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collab | Single Product</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../adminfiles/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../adminfiles/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../adminfiles/dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>B</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Collab</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      
    </nav>
  </header>
  
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        View Product
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <?php 
          $bname="";
          foreach($result[0]->{'business'} as $value)
          {$bname=$value->{'business_name'};
          ?>
          <a href="/business/member_profile/<?php  echo $value->{'uni_id'}?>">
          <div class="box box-primary">
            <div class="box-body box-profile">
           
              <img class="profile-user-img img-responsive img-circle" id="bprofile_img" style="height:100px;width:100px;" src="/<?php  echo $value->{'business_logo'}?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php  echo $bname;?></h3>
              
           

             
            </div>
            <!-- /.box-body -->
          </div>

          </a>
          <?php }?>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->

          <div class="box box-primary">
            <div class="box-body box-profile">
            <a href="#" id="profile_img_clk">
            <img id="profile-user-img-id" class="profile-user-img img-responsive img-circle" style="width:100px;height:100px;" src="/<?php  echo $result[0]->{'product_main_image'}?>" alt="User profile picture">
  <p class="text-center"><span style="font-size:25px;color:green;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></p>
              </a>
               <h3 class="profile-username text-center"><?php  echo $result[0]->{'english_name'}?></h3>
              
              <p class="text-muted text-center"><?php  echo $result[0]->{'product_category_name'}?></p>

             

              <a href="#" class="" id="product_sts_id"><span id="product_sts_text"><b></b><span></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
        

        <div class="col-md-9">

        <!-- start of content-->

  <!--<div class="row">
    <div class="col-md-12">
     <div class="circle-tile " >
        <a href="#"><div class="circle-tile-heading dark-blue" style=''>

       
      </div></a>
    <div class="circle-tile-content dark-blue" style="height:200px;"> 
       
    </div>
      </div>
    </div>
     
  </div>  -->

        <!-- end of content-->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              
              <li class="active"><a href="#settings" data-toggle="tab">Product Details</a></li>
              <li><a href="#activity" data-toggle="tab">Product Images</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane" id="activity">
               
                <div class="row">
        
                <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger ">
                <div class="box-header with-border">
                  <h3 class="box-title">Product Images</h3>

                  <div class="box-tools pull-right">
                    
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                   
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  <?php foreach($result[0]->{'images'} as $value){?>
 
                  <li>
                    
                    <a href="#"><img style="width:100px;height:100px;border: solid #EAF2F8;" src="/<?php echo $value->{'image_path'};?>" alt="User Image"></a>
                    <a class="users-list-name" href="/business/edit_business/'+val.uni_id+'"></a>
                    <a href="#" onclick="deleteData(<?php echo $value->{'product_image_identifier'};?>)" ><span style="color:red;font-size:20px;"><i class="fa fa-trash" aria-hidden="true"></i><span></a>
                    
                  </li>
                   <?php }?>
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                Add More Images
                                  <form method="post" id="add_product_image" enctype="multipart/form-data">
                                    @csrf
                                        
                                        
                                        <div class="form-group">
                                        <img id="previewImg"  src="https://collab.ae/images/preview.jpeg" alt="Placeholder" style="width:150px;height:100px;">
                                        <input type="file"  id="photo" name="images[]" onchange="previewFile(this);" multiple>
                                        <input type="hidden"  id="product_identifier" name="product_identifier" value="<?php echo $result[0]->{'product_identifier'};?>" >
                                        <input type="hidden"  id="business_name" name="business_name" value="<?php  echo $bname?>" >
                                        <input type="hidden"  id="english_name" name="english_name" value="<?php  echo $result[0]->{'english_name'};?>" >
                                      
                                        
                                      </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;">
                                        </div>
                                        
                                       
                                    </form>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
       
                  </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="box box-primary">
           
           
          </div>
              </div>
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="settings">
                <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Edit Details</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>-->
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
            <form method="post" id="edit_product_info" enctype="multipart/form-data">
                  <div class="form-group" style="display:none;">
                  Change Product Main Image
                  <input type="file"  id="product_main_image" name="product_main_image" class="image" onchange="previewFile1(this);">               
                  
                      </div>
                      <div class="form-group">
                      English Name
                  <input type="text" class="form-control" name="english_name" placeholder="English Name" value='<?php  echo $result[0]->{'english_name'}?>'>
                  <input type="hidden"  name="product_identifier"  value='<?php  echo $result[0]->{'product_identifier'}?>'>
                </div>     
                <div class="form-group">
                  Arabic Name
                  <input type="text" class="form-control" name="arabic_name" placeholder="Arabic Name" value='<?php  echo $result[0]->{'arabic_name'}?>'>
                   </div>
                <div class="form-group">
                Description
                  <input type="text" class="form-control" name="product_description" placeholder="Description" value='<?php  echo $result[0]->{'product_description'}?>'>
                </div>
                <div class="form-group">
               Product Category Name
                  <input type="text" class="form-control" name="product_category_name" placeholder="Product Category Name" value='<?php  echo $result[0]->{'product_category_name'}?>' disabled>
                  <input type="hidden"  name="product_category_id"  value='<?php  echo $result[0]->{'product_category_id'}?>'>
                   </div>
                <div class="form-group">
                Product Sub Category Name
                  <input type="text" class="form-control" name="product_sub_category_name" placeholder="Product Sub Category Name" value='<?php  echo $result[0]->{'product_sub_category_name'}?>' disabled>
                  <input type="hidden"  name="product_sub_category_id"  value='<?php  echo $result[0]->{'product_sub_category_id'}?>'>
                </div>
                <div class="form-group">
                  Price
                  <input type="text" class="form-control" name="product_price" placeholder="Price" value='<?php  echo $result[0]->{'product_price'}?>'>
                </div>
                <div class="form-group">
                  HS Code
                  <input type="text" class="form-control" name="hs_code" placeholder="HS Code" value='<?php  echo $result[0]->{'hs_code'}?>'>
                </div>
               
               
                <div class="form-group">
                  <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;pull-right" value="Update Product">
                </div>
                <div style="display: none" id="submit-alert" class="alert alert-success col-sm-12"></div>
              </form>

              <!-- start of model-->

              

</div>
</div>

              <!-- end of modal-->
  
            </div>
           
          </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
         
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2021-2022 <a href="#">Collab</a>.</strong> All rights
    reserved.
  </footer>

  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
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
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../../adminfiles/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../adminfiles/bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../adminfiles/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../adminfiles/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../adminfiles/dist/js/demo.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
    $('#profile_img_clk').click(function(){ $('#product_main_image').trigger('click'); });  
            
    $('#edit_product_info').submit(function(e) 
    {
       e.preventDefault();
      //alert("API under Process");
       //return;
       let formData = new FormData(this);
      

       $.ajax({
          type:'POST',
          url: '/product/updateproduct',
		      dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
           //alert(JSON.stringify(response));
           //location.reload();
           $('#ignismyModal').modal('show');
          
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
  
    function previewFile(input){
      var file = input.files && input.files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
               
            }
 
            reader.readAsDataURL(file);
        }
    }
    function previewFile1(input){
      var file = input.files && input.files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#profile-user-img-id").attr("src", reader.result);
               
            }
 
            reader.readAsDataURL(file);
        }
    }

    
    $('#business_logo').click(function(){
     
    //$('#business_logo').click();
        });








function deleteData(id)
    {

      alert("Delete under process for "+id);
      //location.reload();
        //alert(sts);
        /*$.ajax({
          type:'POST',
          url: '/business/deleteBusiness/'+id,
		 
           //data: {status:sts,id:id},
           
           success: (response) => {
            //alert(JSON.stringify(response));
            // $(".update").hide();
             location.reload();
             //alert(response.data.business);
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });*/

    }
    
    $("#product_sts_id").click(function(){
      var id='<?php  echo $result[0]->{'product_identifier'}?>';
      var st_text=$("#product_sts_text").text();
      if(st_text=="Rejected")
      {
alert("not allowed");
return;
      }
      var sts=1;
      var slabel=["Pending","Approved","Rejected","Reported"];
      var scolor=["btn btn-danger btn-block","btn btn-success btn-block","btn btn-warning btn-block","btn btn-info btn-block"];
       
      if(st_text=="Approved")
      {
        $("#product_sts_id").removeClass(scolor[1]);
        $("#product_sts_id").removeClass(scolor[2]);
        $("#product_sts_id").removeClass(scolor[3]);
        $("#product_sts_id").addClass(scolor[0]);
        
        //$("#product_sts_id").addClass('btn-danger');
        $("#product_sts_text").text("Pending");
        sts=0;
      }
     // else if($("#product_sts_text").text()=="Pending")
      else
      {
        $("#product_sts_id").removeClass(scolor[0]);
      
        $("#product_sts_id").removeClass(scolor[2]);
        $("#product_sts_id").removeClass(scolor[3]);
        $("#product_sts_id").addClass(scolor[1]);
        //$("#product_sts_id").removeClass('btn-danger');
        $("#product_sts_text").text("Approved");
        sts=1;
      }
      $.ajax({
          type:'POST',
          url: '/product/updateproductstatus',
		 
           data: {product_status:sts,product_identifier:id},
           
           success: (response) => {
            //alert(JSON.stringify(response));
            
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
      
    
    });

    $(document).ready(function(){
      var pstatus='<?php  echo $result[0]->{'product_status'}?>';
      var slabel=["Pending","Approved","Rejected","Reported"];
            var scolor=["btn btn-danger btn-block","btn btn-success btn-block","btn btn-warning btn-block","btn btn-info btn-block"];
            var class_val=scolor[pstatus];
            var status=slabel[pstatus];  

            $("#product_sts_id").addClass(class_val);
        $("#product_sts_text").text(status);
      //pstatus=0; 
          
      /*if(pstatus==0)
      {
        $("#product_sts_id").addClass('btn-danger');
        $("#product_sts_text").text("Pending");
        
      }
      else if(pstatus==1)
      {
        $("#product_sts_id").removeClass('btn-danger');
        $("#product_sts_text").text("Approved");
       
      }*/
                });


                $('#add_product_image').submit(function(e) 
    {
       e.preventDefault();
      //alert("API under Process");
       //return;
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/product/add_product_images',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
            // alert(JSON.stringify(response));
            $('#ignismyModal').modal('show'); 
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
</script>
</body>
</html>
