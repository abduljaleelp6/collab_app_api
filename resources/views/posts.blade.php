<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Posts</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
</head>
<body>

<div class="container mt-4">
  <h2>Add Post</h2>
    <form method="post" id="upload-image-form" enctype="multipart/form-data">
        @csrf
		<div class="form-group">
            <input type="file" name="post_image" class="form-control" id="post_image">
            <input type="hidden" name="BID" value='0dd3a082-41c3-4055-b99f-5782d4e34d96_a24300c0-817c-11eb-9487-e1ea84824c75'>
            
        </div>
		<div class="form-group">
            <input type="text" name="post_text" class="form-control" id="post_text" placeholder="post text">
            <input type="hidden" name="p_id" class="form-control" id="p_id" value="1">
            
        </div>
		<div class="form-group">
            <select name="post_type" class="form-control" id="post_type"></select>
            
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Add Post</button>
        </div>
		<span class="text-danger" id="image-input-error"></span>
    </form>
</div>

<div class="container mt-4">
  <h2>Search</h2>
   
        
        <form method="post" id="search">
        
        @csrf
		    
        <div class="form-group">
            <input type="text" name="filter_text" class="form-control" id="filter_text">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Search Filter</button>
        </div>
		<span class="text-danger" id="image-input-error"></span>
    </form>
		<span class="text-danger" id="image-input-error"></span>
    </form>
</div>

<script>
    $.ajaxSetup({
        headers: {
            'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
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

  $( document ).ready(function() {
   $('#upload-image-form').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/post/create',
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
});
  $('#upload-image-form1').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/post/postupdate',
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
  $('#search').submit(function(e) {
       e.preventDefault();
       let formData = new FormData(this);
       $('#image-input-error').text('');

       $.ajax({
          type:'POST',
          url: '/post/postfilter',
		  dataType: 'json',
           data: formData,
           contentType: false,
           processData: false,
           success: (response) => {
             alert("result"+JSON.stringify(response.data));
             //alert(response.data.business);
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
  });

</script>
</body>
</html>