<?php
session_start();
error_reporting(0);
include("config.php");
$error = '';
if(isset($_POST['is_login'])){
	$name = $_SESSION['hotel_id'];
	$add = $_POST['address'];
	$spe = $_POST['speciality'];
	$sql = "insert into owner(hotel_id, owner_email, owner_password) values($name,'$add','$spe')";
	$sql_result = mysqli_query($connection, $sql) or die ('request "Could not execute SQL query" '.$sql);
	//echo "<script type='text/javascript'>alert('Restaurant added successfully');</script>";
	header('Location:adminPage.php');
}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/main.css">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,500' rel='stylesheet' type='text/css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
        <script src="js/jquery-1.8.2.min.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/main.js"></script>
		<style type="text/css">
		a:link {color: #ffffff}
		a:visited {color: #ffffff}
		a:hover {color: #ffffff}
		a:active {color: #ffffff}
		</style>
    </head>
<form id="login-form" class="login-form" name="form1" method="post" action="addOwner.php">
	    	<input type="hidden" name="is_login" value="1">
	        <div class="h1">Add Owner</div>
	        <div id="form-content">
	           <div class="group">
	                <label for="address">Owner's Email</label>
	                <div><input id="address" name="address" class="form-control required" placeholder="Address"></div>
	            </div>
	            <div class="group">
	                <label for="speciality">Owner's Password</label>
	                <div><input id="speciality" name="speciality" class="form-control required" placeholder="speciality"></div>
	            </div>
	            <?php if($error) { ?>
	                <em>
						<label class="err" for="password" generated="true" style="display: block;"><?php echo $error ?></label>
					</em>
				<?php } ?>
	            <div class="group submit">
	                <label class="empty"></label>
	                <div><input name="submit" type="submit" value="Submit"/></div>
	            </div>
	        </div>
	        <div id="form-loading" class="hide"><i class="fa fa-circle-o-notch fa-spin"></i></div>
	    </form>
	   </body>
	   <html>
