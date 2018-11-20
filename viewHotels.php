<?php
	include("config.php");
	session_start();
	if(isset($_POST['delete'])){
		$name = $_POST['hidden'];
		$sql = "delete from restaurant where hotel_id = $name";
		$sql_result = mysqli_query($connection, $sql) or die ($sql);
		header('Location:viewHotels.php');
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
   <center><h2> <b>Restaurants</b></h2>
   <br>
    <table id=\"training\" style=\"width:900px\"><tr>
	<th>Restaurant ID</th>
    <th>Restaurant name</th>
    <th>Address</th>
    <th>Speciality</th>
    <th></th>
    <th></th>
    
    </tr>";
	
    $query = "SELECT * FROM restaurant";
    $results=mysqli_query($connection, $query);
	if($results === false)
		die("Query $query returned false!");
    while ($row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
      echo "<form method='post'>";
      echo "<tr>";
      echo "<td>" . $row['hotel_id'] ."</td>";
      echo "<td>" . $row['hotel_name'] . "</td>";
	 echo "<td>" . $row['address'] ."</td>";
      echo "<td>" . $row['speciality'] . "</td>";
	  
      echo "<td style=\"display:none\">" . "<input type=hidden name=hidden value='" . $row['hotel_id'] . "' </td>";
      echo "<td>" . "<input formaction=\"seeMenu.php\" type=submit name=submit value='Menu'" . " </td>";
      echo "<td>" . "<input formaction=\"viewHotels.php\" type=submit name=delete value='Delete'" . " </td>";
     
      echo "</tr>";
      echo "</form>";

    }
?>

