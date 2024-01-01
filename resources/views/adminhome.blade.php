<!doctype html>

<html lang="en">
<?php
$web_url=url('/');
?>




<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Collab Api</title>
    <link href="../adminfiles/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../adminfiles/css/master.css" rel="stylesheet">
    <link href="../adminfiles/vendor/chartsjs/Chart.min.css" rel="stylesheet">
    <link href="../adminfiles/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
</head>

<body>

    <div class="wrapper">
        <nav id="sidebar" class="active">
            <div class="sidebar-header">
                <img src="../assets/img/logo1.jpg" alt="bootraper logo" width="180px" height="30px;">
            </div>
            <ul class="list-unstyled components text-secondary">
            <li>
                    <a href="#"><i class="blue fas fa-home"></i> Dashboard</a>
                </li>
            <li>
                    <a href="#business" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-briefcase"></i> Business Registry <!--<span style="color:white;background-color:red;width:20px;"><b>10 </b></span>--></a>
                    <ul class="collapse list-unstyled" id="business">


                        <li>
                            <a href="businesslist"><i class="fas fa-list"></i> Registered List</a>
                        </li>
                    </ul>
            </li>
            <li>
                    <a href="#activities" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-user-shield"></i> Activities</a>
                    <ul class="collapse list-unstyled" id="activities">

                        <li>
                            <a href="#"><i class="fas fa-plus"></i> Add Activity</a>
                        </li>
                        <li>
                            <a href="activitylist"><i class="fas fa-list"></i>Activity List</a>
                        </li>
                        <li>
                            <a href="subactivityform"><i class="fas fa-plus"></i> Add Sub Activity</a>
                        </li>
                        <li>
                            <a href="subactivitylist"><i class="fas fa-list"></i>Sub Activity List</a>
                        </li>
                    </ul>
            </li>
                <li>
                    <a href="#productmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="teal fas fa-shopping-cart"></i> Products</a>
                    <ul class="collapse list-unstyled" id="productmenu">

                        <li>
                            <a href="productlist"><i class="fas fa-list"></i> Product List</a>
                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#catmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="fas fa-table"></i> Category</a>
                    <ul class="collapse list-unstyled" id="catmenu">

                        <li>
                            <a href="addcategory"><i class="fas fa-plus"></i> Add Category</a>
                        </li>
                        <li>
                            <a href="categorylist"><i class="fas fa-list"></i>Category List</a>
                        </li>
                        <li>
                            <a href="addsubcategory"><i class="fas fa-plus"></i> Add Sub Category</a>
                        </li>
                        <li>
                            <a href="subcategorylist"><i class="fas fa-list"></i> Sub Category List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#postmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="orange fas fa-blog"></i>Posts</a>
                    <ul class="collapse list-unstyled" id="postmenu">


                        <li>
                            <a href="postlist"><i class="fas fa-list"></i> Post Lists</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-plus"></i> Add Post Category</a>
                        </li>
                        <li>
                            <a href="postcategorylist"><i class="fas fa-list"></i> Post Category</a>
                        </li>
                        <li>
                            <a href="postreportlist"><i class="fas fa-list"></i>Reported Post</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#advmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="blue fas fa-ad"></i>Advertisement</a>
                    <ul class="collapse list-unstyled" id="advmenu">

                    <li>
                            <a href="add_advertisement"><i class="fas fa-plus"></i> Publish Adds</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-list"></i> Adds Lists</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#emlmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="blue fas fa-blog"></i>Email</a>
                    <ul class="collapse list-unstyled" id="emlmenu">


                        <li>
                            <a href="composemail"><i class="fas fa-list"></i> Compose Email</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#setmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle no-caret-down"><i class="orange fas fa-user"></i>Settings</a>
                    <ul class="collapse list-unstyled" id="setmenu">


                        <li>
                            <a href="create_user"><i class="fas fa-plus"></i>Create User</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-list"></i> User List</a>
                        </li>
                        <li>
                            <a href="#"><i class="fas fa-list"></i> Change Password</a>
                        </li>

                    </ul>
                </li>

               <!-- <li>
                    <a href="forms.html"><i class="fas fa-file-alt"></i> Forms</a>
                </li>
                <li>
                    <a href="tables.html"><i class="fas fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="charts.html"><i class="fas fa-chart-bar"></i> Charts</a>
                </li>
                <li>
                    <a href="icons.html"><i class="fas fa-icons"></i> Icons</a>
                </li>-->


                <!--
                <li>
                    <a href="#"><i class="fas fa-user-friends"></i>Users</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-cog"></i>Settings</a>
                </li>
