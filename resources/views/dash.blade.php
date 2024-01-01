<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Collab| Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.10 -->
  <link rel="stylesheet" href="../adminfiles/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../adminfiles/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminfiles/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../adminfiles/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">

  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>LB</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Collab</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!--<li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 4 messages</li>
              <li>

                <ul class="menu">
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Support Team
                        <small><i class="fa fa-clock-o"></i> 5 mins</small>
                      </h4>
                      <p style="text-align: justify;">Why not buy a new awesome theme?</p>
                    </a>
                  </li>

                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        AdminLTE Design Team
                        <small><i class="fa fa-clock-o"></i> 2 hours</small>
                      </h4>
                      <p style="text-align: justify;">Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Developers
                        <small><i class="fa fa-clock-o"></i> Today</small>
                      </h4>
                      <p style="text-align: justify;">Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user3-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Sales Department
                        <small><i class="fa fa-clock-o"></i> Yesterday</small>
                      </h4>
                      <p style="text-align: justify;">Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <div class="pull-left">
                        <img src="dist/img/user4-128x128.jpg" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        Reviewers
                        <small><i class="fa fa-clock-o"></i> 2 days</small>
                      </h4>
                      <p style="text-align: justify;">Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">See All Messages</a></li>
            </ul>
          </li>

  -->
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
           <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="https://collab.ae/assets/img/logo1.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo session()->get('uname'); ?></span>
            </a>
           <ul class="dropdown-menu">

              <li class="user-header">
                <img src="https://collab.ae/assets/img/logo1.jpg" class="img-circle" alt="User Image">

                <p style="text-align: justify;">
                  <?php echo session()->get('uname'); ?>
                  <small></small>
                </p>
              </li>



              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="/dashboard/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->

        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
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
            <li ><a href="businesslist"><i class="fa fa-circle-o"></i> Business List</a></li>
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
            <li><a href="#"><i class="fa fa-circle-o"></i> Add Product</a></li>
            <li><a href="productlist"><i class="fa fa-circle-o"></i> Product List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Activities</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="add_activity" class="iframe_display"><i class="fa fa-circle-o"></i> Add Main Group</a></li>
            <li ><a href="activitylist" class="iframe_display"><i class="fa fa-circle-o"></i> Group List</a></li>
            <li><a href="subactivityform" class="iframe_display"><i class="fa fa-circle-o"></i> Add Activities</a></li>
            <li ><a href="subactivitylist" class="iframe_display"><i class="fa fa-circle-o"></i> Actvity List</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Category</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addcategory" class="iframe_display"><i class="fa fa-circle-o"></i> Add Catgeory</a></li>
            <li><a href="categorylist" class="iframe_display"><i class="fa fa-circle-o"></i>Catgeory List</a></li>
            <li><a href="addsubcategory" class="iframe_display"><i class="fa fa-circle-o"></i> Sub Catgeory</a></li>
            <li><a href="subcategorylist" class="iframe_display"><i class="fa fa-circle-o"></i>Sub Catgeory List</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Blog Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="postlist" class="iframe_display"><i class="fa fa-circle-o"></i> Post List</a></li>
            <li><a href="#" class="iframe_display"><i class="fa fa-circle-o"></i> Add Category</a></li>
            <li><a href="postcategorylist" class="iframe_display"><i class="fa fa-circle-o"></i> Category</a></li>
            <li><a href="postreportlist" class="iframe_display"><i class="fa fa-circle-o"></i>Reported Post</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Advertisement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="adds_category"><i class="fa fa-circle-o"></i> Publish Adds</a></li>-->
            <li><a href="add_advertisement" class="iframe_display"><i class="fa fa-circle-o"></i> Publish Adds</a></li>

            <li><a href="addlist" class="iframe_display"><i class="fa fa-circle-o"></i> Adds List</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Mail Broadcasting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="composemail"><i class="fa fa-circle-o"></i> Compose Mail</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Guest User Details</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="guest_create"><i class="fa fa-circle-o"></i> Guest Create</a></li>
            <li><a href="guest_list"><i class="fa fa-circle-o"></i> Guest user list</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Chat Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="create_chat_group"><i class="fa fa-circle-o"></i> Craete Group</a></li>
            <li><a href="chat_group_list"><i class="fa fa-circle-o"></i> Group List</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Add Group Member</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Member List</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Statistics</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="subactivity_summary" class="iframe_display"><i class="fa fa-circle-o"></i>Actvity Summary</a></li>
            <li><a href="businesslist" class="iframe_display"><i class="fa fa-circle-o"></i>Business Summary</a></li>
            <li><a href="productlist" class="iframe_display"><i class="fa fa-circle-o"></i>Product Summary</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Request For Quotes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="rfq_list" class="iframe_display"><i class="fa fa-circle-o"></i>RFQ List</a></li>


          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="parameter_list" class="iframe_display"><i class="fa fa-circle-o"></i>Parameters</a></li>
            <li><a href="generate_notification" class="iframe_display"><i class="fa fa-circle-o"></i>Notification</a></li>


          </ul>
        </li>




      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

     <iframe name="home_section" id="home_section" src="about:blank" style="display:none;text-align:center;" frameborder="0" width="100%"></iframe>

    <!-- Main content -->
    <section class="content" id="home_landing">
      <!-- Info boxes -->
      <div class="row">
        <!-- /.col -->
        <div class="col-md-3 col-sm-10 col-xs-12">
          <a href="businesslist"><div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Members</span>
              <span class="info-box-number" id="totbusiness">5,000</span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-10 col-xs-12">
        <a href="productlist"><div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Products</span>
              <span class="info-box-number" id="totproduct">0</span>
            </div>
            <!-- /.info-box-content -->
          </div></a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-10 col-xs-12">

        <a href="postlist">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Posts</span>
              <span class="info-box-number" id="totfeeds">4,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
        </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-10 col-xs-12">
        <a href="addlist">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Adds</span>
              <span class="info-box-number" id="totadds">760</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          </a>
          <!-- /.info-box -->
        </div>

      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-12">

          <div class="row">


            <div class="col-md-12">
              <!-- USERS LIST -->
              <div class="box box-danger ">
                <div class="box-header with-border">
                  <h3 class="box-title">Latest Members</h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger">Latest Members</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>

                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">



                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="businesslist" class="uppercase">View All</a>
                </div>
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->


          <!-- /.box -->
        </div>
        <!-- /.col -->


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
<!-- jQuery 2.2.3 -->
<script src="../adminfiles/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.10 -->
<script src="../adminfiles/bootstrap/js/bootstrap.min.js"></script>
<script>
  var tkn='<?php echo $result['mytoken']?>';
  //alert(tkn);

  function showFrame(url,size,scroll)
  {


    $('#home_section').attr('src',url);
    $('#home_section').attr('height',size);
    $('#home_section').attr('scrolling',scroll);

    $('#home_landing').hide();
    $('#home_section').show();
  }
  $(".iframe_display").click(function(event) {
                event.preventDefault();
                var url = $(this).attr("href");
                var size="630px";
                var scroll="yes";
                showFrame(url,size);
            });
  $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });


	$( document ).ready(function() {

    $.ajax({
          type:'GET',
          url: '/dashboard/getHomeCounter',
		  //dataType: 'json',

           contentType: false,
           processData: false,
           success: (response) => {
            //alert(JSON.stringify(response));

			$("#totproduct").text(response.data['totproduct']);
            $("#totbusiness").text(response.data['totbusiness']);
            $("#totfeeds").text(response.data['totfeeds']);
            $("#totadds").text(response.data['totadds']);


           },
           error: function(response){
              //alert(JSON.stringify(response));
           }
       });
	});

function get_data_search(formData)
            {


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

var i=1;
			 $.each(response.data, function (key, val)
             {
              $color="red";
              if(val.business_account_status==1)
              {
                $color="green";
              }

            if(i<=20)
            {
                $(".users-list").append(' <li>'+

                      '<a href="/business/member_profile/'+val.uni_id+'"><img style="width:100px;height:100px;border: solid #EAF2F8;" src="/'+val.business_logo+'" alt="User Image"></a>'+
                      '<a class="users-list-name" href="/business/edit_business/'+val.uni_id+'">'+val.business_name+'</a>'+
                      '<span class="users-list-date">'+val.sub_activity+'</span>'+
                      '<span style="color:'+$color+';font-size:15px;"><b><i class="fa fa-circle" aria-hidden="true"></i></b><span></a>'+

                    '</li></a>');
            }


                    i++;

			});

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




</script>


<!-- FastClick -->
<script src="../adminfiles/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../adminfiles/dist/js/app.min.js"></script>
<!-- Sparkline -->
<script src="../adminfiles/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../adminfiles/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../adminfiles/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="../adminfiles/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="../adminfiles/plugins/chartjs/Chart.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../adminfiles/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../adminfiles/dist/js/demo.js"></script>


</body>
</html>
