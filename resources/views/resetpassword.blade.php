


<html>
<head>
<title>Reset Password</title>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">


<style>


body {
    background-color: #f9f9fa
}

.flex {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto
}

@media (max-width:991.98px) {
    .padding {
        padding: 1.5rem
    }
}

@media (max-width:767.98px) {
    .padding {
        padding: 1rem
    }
}

.padding {
    padding: 5rem
}

.card {
    background: #fff;
    border-width: 0;
    border-radius: .25rem;
    box-shadow: 0 1px 3px rgba(0, 0, 0, .05);
    margin-bottom: 1.5rem
}

.card-header {
    background-color: transparent;
    border-color: rgba(160, 175, 185, .15);
    background-clip: padding-box
}

.card-body p:last-child {
    margin-bottom: 0
}

.card-hide-body .card-body {
    display: none
}

.form-check-input.is-invalid~.form-check-label,
.was-validated .form-check-input:invalid~.form-check-label {
    color: #f54394
}
</style>
</head>
<body>

<div id="content" class="flex">
    <div class="">
        <div class="page-content page-container" id="page-content">
            <div class="padding">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Reset Password</strong></div>
                            <div class="card-body">
                            <form method="post" id="reset_password_form" enctype="multipart/form-data">
                               
                                    <div class="form-group"><label class="text-muted" for="exampleInputPassword1">New Password</label><input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new Password"> </div>
                                    <div class="form-group"><label class="text-muted" for="exampleInputPassword1">Retype Password</label><input type="password" class="form-control" id="retype_password" name="retype_password" placeholder="Retype your Password"> </div>
                                   <input type="hidden" id="BID" name="BID" value="<?php echo $result;?>">
                                   <div style="display: none" id="submit-alert" class="alert alert-success col-sm-12"></div>
                                    <div class="form-group">
                                       
                                    </div> <button type="submit" class="btn btn-primary">Reset Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	$( document ).ready(function() {
     // alert('<?  echo $result;?>');
});  

$('#reset_password_form').submit(function(e) 
    {
       e.preventDefault();
      //alert("API under Process");
      // return;
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/business/member/change_password',
          
		      dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             //alert(JSON.stringify(response));
             
              if(response.message=="Password Mismatch"||response.message=="Invalid Business ID")
              {
              $('#submit-alert').removeClass('alert-success');
              $('#submit-alert').addClass('alert-danger');
              }
             $('#submit-alert').html(response.message);
            
                            $('#submit-alert').show();  
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
</script>
</body>
</html>