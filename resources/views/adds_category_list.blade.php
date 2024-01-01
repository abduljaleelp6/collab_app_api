<html>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
</head>
<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Now choose the right category for</h3>
        </div>   
        <ul class="list-group">
            <li class="list-group-item">
                <div class="row toggle" id="dropdown-detail-1" data-toggle="detail-1">
                    <div class="col-xs-10">
                        Item 1
                    </div>
                    <div class="col-xs-2"><i class="fa fa-chevron-right pull-right"></i></div>
                </div>
                
            </li>
            
        </ul>
	</div>
</div>

<script>
    $(document).ready(function(){
                   
                   $.ajaxSetup({
         
         headers: {
             'noBody': 'INTAR2QYV9J5TXmVr15uQ7VvXNTIBJKU8CXJbwXgPCvOenGyJ5RfUoEAAMENQ0rGJ0cFw4aITvFVOXY8whho3qZCoK5LKRjhSrpbvmZrpulTzCpYRuMhrIWNUmk7tnGuJxVOC'
                  }
     });
                                   
                     
                 });
    $(document).ready(function() {
    $('[id^=detail-]').hide();
    $('.toggle').click(function() {
        window.open("add_advertisement","_self")
        $input = $( this );
        $target = $('#'+$input.attr('data-toggle'));
        $target.slideToggle();
        if($input.find('.col-xs-2 i').attr('class')=="fa fa-chevron-down pull-right")
        {
             $input.find('.col-xs-2 i').removeClass('fa-chevron-down'); 
             $input.find('.col-xs-2 i').addClass('fa-chevron-up');
        }
       
       
    });
});

                

                $(document).ready(function(){
                   
                    $( document ).ready(function() {
    $.ajax({
          type:'GET',
          url: '/post/postcategory',
		  //dataType: 'json',
           
           contentType: false,
           processData: false,
           success: (response) => {
            //alert(JSON.stringify(response));
             $("#business_table").append('<tbody>');
			 $.each(response.data, function (key, val) {
			
			
                   
			});
            $("#business_table").append('</tbody>');
           },
           error: function(response){
              alert(JSON.stringify(response));
           }
       });
	});
                });
</script>
</body>
</html>