-->
            </ul>
        </nav>
        <div id="body" class="active">

            <nav class="navbar navbar-expand-lg navbar-white" style="
            background-color:#6c9ecf;">
                <button type="button" id="sidebarCollapse" class="btn btn-light"><i class="fas fa-bars"></i><span></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="nav navbar-nav ml-auto">

                        <li class="nav-item dropdown">
                            <div class="nav-dropdown">
                                <a href="" class="nav-item nav-link dropdown-toggle text-secondary" data-toggle="dropdown"><i class="fas fa-user"></i> <span>Admin</span> <i style="font-size: .8em;" class="fas fa-caret-down"></i></a>
                                <div class="dropdown-menu dropdown-menu-right nav-link-menu">
                                    <ul class="nav-list">

                                        <li><a href="" class="dropdown-item"><i class="fas fa-cog"></i> Settings</a></li>
                                        <div class="dropdown-divider"></div>
                                        <li><a href="admin/adminLogout" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="content">
                <div class="container">
                    <div class="row">

                        <div class="col-md-12 page-header">
                            <div class="page-pretitle">Overview</div>
                            <h2 class="page-title">Dashboard</h2>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                        <a href="productlist">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="teal fas fa-shopping-cart"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Products</p>
                                                <span class="number" id="totproduct">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                           <!-- <i class="fas fa-calendar"></i> For this Week-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">

                        <a href="businesslist">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="olive fas fa-money-bill-alt"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Business</p>
                                                <span class="number" id="totbusiness">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                            <!-- <i class="fas fa-calendar"></i> For this Week-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </a>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">
                        <a href="postlist">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="orange fas fa-blog"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Live Feeds</p>
                                                <span class="number" id="totfeeds">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                           <!-- <i class="fas fa-calendar"></i> For this Week-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3 mt-3">

                        <a href="#">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="icon-big text-center">
                                                <i class="blue fas fa-ad"></i>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="detail">
                                                <p class="detail-subtitle">Advertisement</p>
                                                <span class="number" id="totadds">0</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="footer">
                                        <hr />
                                        <div class="stats">
                                           <!-- <i class="fas fa-calendar"></i> For this Week-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        </div>
                    </div>


                    <!--<div class="row">
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="blue large-icon mb-2 fas fa-thumbs-up"></i>
                                            <h4 class="mb-0">+21,900</h4>
                                            <p class="text-muted">FACEBOOK PAGE LIKES</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="orange large-icon mb-2 fas fa-reply-all"></i>
                                            <h4 class="mb-0">+22,566</h4>
                                            <p class="text-muted">INSTAGRAM FOLLOWERS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="grey large-icon mb-2 fas fa-envelope"></i>
                                            <h4 class="mb-0">+15,566</h4>
                                            <p class="text-muted">E-MAIL SUBSCRIBERS</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-3">
                            <div class="card">
                                <div class="content">
                                    <div class="row">
                                        <div class="dfd text-center">
                                            <i class="olive large-icon mb-2 fas fa-dollar-sign"></i>
                                            <h4 class="mb-0">+98,601</h4>
                                            <p class="text-muted">TOTAL SALES</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>
    <script src="../adminfiles/vendor/jquery/jquery.min.js"></script>
    <script src="../adminfiles/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../adminfiles/vendor/chartsjs/Chart.min.js"></script>
    <script src="../adminfiles/js/dashboard-charts.js"></script>
    <script src="../adminfiles/js/script.js"></script>

    <script>
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
            //alert(JSON.stringify(response.data['totproduct']));

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
    </script>
</body>

</html>
