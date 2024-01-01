<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collab | Single Post</title>
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
        View Post
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">



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

              <li class="active"><a href="#post_details" data-toggle="tab">Post Details</a></li>
             <!-- <li><a href="#post_edit" data-toggle="tab">Post Edit</a></li>-->
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="post_details">

                <div class="row">

                <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger ">
                <div class="box-header with-border">
                  <h3 class="box-title">Post Details</h3>


                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">

                <div class="box box-widget">
            <div class="box-header with-border">
              <div class="user-block">
                <?php
              $bname="";
              $blogo="";
              $bid="";
          foreach($result[0]->{'business'} as $value)
          {
            $bname=$value->{'business_name'};
            $blogo=$value->{'business_logo'};
            $bid=$value->{'uni_id'};
          }
          ?>
                <img class="img-circle" src="/<?php  echo $blogo ?>" alt="User Image">
                <span class="username"><a href="/business/member_profile/<?php  echo $bid; ?>"><?php  echo $bname ?></a></span>
                <!--<span class="description">Shared publicly - 7:30 PM Today</span>-->
              </div>
              <!-- /.user-block -->
              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                  <i class="fa fa-circle-o"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <img class="img-responsive pad" id="post_details_img" src="/<?php  echo $result[0]->{'post_image'}?>" alt="Photo">
              <a href="#" id="previewImg_cover_clk">
              <p class="text-center"><span style="font-size:25px;color:red;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></p>
              </a>
              <p style="text-align: justify;"><?php  echo $result[0]->{'post_text'}?></p>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
              <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
              <span class="pull-right text-muted">127 likes - 3 comments</span>
            </div>
            <!-- /.box-body -->


            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
                </div>
                <!-- /.box-body -->

                <input id="edit_check" type="checkbox"><span style="color:red;padding-left:10px;"><b>Click to Edit</b></span>
                <div id="form_edit_section" style="display:none;">

                <form method="post" id="edit_post_info" enctype="multipart/form-data">
                  <div class="form-group" style="display:none;">
                      Change Post Image
                      <input type="file"  id="post_image" name="post_image" onchange="previewFile(this);">

                  </div>


                <div class="form-group">
                Post Text
                  <textarea rows="4" type="text" class="form-control" name="post_text" placeholder="Description" ><?php  echo $result[0]->{'post_text'}?></textarea>
                  <input type="hidden"  name="p_id"  value='<?php  echo $result[0]->{'p_id'}?>'>

                </div>
                <div class="form-group">
                   <select name="post_type" class="form-control" id="post_type">
                   <option value='<?php  echo $result[0]->{'post_type'}?>'><?php  echo $result[0]->{'post_category_name'}?></option>

                   </select>

                 </div>


                <div class="form-group">
                  <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;pull-right" value="Update Post">
                </div>
                <div style="display: none" id="submit-alert" class="alert alert-success col-sm-12"></div>
              </form>
                </div>

                <div class="box-footer text-center">
                <a href="#" class="btn btn-success" id="product_sts_id"><span id="product_sts_text"><b>Approved</b><span></a>
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

              <div class="tab-pane" id="post_edit">
                <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title">Needs</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!--<button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>-->
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">



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
    $('#previewImg_cover_clk').click(function(){ $('#post_image').trigger('click'); });
    $('#edit_check').click(function(){
             //alert($(this).is(':checked'));
                $(this).is(':checked') ? $('#form_edit_section').show() : $('#form_edit_section').hide();
            });


    $('#edit_post_info').submit(function(e)
    {
       e.preventDefault();
     // alert("API under Process");
      // return;
       let formData = new FormData(this);


       $.ajax({
          type:'POST',
          url: '/post/postupdate',
		      dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
           alert(JSON.stringify(response));
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

                $("#post_image_id").attr("src", reader.result);
                $("#post_details_img").attr("src", reader.result);

            }

            reader.readAsDataURL(file);
        }
    }



    $('#post_image_id').click(function(){
     //alert();
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
      var id='<?php  echo $result[0]->{'p_id'}?>';
      var sts=1;
      if($("#product_sts_text").text()=="Approved")
      {
        $("#product_sts_id").addClass('btn-danger');
        $("#product_sts_text").text("Pending");
        sts=0;
      }
      else if($("#product_sts_text").text()=="Pending")
      {
        $("#product_sts_id").removeClass('btn-danger');
        $("#product_sts_text").text("Approved");
        sts=1;
      }
      $.ajax({
          type:'POST',
          url: '/post/editpoststatus',

           data: {post_status:sts,p_id:id},

           success: (response) => {
            //alert(JSON.stringify(response));

           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });


    });

    $(document).ready(function(){
      var pstatus='<?php  echo $result[0]->{'post_status'}?>';
      //pstatus=0;

      if(pstatus==0)
      {
        $("#product_sts_id").addClass('btn-danger');
        $("#product_sts_text").text("Pending");

      }
      else if(pstatus==1)
      {
        $("#product_sts_id").removeClass('btn-danger');
        $("#product_sts_text").text("Approved");

      }
                });


                $( document ).ready(function() {
    $.ajax({
          type:'GET',
          url: '/post/postcategory',
		  //dataType: 'json',

           contentType: false,
           processData: false,
           success: (response) => {
             //alert(response.data);
			 $.each(response.data, function (key, val) {

			$("#post_type").append("<option value="+val.cid+">"+val.category_name+"</option>");
			});
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
	});
</script>
</body>
</html>
