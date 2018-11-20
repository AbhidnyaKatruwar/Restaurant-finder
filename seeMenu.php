<?php
	include("config.php");
	session_start();
	
	if(isset($_POST['delete'])){
		$name = $_POST['hidden1'];
		$sql = "delete from fooditems where food_id = $name";
		$sql_result = mysqli_query($connection, $sql) or die ();
		header('Location:seeMenu.php');
	}
	if(isset($_POST['add'])){
		$id = $_SESSION['hotel_id'];
		$name = $_POST['new_item'];
		$add = $_POST['new_price'];
		$spe = $_POST['new_path'];
		$sql = "insert into fooditems(hotel_id, food_name, food_price,image) values($id,'$name',$add,'$spe')";
		$sql_result = mysqli_query($connection, $sql) or die ($sql);
		header('Location:seeMenu.php');
	}
	echo "
    <!DOCTYPE html>
    <html>
    <head>
	<meta charset=\"utf-8\">
  <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css\">
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
  <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js\"></script>
  <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js\"></script>
     <style>
    table, th, td {
    border: 1px solid black;
    }
    table{
    	opacity: 0.8;
    }
    body{
    margin : 0px;
    }
    
   #training {
    font-family: \"Trebuchet MS\", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

#training td, #training th {
    border: 1px solid #ddd;
    padding: 8px;
}
body{
    background-image: url(bg1.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
#training tr{background-color: #f2f2f2;}

#training tr:hover {background-color: #ddd;}

#training th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    
    background: orange;
}	
table {
    margin-left:auto; 
    margin-right:auto;
  }

    </style>
    
   </head>
    <body>
   <br>
   <br>
   <center><h2> <b>Menu</b></h2>
   <br>
    <table id=\"training\" style=\"width:900px\"><tr>
    <th>Food Item</th>
    <th>Price</th>
    <th>Image Path</th>
    <th></th>
    <th></th>
    
    </tr>";
	
	if(isset($_POST['hidden'])){
		$_SESSION['hotel_id'] = $_POST['hidden'];
	}	
    $query = "SELECT * FROM fooditems where hotel_id = ".$_SESSION['hotel_id'];
    $results=mysqli_query($connection, $query);
	if($results === false)
		die($query);
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
      echo "<form method='post'>";
      echo "<tr>";
      echo "<td>" . $row['food_name'] . "</td>";
	 echo "<td>" . $row['food_price'] ."</td>";
	  echo "<td>" . $row['image'] ."</td>";
      echo "<td style=\"display:none\">" . "<input type=hidden name=hidden1 value='" . $row['food_id'] . "' </td>";
      echo "<td>" . "<input formaction=\"seeMenu.php\" type=submit name=submit value='UPDATE'" . " </td>";
     echo "<td>" . "<input formaction=\"seeMenu.php\" type=submit name=delete value='DELETE'" . " </td>";
       echo "</tr>";
      echo "</form>";

    }
    echo "<form method='post'>";
     echo "<tr>";
    echo "<td>" . "<input type='text' name = 'new_item' value =''>"." </td>";
    echo "<td>" . "<input type='text' name = 'new_price' value =''>"." </td>";
    echo "<td>" . "<input type='text' name = 'new_path' value =''>"." </td>";
    echo "<td>" . "<input formaction=\"seeMenu.php\" type=submit name=add value='ADD'>" . " </td>";
     echo "<td> </td>";
    echo "</tr>";
     echo "</form>";
    
?>

