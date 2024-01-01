<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Collab Admin</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

  <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">



  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
      <li class="nav-item">

        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>

      </li>

    </ul>


  </nav>
  <!-- /.navbar -->

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
     <!-- <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">HRPM Global</span>-->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">


      <!-- Sidebar Menu -->
      <nav class="mt-2">

        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p style="text-align: justify;">
                Product
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

               <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="text-align: justify;">Add Registration</p>
                </a>
              </li>


			   <li class="nav-item">
                <a href="registration-details.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="text-align: justify;">Registration Details</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="search_id.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="text-align: justify;">Search ID</p>
                </a>
              </li>
			   <li class="nav-item">
                <a href="user_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="text-align: justify;">Create User</p>
                </a>
              </li>


			  </ul>
		</li>
         <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p style="text-align: justify;">
                Buisness
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


			   <li class="nav-item">
                <a href="user_add.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="text-align: justify;">Create User</p>
                </a>
              </li>
			  <li class="nav-item">
                <a href="user-details.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p style="text-align: justify;">User Details</p>
                </a>
              </li>


			</ul>
		</li>
        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

  <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
		<div style="text-align:center;"><img src="../assets/img/logo1.jpg"  width="350px;" height="90px;"></div>
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->

            <div class="small-box bg-info">

              <div class="inner">
               <a href="registration-add.php?utype">

                <p id="emp_cnt" style="color:white;"></p>
				</a>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="registration-add.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>

		   </div>

          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">

				<a href="http://hrpmglobal.com/">
                <p id="job_cnt" style="color:white;"></p>
				</a>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="http://hrpmglobal.com/" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">

				<a href="registration-details.php">
                <p id="process_cnt" style="color:white;"></p>
				</a>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="registration-details.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">

				 <a href="search_id.php">
                <p id="time_cnt" style="color:white;"></p>
				</a>

              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="search_id.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->





      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <!--<section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Registration Form</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
			 <form id="submt_registration" enctype="multipart/form-data" action="#" method="post">

			 <div class="form-group">
                <label for="vno">Name</label>
                <input  id="name" name="name" class="form-control" >
              </div>
			  <div class="form-group">
                <label for="vno">Father's or Husband's Name</label>
                <input  id="hname" name="hname" class="form-control" >
              </div>

			 <div class="form-group">
                <label for="job_id">Gender</label>
                <select id="gender" name="gender"  class="form-control custom-select">
                  <option value="">Select one</option>
				  <option value="Male">Male</option>
				  <option value="Female">Female</option>
				  <option value="Female">Other</option>

                </select>
              </div>

			 <div class="form-group">
                <label for="dob">DOB</label>
                <input  id="dob" name="dob" class="form-control" required autocomplete="off">
              </div>
			 <div class="form-group">
                <label for="address_in">Address in India</label>
                <textarea id="address_in" name="address_in" class="form-control" rows="4"></textarea>
              </div>
			  <div class="form-group">
                <label for="address_ovr">Address in Oversease</label>
                <textarea id="address_ovr" name="address_ovr" class="form-control" rows="4"></textarea>
              </div>
			  <div class="form-group">
                <label for="country">Residing Country</label>
				<input  id="country" name="country" class="form-control">

              </div>




            </div>

          </div>

        </div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">


              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <div class="form-group">

                <input  type='file' onchange="readURL(this);" class="form-control" id="file">
				<img id="blah" src="default.png" name="file" alt="your image" width="100px;" height="100px"/>

              </div>
               <div class="form-group">
                <label for="phone">Phone</label>
                <input  id="phone" name="phone" class="form-control" >
              </div>
              <div class="form-group">
                <label for="email">Email ID</label>
                <input  id="email" name="email" class="form-control">
              </div>
			  <div class="form-group">
                <label for="etime">Occupation</label>
                <input  id="occupation" name="occupation" class="form-control">
              </div>
			  <div class="form-group">
                <label for="occupation_adrs">Occupation Address</label>
                <input  id="occupation_adrs" name="occupation_adrs" class="form-control">
              </div>
			  <div class="form-group">
                <label for="qualification">Education Qualification</label>
                <input  id="qualification" name="qualification" class="form-control">
              </div>


			  <div class="form-group">
                <label for="uid">C/O</label>
                <select id="uid" name="uid"  class="form-control chzn-select-job">


                </select>
              </div>


			 <div class="form-group">

          <input type="submit" value="Submit" class="btn btn-success float-right">

		  <div style="color:green;" id="scsmsg"></div>
			<div  id="btns_result"></div>
		  </div>
				</form>
            </div>

          </div>

        </div>
      </div>

    </section>
   -->
  </div>
  <!-- /.content-wrapper -->




  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
 <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
 <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
<script>

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	$("#dob").datepicker(
	{
		dateFormat:'yy/mm/dd',
		changeMonth: true,
        changeYear: true,
		yearRange: "1950:2015"
	}
	);
	/*$("#dob").datepicker(
		{
		onSelect: function(dateText) {
        //alert("Selected date: " + dateText + "; input's current value: " + this.value);
			},
		changeMonth: true,
        changeYear: true,

        dateFormat:'yy/mm/dd',
        showButtonPanel: true,
        firstDay: '1',
		yearRange: "1950:2015"
        //beforeShowDay: $.datepicker.noWeekends
		});*/
getco();
});
$(document).on("submit", "#submt_registration", function (event)
			{
	  event.preventDefault();
	   $(':input[type="submit"]').prop('disabled', true);
	 var fd = new FormData(this);
	 var files = $('#file')[0].files;
	  if(files.length > 0 )
	  {
           fd.append('file',files[0]);
	  }

				$.ajax({
                    url: '/registration.php?sts=add_reg',
                    type: "POST",
                    data: fd,
                     //data: new FormData(this),
                   contentType: false,
                    cache: false,
                    processData: false,
                    success:
                            function(response)
							{

								$(':input[type="submit"]').prop('disabled', false);
								if(response.message=="Added Successfully")
								{

									//window.open('./registration-edit.php?id='+response.id);
									$("#submt_registration")[0].reset();
		$typ='Admin';

		$('#btns_result').html('<br/><a href="registration-edit.php?id='+response.id+'" target="_blank">View</a>');
		if($typ=="admin")
		{

		$('#btns_result').append('<br/><a href="/registration.php?sts=print_registration&&id='+response.id+'" target="_blank">Print</a>');
		}

									$('#scsmsg').html("Successfully Created with ID "+response.id);
								}
								else
								{
									alert(response.message);
								}

							}
					});
			});



		function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
	function getco()
            {
			$.ajax({
                    url: '/registration.php?sts=get_executives',
                    type: "POST",

                    success:
                            function (response) {

								$("#uid").html("");
								$('.chzn-select-job').trigger('chosen:updated');
                                $("#uid").append('<option value="0">Select Name</option>');
								$('.chzn-select-job').trigger('chosen:updated');
                                $.each(response, function (key, val) {
									$('.chzn-select-job').trigger('chosen:updated');

                                       $("#uid").append('<option value=' + val.logid + '>' + val.name + '</option>');
                                   $('.chzn-select-job').trigger('chosen:updated');


                                });

                            }
                });
			}

            $(document).ready(function(){

$("#emp_cnt").text("Activities");
$("#job_cnt").text("Product");
$("#time_cnt").text("Business");
$("#process_cnt").text("Category");


});
</script>
</body>
</html>
