<!-- Main Sidebar Container -->
<?php 
 $utype="admin";
   if(isset($_GET['utype']))
  {
	  
	   if($_GET['utype']=="usr")
	  {
		  $utype="usr";
	  }
	  else if($_GET['utype']=="admin")
	  {
		  $utype="admin";
	  }
  }
//include("api_link.php");
?>
