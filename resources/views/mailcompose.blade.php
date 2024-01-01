<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Compose Message</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../adminfiles/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- fullCalendar 2.2.5-->
  <link rel="stylesheet" href="../adminfiles/plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="../adminfiles/plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->
  <link rel="stylesheet" href="../adminfiles/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../adminfiles/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../adminfiles/plugins/iCheck/flat/blue.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../adminfiles/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<!-- Select2 -->
<link rel="stylesheet" href="../adminfiles/plugins/select2/select2.min.css">
  
 
</head>
<body>
<div class="wrapper">

  
  
  <!-- Content Wrapper. Contains page content -->
  
   

    <!-- Main content -->
    <section class="content">
      <div class="row">
       <div class="col-md-3">
          <a href="/dashboard/home" class="btn btn-primary btn-block margin-bottom">Dashboard Home</a>

          <div class="box box-solid">
            <!--<div class="box-header with-border">
              <h3 class="box-title">Folders</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>-->
            <!--<div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Inbox
                  <span class="label label-primary pull-right">12</span></a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                </li>
                <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
              </ul>
            </div>-->
          
          </div>
         
          <!--<div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">Labels</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
           
            <div class="box-body no-padding">
              <ul class="nav nav-pills nav-stacked">
                <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
              </ul>
            </div>
         
          </div>-->
        
        </div>
       
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Compose New Message</h3>
            </div>
            <!-- /.box-header -->
            
            <form method="post" id="submt_mails" enctype="multipart/form-data">
                                    @csrf
            <div class="box-body">
              <div class="form-group">
                <label>Business Activity</label>
                <select class="form-control select2" id="business_activity" multiple="multiple"  name="business_activity[]" style="width: 100%;">
                
                </select>
               
              </div>
              <div class="form-group">
                <label>Country</label>
                <select class="form-control select2" id="country" multiple="multiple"  name="country[]" style="width: 100%;">
               
                 
                </select>
               
              </div>
              <div class="form-group">
                <label>City</label>
                <select class="form-control select2" id="city" multiple="multiple"  name="city[]" style="width: 100%;">
               
                 
                </select>
               
              </div>
              <div class="form-group">
                <label>Email</label>
                <select class="form-control select2" id="mymails" multiple="multiple"  name="ourmails[]" style="width: 100%;">
                 <option>abduljaleelp6@gmail.com</option>
                 <option>abduljaleel@collabmncis.com</option>
                 
                </select>
                <!--<a id="selectall" href="#">Select All</a>-->
              </div>
                
              
              <div class="form-group">
                <input class="form-control" name="subject" placeholder="Subject:">
              </div>
              <div class="form-group">
                    <textarea id="compose-textarea" name="compose-body" class="form-control" style="height: 300px">
                     
                    </textarea>
              </div>
              <!--<div class="form-group">
                <div class="btn btn-default btn-file">
                  <i class="fa fa-paperclip"></i> Attachment
                  <input type="file" name="attachment">
                </div>
                <p class="help-block">Max. 32MB</p>
              </div>-->
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <div class="pull-right">
                <!--<button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>-->
                <button type="submit" class="btn btn-primary" id="btn_send"><i class="fa fa-envelope-o"></i> Send</button>
              </div>
             <!-- <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>-->
            </form>
            <!--<form method="post" id="submt_mail_attachment" enctype="multipart/form-data">
                                    @csrf
                                      <span style="font-size:14px;">Attachments</span>
                                    <input type="file" name="eml_attachment" id="eml_attachment" value="Attach Files">
                                    
                                    <input type="submit" >

            </form>-->
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
     
    </div>
   
  </footer>

 
  <div class="control-sidebar-bg"></div>

<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../adminfiles/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../adminfiles/bootstrap/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../adminfiles/plugins/select2/select2.full.min.js"></script>
<!-- Slimscroll -->
<script src="../adminfiles/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../adminfiles/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../adminfiles/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../adminfiles/dist/js/demo.js"></script>
<!-- iCheck -->
<script src="../adminfiles/plugins/iCheck/icheck.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../adminfiles/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Page Script -->
<script>
  $(function () {
    //Add text editor
   // $("#compose-textarea").wysihtml5();
   
  });
  $(document).ready(function()
                {
                   
                  $.ajaxSetup({
        
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
                 }
                    });
                                  
                    
                });
    $( document ).ready(function() {
       
       $.ajax({
             type:'GET',
             url: '/search/getBusinessInfo',
             //dataType: 'json',
              
              contentType: false,
              processData: false,
              success: (response) => {
             // alert(response.data);
               //var usedCountry = [];
                $.each(response.data, function (key, val) {
               
               $("#mymails").append("<option >"+val.business_email+"</option>");

               
               
             /*  if(usedCountry.indexOf(val.business_country) == -1) 
               {
                $("#country").append("<option >"+val.business_country+"</option>");
                usedCountry.push(valu.business_country);
                }*/
              
              
               
               });
              },
              error: function(response){
                 alert(JSON.stringify(response));
              }
          });

          ///business country

          $.ajax({
             type:'GET',
             url: '/search/getBusinessCountry',
             //dataType: 'json',
              
              contentType: false,
              processData: false,
              success: (response) => {
             // alert(response.data);
               //var usedCountry = [];
                $.each(response.data, function (key, val) 
                {
                  $("#country").append("<option >"+val.business_country+"</option>");
               });
              },
              error: function(response){
                 alert(JSON.stringify(response));
              }
          });
           ///business city
          $.ajax({
             type:'GET',
             url: '/search/getBusinessCity',
             //dataType: 'json',
              
              contentType: false,
              processData: false,
              success: (response) => {
             // alert(response.data);
               //var usedCountry = [];
                $.each(response.data, function (key, val) 
                {
                  $("#city").append("<option >"+val.business_city+"</option>");
               });
              },
              error: function(response){
                 alert(JSON.stringify(response));
              }
          });
          
            //end of business city

          //$(".select2").select2();
          $(".select2").select2({
                tags: true
                });
       }); 
       $('#submt_mails').submit(function(e) 
    
       {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/email/send_mail',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             alert(JSON.stringify(response));
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
  $(document ).ready(function() 
  {
  $('#selectall').click(function() {
  
  $('#mymails option').prop('selected', true);
    });
    });
$(document).ready(function(){
        $("#eml_attachment").change(function(){
          
            //$('#submt_mail_attachment').submit();
        });
    });

  $('#submt_mail_attachment').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/email/add_email_attatchments',
		  //dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             alert(JSON.stringify(response));
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });

$( document ).ready(function() {
       
       $.ajax({
             type:'GET',
             url: '/search/getSubActivities',
             //dataType: 'json',
              
              contentType: false,
              processData: false,
              success: (response) => {
             // alert(response.data);
                $.each(response.data, function (key, val) {
               
               $("#business_activity").append("<option >"+val.activity_english_name+"</option>");
             
               
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
