<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collab | User Profile</title>
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
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <!--<div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p style="text-align: justify;">Collab Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>-->
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENUS</li>
        <li class="active treeview">
          <a href="/dashboard/home">
            <i class="fa fa-dashboard"></i> <span>Home</span>

          </a>

        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Business</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="#"><i class="fa fa-circle-o"></i> Add Business</a></li>-->
            <li ><a href="/dashboard/businesslist"><i class="fa fa-circle-o"></i> Business List</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Products</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="/dashboard/productlist"><i class="fa fa-circle-o"></i> Product List</a></li>
          </ul>
        </li>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User Profile-<span style="color: red;font-size: 18px"> Last Scene@<?php  echo $result[0]->{'last_scene'}?> </span>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">

        <div class="col-md-3">
          <!--<div class="box box-widget widget-user">

            <div class="widget-user-header bg-black" style="background: url('/<?php  //echo $result[0]->{'business_cover_image'}?>') center center;">
              <h3 class="widget-user-username"><?php  //echo $result[0]->{'business_name'}?></h3>
              <h5 class="widget-user-desc"><?php  //echo $result[0]->{'sub_activity'}?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="/<?php  //echo $result[0]->{'business_logo'}?>" alt="User Avatar">
            </div>

          </div>-->
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <a href="#" id="bprofile_img_clk">
              <img class="profile-user-img img-responsive img-circle" id="bprofile_img" style="height:100px;width:100px;" src="/<?php  echo $result[0]->{'business_logo'}?>" alt="User profile picture">
              <p class="text-center"><span style="font-size:25px;color:red;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></p>
              </a>
              <h3 class="profile-username text-center"><?php  echo $result[0]->{'business_name'}?></h3>

              <p class="text-muted text-center"><span style="font-size: 15px;color: red"><b><?php  echo $result[0]->{'sub_activity'}?></b></span></p>

              <ul class="list-group list-group-unbordered">

               <li class="list-group-item">
                  <b>Documents</b> <a class="pull-right badge bg-blue"><?php  echo $result[0]->{'document_count'}?></a>
                </li>
                <li class="list-group-item">
                  <b>Products</b> <a class="pull-right badge bg-blue"> <?php  echo $result[0]->{'products_count'}?></a>

                </li>
                <li class="list-group-item">
                  <b>Live Feeds</b> <a class="pull-right badge bg-blue"><?php  echo $result[0]->{'live_feed_count'}?></a>
                </li>
                <li class="list-group-item">
                  <b>Followers</b> <a class="pull-right badge bg-blue"><?php  echo $result[0]->{'followers_count'}?></a>
                </li>
                <li class="list-group-item">
                  <b>Following</b> <a class="pull-right badge bg-blue"><?php  echo $result[0]->{'following_count'}?></a>
                </li>


              </ul>

              <a href="#" class="" id="product_sts_id"><span id="product_sts_text"><b></b><span></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
 <!--cover image-->
        <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Cover Image</h3>
            </div>
            <div class="box-body">
            <a href="#" id="previewImg_cover_clk">
            <img id="previewImg_cover"  src="/<?php  echo $result[0]->{'business_cover_image'}?>" alt="Placeholder" style="width:250px;height:100px;;">
            <p class="text-center"><span style="font-size:25px;color:red;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></p>
              </a>
           </div>
          </div>
           <!--end of cover image-->
          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Us</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Phone No</strong>

              <p class="text-muted">
              <?php  echo $result[0]->{'business_main_phone_number'}?>
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Address</strong>

              <p class="text-muted"><?php  echo $result[0]->{'business_address'}?></p>

              <hr>



              <strong><i class="fa fa-file-text-o margin-r-5"></i> Email</strong>

              <p style="text-align: justify;"><?php  echo $result[0]->{'business_email'}?></p>
            </div>
            <!-- /.box-body -->
          </div>
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

              <li class="active"><a href="#business" data-toggle="tab">View Profile</a></li>
              <li ><a href="#products" data-toggle="tab">Products</a></li>
              <li><a href="#livefeeds" data-toggle="tab">Live Feeds</a></li>

              <li><a href="#documents" data-toggle="tab">Documents</a></li>



            </ul>
            <div class="tab-content">


              <div class="tab-pane" id="products" >

                <div class="row" >
                <?php foreach($result[0]->{'products'} as $value){?>
                <div class="col-md-3">

<!-- Profile Image -->
                    <div class="box">
                      <div class="box-body box-profile" >
                      <a href="/product/view_product/<?php  echo $value->{'product_identifier'}?>" target="_blanck"><img class="profile-user-img img-responsive img-circle" style="width:100px;height:100px" src="/<?php  echo $value->{'product_main_image'}?>" alt="User profile picture"></a>

                        <div style="height:40px;text-align:center;"><span style="font-size:14px;"><b><?php  echo $value->{'english_name'}?></b></span></div>


                        <?php
                        $id=$value->{'product_identifier'};
                        if($value->{'product_status'}==1)
                        {
                          $text="Approved";
                          $class="btn-success";
                          $color="green";


                         }
                         else
                         {

                        $text="Pending";
                        $class="btn-danger";
                        $color="red";

                        }?>






                        <div style="text-align:center;">

                        <a href="#" onclick="deleteProduct(<?php echo $id; ?>)" ><span style="color:red;font-size:20px;"><i class="fa fa-trash" aria-hidden="true"></i><span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="/product/view_product/<?php  echo $value->{'product_identifier'}?>" ><span style="color:blue;font-size:20px;"> <i class="fa fa-folder-open" aria-hidden="true"></i><span></a>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="#"><span style="color:<?php echo $color?>;font-size:15px;"><b><i class="fa fa-circle" aria-hidden="true"></i></b><span></a>

                        </div>
                      </div>
                      <!-- /.box-body -->
                    </div>

              </div>
                  <?php }?>


                 </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane end -->
              <div class="tab-pane" id="livefeeds" >

                <div class="row" >

                <div class="col-md-3">

