<?php
session_start();
?>
<html>
<head>
<style>
body{
    background-image: url(bg1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
.ghost-button-transition {
  display: inline-block;
  width: 200px;
  padding: 8px;
  color: #fff;
  border: 2px solid #fff;
  text-align: center;
  outline: none;
  text-decoration: none;
  transition: background-color 0.2s ease-out,
              color 0.2s ease-out;
  position: absolute;
  left: 750px;
}
.ghost-button-transition:hover,
.ghost-button-transition:active {
  background-color: #fff;
  color: #000;
  transition: background-color 0.3s ease-in,
              color 0.3s ease-in;
}
</style>
</head>
<body>
<?php
	if(isset($_GET['ac']) && $_GET['ac'] == 'logout'){
		$_SESSION['user_info'] = null;
		unset($_SESSION['user_info']);
	}
?>
  <a href="login.php?ac=logout" style="margin-left:1200px;color:white;">Logout</a>
  <a class="ghost-button-transition"  href="viewHotels.php" style="top:120px;">View Restaurants</a>
  <a class="ghost-button-transition"  href="addHotel.php" style="top:180px;">Add New Restaurant</a>
  
 </body>
</html>
