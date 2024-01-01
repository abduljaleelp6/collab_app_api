<!doctype html>
<!-- 
* Bootstrap Simple Admin Template
* Version: 2.1
* Author: Alexis Luna
* Website: https://github.com/alexis-luna/bootstrap-simple-admin-template
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Add Advertisement</title>
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
                <div class="container">
                    <div class="page-title">
                       
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header" >
                                    <span style="color:white;"><b>+ Add Listing</b></span>
                                </div>
                                <div class="card-body">
                                    
                                <form method="post" id="add_sub_activity" enctype="multipart/form-data">
                                    @csrf
                                        
                                        <div class="form-group select">
                                      
                                                <select name="ad_type" class="form-control" id="mainactivity">
                                                <option value="0">Choose Category</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="form-group select">
                                      
                                                <select name="comp_type" class="form-control" id="comp_type">
                                                <option value="1">Internal</option>  
                                                <option value="2">External</option>  
                                                </select>
                                               
                                        </div>
                                        <div class="form-group">
                                          

                                        
                                            <input type="text" name="ad_title" placeholder="Title" class="form-control" required>
                                          
                                        </div>
                                        <div class="form-group">
                                          
                                           
                                            <input type="text" class="form-control" name="BID" value="291d4e2d-9057-4cb1-b4ad-e05d68396ef0_07f28550-e490-11eb-9562-85ac7659847c" required>
                                           
                                        </div>
                                        <div class="form-group">
                                           
                                            <textarea rows="5" type="text" name="ad_text" placeholder="Description" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                          
                                          <input type="text" name="ad_url" placeholder="URL" class="form-control">
                                        
                                      </div>
                                        <div class="form-group">
                                        <a href="#" id="choose_img" style="width:100%" class="btn btn-sm btn-outline-primary"><i class="fas fa-camera"></i> Add Picture</a>
                                        </div>
                                        <div class="form-group">
                                        <img id="previewImg"  src="https://collab.ae/images/preview.jpeg" alt="Placeholder" style="width:150px;height:100px;display:none;">
                                        <input type="file" style="visibility: hidden;" id="photo" name="ad_image" onchange="previewFile(this);" >
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" class="btn" style="background-color:#6c9ecf;color:white;">
                                        </div>
                                        
                                        <div style="display: none" id="submit-alert" class="alert alert-success col-sm-12"></div>
                                    </form>
                                </div>
                            </div>
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
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
        }
    });
	$( document ).ready(function() {
        $("input").focus(function(){
        $('#submit-alert').hide(); 
        });                 
    $.ajax({
          type:'GET',
          url: '/advertisement/get_adds_category',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            // alert(response.data);
			 $.each(response.data, function (key, val) {
			
			$("#mainactivity").append("<option value="+val.ad_cid+">"+val.category_english_name+"</option>");
			});
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
	}); 
    $('#add_sub_activity').submit(function(e) 
    {
       e.preventDefault();
      // alert("API under Process");
       //return;
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/advertisement/create_add',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             //alert(JSON.stringify(response));
             $('#submit-alert').html(response.message);
                            $('#submit-alert').show();  
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });
    
  function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                $("#previewImg").show();
            }
 
            reader.readAsDataURL(file);
        }
    }
    $('#choose_img').click(function(){
    $('#photo').click();
        });
</script>
</body>

</html>