<!-- Profile Image -->
                    <div class="box box-primary">

                    </div>

                  </div>


                 </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane end -->
              <div class="tab-pane" id="documents" >

              <div class="box box-primary">
              <?php
              $img1="/images/preview.jpeg";
              $img2=$img1;
              $expiry_date="";
              foreach($result[0]->{'documents'} as $value)
              {
                if($value->{'image_url'}!=""||$value->{'image_url'}!="File not found")
                {
                  $img1="/".$value->{'image_url'};
                }

                if($value->{'image2_url'}!=""||$value->{'image2_url'}!="File not found")
                {
                  $img2="/".$value->{'image2_url'};
                }
                $expiry_date=$value->{'expiry_date'};



                 }?>
                <!--Doc1 -->

              <div class="col-md-3">


                    <div class="box">
                      <div class="box-body box-profile" >
                      <a target="_blank" href="<?php  echo $img1?>"><img id="doc1_img_id" class="profile-user-img img-responsive img-circle" style="width:100px;height:100px" id="image_url_id" src="<?php  echo $img1?>" alt="User profile picture"></a>

                      <a href="#" id="doc1_img_clk">


            <p class="text-center"><span style="font-size:25px;color:green;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></p>
              </a>
                      <a href="#" target="_blank">
                              </a>

                        <div style="height:40px;text-align:center;"><span style="font-size:14px;"><b>Document1</b></span>
                        <a href="#" onclick="deleteData('1')" ><span style="color:red;font-size:20px;"><i class="fa fa-trash" aria-hidden="true"></i><span></a>

                      </div>

                      </div>

                    </div>

              </div>
                <!--end Doc1 -->
                 <!--Doc1 -->
              <div class="col-md-3">


                  <div class="box">
                    <div class="box-body box-profile" >
                     <a href="#" id="doc2_img_clk">
                    <a target="_blank" href="<?php  echo $img2?>"><img  class="profile-user-img img-responsive img-circle" style="width:100px;height:100px" id="image2_url_id" src="<?php  echo $img2?>" alt="User profile picture"></a>


            <p class="text-center"><span style="font-size:25px;color:green;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span></p>
              </a>

                      <div style="height:40px;text-align:center;"><span style="font-size:14px;"><b>Document2</b></span>
                      <a href="#" onclick="deleteData('1')" ><span style="color:red;font-size:20px;"><i class="fa fa-trash" aria-hidden="true"></i><span></a>

                      </div>

                    </div>

              </div>

