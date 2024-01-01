<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collab | Approval List</title>
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
<style>
.alert_disp
{
  display:none;
}
</style>
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

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN MENUS</li>
        <li class="active treeview">
          <a href="/dashboard/home">
            <!--<i class="fa fa-dashboard"></i> <span>Home</span>-->

          </a>

        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pending List
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">


        <!-- /.col -->
        <div class="col-md-12">


          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">

              <li class="active"><a href="#business" data-toggle="tab">Business <span id="bcount" class="pull-right badge bg-red alert_disp">0</span></a></li>
              <li><a href="#products" data-toggle="tab">Products <span id="pcount" class="pull-right badge bg-red alert_disp">0</span></a></li>
              <li><a href="#livefeeds" data-toggle="tab">Live Feeds<span id="lcount" class="pull-right badge bg-red alert_disp">0</span></a></li>
              <!--<li><a href="#documents" data-toggle="tab">Advertisement<span id="acount" class="pull-right badge bg-red alert_disp">0</span></a></li>-->



            </ul>
            <div class="tab-content">


              <div class="tab-pane" id="products" >

              <div class="box box-info">

                <div class="box-body">
 <!-- start table--->
 <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Date</th>


                </tr>
                <?php

              //dd($result);
$i=1;
              foreach ($result['products'] as $value)
              {
                $id=$value->{'product_identifier'};
                ?>

               <tr id="prdcts-<?php echo $id?>">
                  <td><?php echo $i?></td>
                  <td><a href="/product/view_product/<?php echo $id?>" ><?php echo $value->{'english_name'}?></a></td>
                  <td><a href="#" onclick="update_status('<?php echo $id?>')"><span class="label label-danger">Pending</span></a></td>

                  <td><?php echo $value->{'product_creation_date'}?></td>

                </tr>
      <?php  $i++;} ?>



              </table>
            </div>
             <!-- end of table--->
                </div>
              </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane end -->
              <div class="tab-pane" id="livefeeds" >

              <div class="box box-info">

                <div class="box-body">
 <!-- start table--->
 <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th>Date</th>


                </tr>
                <?php
              //dd($result);
$i=1;
              foreach ($result['posts'] as $value)
              {
                $id=$value->{'p_id'};
                ?>

               <tr id="bsns-<?php echo $id?>">
                  <td><?php echo $i?></td>
                  <td><a href="/post/post_single/<?php echo $id?>" ><?php echo $value->{'post_text'}?></a></td>
                  <td><a href="#" onclick="update_status('<?php echo $id?>')"><span class="label label-danger">Pending</span></a></td>

                  <td><?php echo $value->{'created_at'}?></td>

                </tr>
      <?php  $i++;} ?>



              </table>
            </div>
             <!-- end of table--->
                </div>
              </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane end -->
              <div class="tab-pane" id="documents" >

              <div class="box box-info">

                <div class="box-body">

                </div>
              </div>
              </div>
              <!-- /.tab-pane end -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="box box-primary">
                <?php
          $bname="";
          foreach($result['business'] as $value)
          {$bname=$value->{'business_name'};
          ?>
          <a href="/business/member_profile/<?php  echo $value->{'uni_id'}?>">
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" style="height:100px;width:100px;" src="/<?php  echo $value->{'business_logo'}?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php  echo $bname;?></h3>




            </div>
            <!-- /.box-body -->
          </div>

          </a>
          <?php }?>

                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="active tab-pane" id="business">
                <div class="box box-info">

            <div class="box-body">

            <!-- start table--->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Date</th>
                  <th>Status</th>

                </tr>
                <?php
              //dd($result);
$i=1;
              foreach ($result['business'] as $value)
              {
                $id=$value->{'uni_id'};
                ?>

               <tr id="bsns-<?php echo $id?>">
                  <td><?php echo $i?></td>
                  <td><a href="/business/member_profile/<?php echo $id?>" ><?php echo $value->{'business_name'}?></a></td>
                  <td><a href="#" onclick="update_status('<?php echo $id?>')"><span class="label label-danger">Pending</span></a></td>

                  <td><?php echo $value->{'created_at'}?></td>

                </tr>
      <?php  $i++;} ?>



              </table>
            </div>
             <!-- end of table--->

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
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });

    setTimeout("location.reload(true);",30000);
                function update_status(id)
                {
                  $("#bsns-".id).html("");
    alert(id);
    return;
      /*var sts=1;
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
       });*/


    }
    function setList()
    {

    }
    $(document).ready(function(){
      //alert();
      var bcount='<?php  echo count($result['business']);?>';
      var pcount='<?php  echo count($result['products']);?>';
      var lcount='<?php  echo count($result['posts']);?>';
      if(bcount>0)
      {
        $("#bcount").removeClass('alert_disp');
        $("#bcount").text(bcount);
      }
      if(pcount>0)
      {
        $("#pcount").removeClass('alert_disp');
        $("#pcount").text(pcount);
      }
      if(lcount>0)
      {
        $("#lcount").removeClass('alert_disp');
        $("#lcount").text(lcount);
      }
      if(bcount==0)
      {
        $("#products").removeClass('active');
      }

    });
</script>
</body>
</html>
