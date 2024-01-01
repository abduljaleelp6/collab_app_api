<html>

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <title>COLLAB</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

 
  <link href="assets/img/fav2.jpg" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

 
 
  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>

<!-- jQuery -->

<style>
body{
  padding:10px;
  background:#fff;
}
.wrapper{
  width:98%;
}
@media(max-width:992px){
 .wrapper{
  width:100%;
} 
}
.panel-heading {
  padding: 0;
	border:0;
}
.panel-title>a, .panel-title>a:active{
	display:block;
	padding:15px;
  /*color:#555;*/
  
  font-size:16px;
  font-weight:bold;
	/*text-transform:uppercase;*/
	letter-spacing:1px;
  word-spacing:3px;
	text-decoration:none;
}
.panel-heading  a:before {
   font-family: 'Glyphicons Halflings';
   content: "\e114";
   float: right;
   transition: all 0.5s;
}
.panel-heading.active a:before {
	-webkit-transform: rotate(180deg);
	-moz-transform: rotate(180deg);
	transform: rotate(180deg);
} 

/*.panel-title {
     background-color: #6c9ecf !important;
     color:white;
}*/

</style>
</head>
<body>

<div class="wrapper center-block">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  
  <div class="panel panel-default">
    <div class="panel-heading active" role="tab" id="headingOne">
      <h4 class="panel-title">
        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <?php  echo $result[0]->{'question'}?>
        </a>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
      <div class="panel-body">
      <?php  echo $result[0]->{'answer'}?>
      
      <ul class="list-group">
  
      <li class="list-group-item">Advertisment</li>
      
      <li class="list-group-item">Latest Business</li>
      <li class="list-group-item">Business Activities</li>
      <li class="list-group-item">Category wise Business List</li>
      <li class="list-group-item">Product Explore</li>
  
  
     </ul>
   
     
      </div>
    </div>
  </div>
  <?php 
  $i=0;
  foreach($result as $value){
    if($i==0)
    {
      $i=1;
      continue;
    }
  $id=$value->{'faq_id'}
  ?>       
  <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?php echo $id?>">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $id?>" aria-expanded="false" aria-controls="collapse<?php  echo $id?>">
        <?php  echo $value->{'question'}?>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $id?>">
      <div class="panel-body">
      <?php  echo $value->{'answer'}?>
      </div>
    </div>
  </div>
<?php $i++;}?>
 

</div>
</div>
<script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script>
 

  $( document ).ready(function() {
   // alert()
    $('.panel-collapse').on('show.bs.collapse', function () {
   
    $(this).siblings('.panel-heading').addClass('active');
  });

  $('.panel-collapse').on('hide.bs.collapse', function () {
    $(this).siblings('.panel-heading').removeClass('active');
  });
});

</script>
  </body>
</html>