</div>
<!--end Doc1 -->

               </div>



               <form method="post" id="add_business_documents" enctype="multipart/form-data">
                @csrf
                <div class="form-group" style="display:none;">
                <input type="file"  id="image_url" name="image_url" onchange="previewFile3(this);" >
                <input type="file"  id="image2_url" name="image2_url" onchange="previewFile4(this);" >
                </div>

                   <input type="hidden"  id="BID" name="BID" value="<?php echo $result[0]->{'BID'};?>" >
                   <input type="hidden"  id="business_name" name="business_name" value="<?php echo $result[0]->{'business_name'};?>" >

                   <input type="hidden"  id="business_uni_id" name="business_uni_id" value="<?php echo $result[0]->{'uni_id'};?>" >

                                      <div class="form-group">

                                        <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="Enter Expiry Date" value="<?php echo $expiry_date;?>">
                                      </div>

                                        <div class="form-group">
                                            <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;">
                                        </div>


                                    </form>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane end -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="box box-primary">


          </div>
              </div>
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="business">
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
            <form method="post" id="edit_business_info" enctype="multipart/form-data">
                  <div class="form-group" style="display:none">
                  Logo
                  <input type="file"  id="business_logo" name="business_logo" onchange="previewFile1(this);">
                  Cover Image
                  <input type="file"  id="business_cover_image" name="business_cover_image" onchange="previewFile2(this);" >

                    </div>

              <div class="form-group">
                Name
                  <input type="text" class="form-control" name="business_name" placeholder="Name" value='<?php  echo $result[0]->{'business_name'}?>'>
                  <input type="hidden"  name="BID"  value='<?php  echo $result[0]->{'BID'}?>'>
                </div>


                <div class="form-group">
                 Country and Code Picker
                  <select class="form-control" id="country_code_chooser">
                  <option value="0">Choose your Country</option>
                    <option value="+971">United Arab Emirates</option>
                    <option value="+1">United States</option>
                    <option value="+966">Saudi Arabia</option>
                </select>

                </div>
                <div class="form-group">
                  Country
                  <input type="text" class="form-control" id="business_country" name="business_country" placeholder="Country" value='<?php  echo $result[0]->{'business_country'}?>' readonly="readonly" >
                </div>
                <div class="form-group">
                  Country Code
                  <input type="text" class="form-control" id="business_country_code" name="business_country_code" placeholder="Country Code" value='<?php  echo $result[0]->{'business_country_code'}?>' readonly="readonly">
                </div>
                <div class="form-group">
                  City
                  <input type="text" class="form-control" name="business_city" placeholder="Place" value='<?php  echo $result[0]->{'business_city'}?>'>
                </div>
                <div class="form-group">
                  Email
                  <input type="text" class="form-control" name="business_email" placeholder="Email" value='<?php  echo $result[0]->{'business_email'}?>'>
                </div>
                <div class="form-group">
                Username
                  <input type="text" class="form-control" name="business_username" placeholder="Address" value='<?php  echo $result[0]->{'business_username'}?>'>
                </div>
                <div class="form-group">
                 Password
                  <input type="password" class="form-control" id="business_password" name="business_password" placeholder="Address" value='<?php  echo $result[0]->{'business_password'}?>'>
                  <input id="pass_check" type="checkbox"><span style="color:red;padding-left:10px;"><b>Show Password</b></span>
                </div>


                <div class="form-group">
                  Phone No
                  <input type="text" class="form-control" name="business_main_phone_number" placeholder="Phone" value='<?php  echo $result[0]->{'business_main_phone_number'}?>'>
                </div>
                <div class="form-group">
                  Address
                  <input type="text" class="form-control" name="business_address" placeholder="Address" value='<?php  echo $result[0]->{'business_address'}?>'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="business_facebook_url" placeholder="Facebook url" value='<?php  echo $result[0]->{'business_facebook_url'}?>'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="business_linkedin_url" placeholder="Linkedin url" value='<?php  echo $result[0]->{'business_linkedin_url'}?>'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="business_instagram_url" placeholder="Instagram url" value='<?php  echo $result[0]->{'business_instagram_url'}?>'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="business_web_site" placeholder="Website url" value='<?php  echo $result[0]->{'business_web_site'}?>'>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="fcm_token" placeholder="fcm_token" value='<?php  echo $result[0]->{'fcm_token'}?>'>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control" name="business_sme_type" placeholder="business_sme_type" value='<?php  echo $result[0]->{'business_sme_type'}?>'>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="business_mode" placeholder="business_mode" value='<?php  echo $result[0]->{'business_mode'}?>'>
                </div>

                <div>
                  <textarea class="textarea" placeholder="Bio" name="business_bio" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php  echo $result[0]->{'business_bio'}?></textarea>
                </div>
                <div class="form-group select">
                    <label for="email">Business Category</label>
                    <select name="business_sub_activity_id" class="form-control" id="business_types">
                        <option value="<?php  echo $result[0]->{'sub_activity_id'}?>"><?php  echo $result[0]->{'sub_activity'}?></option>


                    </select>

                </div>
                <div class="form-group">
                  <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;pull-right" value="Update Profile">
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
  document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
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

                  $("#business_types").append('<option value='+val.id+'>'+val.activity_english_name+'</option>');

              });
              $("#business_table").append('</tbody>');
          },
          error: function(response){
              //alert(JSON.stringify(response));
          }
      });
  });
$('#pass_check').click(function(){
             //alert($(this).is(':checked'));
                $(this).is(':checked') ? $('#business_password').attr('type', 'text') : $('#business_password').attr('type', 'password');
            });

$('#bprofile_img_clk').click(function(){ $('#business_logo').trigger('click'); });
$('#previewImg_cover_clk').click(function(){ $('#business_cover_image').trigger('click'); });
$('#doc2_img_clk').click(function(){ $('#image2_url').trigger('click'); });
$('#doc1_img_clk').click(function(){ $('#image_url').trigger('click'); });

    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });

    $('#country_code_chooser').on('change', function () {

     var selectedValue = this.value;
     $('#business_country_code').val(selectedValue);
     var selectedText  = this.selectedOptions[0].text;
     //alert(selectedText);
     $('#business_country').val(selectedText);

});

    $('#edit_business_info').submit(function(e)
    {
       e.preventDefault();
      //alert("API under Process");
       //return;
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/business/businessupdate',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
           //  alert(JSON.stringify(response));
             $('#submit-alert').html(response.message);
                            $('#submit-alert').show();
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
  function previewFile1(input){
        //var file = $("input[type=file]").get(0).files[0];
        var file = input.files && input.files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){

                $("#bprofile_img").attr("src", reader.result);
                $("#previewImg_logo").attr("src", reader.result);
                $("#previewImg_logo").show();
            }

            reader.readAsDataURL(file);
        }
    }
    function previewFile2(input){
        //var file = $("input[type=file]").get(0).files[0];
        var file = input.files && input.files[0];
        if(file){
            var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg_cover").attr("src", reader.result);
                $("#previewImg_cover").show();
            }

            reader.readAsDataURL(file);
        }
    }
    function previewFile3(input){
        //var file = $("input[type=file]").get(0).files[0];
        var file = input.files && input.files[0];

        if(file){
            var reader = new FileReader();

            reader.onload = function(){


                $("#doc1_img_id").attr("src", reader.result);

            }

            reader.readAsDataURL(file);
        }
    }
    function previewFile4(input){
        //var file = $("input[type=file]").get(0).files[0];
        var file = input.files && input.files[0];
        if(file){
            var reader = new FileReader();

            reader.onload = function(){
              $("#doc2_img_id").attr("src", reader.result);

            }

            reader.readAsDataURL(file);
        }
    }
    $('#business_logo').click(function(){

    //$('#business_logo').click();
        });








$("#product_sts_id").click(function(){
      var id='<?php  echo $result[0]->{'uni_id'}?>';
      var st_text=$("#product_sts_text").text();
      if(st_text=="Rejected"||st_text=="Reported")
      {
alert("not allowed");
return;
      }
      var sts=1;
      var slabel=["Pending","Approved","Rejected","Reported","Verified","Cancelled"];
      var scolor=["btn btn-danger btn-block","btn btn-success btn-block","btn btn-warning btn-block","btn btn-info btn-block","btn btn-warning btn-block","btn btn-info btn-block"];

      if(st_text=="Approved")
      {
        $("#product_sts_id").removeClass(scolor[1]);
        $("#product_sts_id").removeClass(scolor[2]);
        $("#product_sts_id").removeClass(scolor[3]);
        $("#product_sts_id").removeClass(scolor[4]);
        $("#product_sts_id").removeClass(scolor[5]);
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
        $("#product_sts_id").removeClass(scolor[4]);
        $("#product_sts_id").removeClass(scolor[5]);
        $("#product_sts_id").addClass(scolor[1]);
        //$("#product_sts_id").removeClass('btn-danger');
        $("#product_sts_text").text("Approved");
        sts=1;
      }
      $.ajax({
          type:'POST',
          url: '/business/updatestatus',

           data: {status:sts,id:id},

           success: (response) => {
            //alert(JSON.stringify(response));
               if(response.message=="Unable to Process")
               {
                alert(JSON.stringify("Document Missing"));
                return;
               }

             $(".update").hide();
             //location.reload();

           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });


    });

    $(document).ready(function(){
      var pstatus='<?php  echo $result[0]->{'business_account_status'}?>';
      //pstatus=0;
      var slabel=["Pending","Approved","Rejected","Reported","Verified","Cancelled"];
      var scolor=["btn btn-danger btn-block","btn btn-success btn-block","btn btn-warning btn-block","btn btn-info btn-block","btn btn-warning btn-block","btn btn-info btn-block"];
              var class_val=scolor[pstatus];
            var status=slabel[pstatus];

            $("#product_sts_id").addClass(class_val);
        $("#product_sts_text").text(status);
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

///product sts
                function update_product_status(id)
                {
    //alert($("#product_sts_text".id).text());
      var sts=1;

      if($("#product_sts_text".id).text()=="Approved")
      {

       $("#product_sts_id".id).addClass('btn-danger');
        $("#product_sts_text".id).text("Pending");
        sts=0;
      }
      else if($("#product_sts_text".id).text()=="Pending")
      {

        $("#product_sts_id".id).removeClass('btn-danger');
        $("#product_sts_text".id).text("Approved");
        sts=1;
      }
      return;
      $.ajax({
          type:'POST',
          url: '/product/updateproductstatus',

           data: {product_status:sts,product_identifier:id},

           success: (response) => {
            alert(JSON.stringify(response));

           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });


    }
    function deleteProduct(id)
    {
      alert("feature inactive now");
      return;

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
    $('#add_business_documents').submit(function(e)
    {
       e.preventDefault();
      //alert("API under Process");
       //return;
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/auth',
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
</script>
</body>
</html>
