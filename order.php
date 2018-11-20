<?php 
include 'config.php';
session_start();
if (isset($_POST['submit'])){
	if(!empty($_SESSION['user_info'])) {
		$qty1=$_POST['qty1'];
		$qty2=$_POST['qty2'];
		$qty3=$_POST['qty3'];
		$qty4=$_POST['qty4'];
		$qty5=$_POST['qty5'];
		$qty6=$_POST['qty6'];
		$qty7=$_POST['qty7'];
		$qty8=$_POST['qty8'];
		$qty9=$_POST['qty9'];
		$user_info=$_SESSION['user_info'];
		$sql = "select * from fooditems where hotel_id = ".$_SESSION['hotel_id']."";
		$result = mysqli_query($connection, $sql);
		$x = 1;
		
		$sum = 0;
		$msg = "Order placed successfully\n\n";
		while($row = mysqli_fetch_row($result)) {
			if($_POST['qty'.$x] != 0)
				$msg = $msg.$row[2]." :".$_POST['qty'.$x]*$row[3]."\n";
			$sum = $sum + $row[3] * $_POST['qty'.$x];
			$x++;
		}
		$msg = $msg."\nTotal: ".$sum."\n\n";
		$msg= $msg."Please make the payment by cash on successful delivery\nEnjoy your food!";
		$connect = mysqli_connect("localhost","root","root", "foodies");
		$sql1="INSERT INTO orders(`email`, `qty1`, `qty2`, `qty3`, `qty4`, `qty5`, `qty6`, `qty7`, `qty8`, `qty9`)VALUES('$user_info',$qty1,$qty2,$qty3,$qty4,$qty5,$qty6,$qty7,$qty8,$qty9);";
		if(mysqli_query($connect, $sql1))
			$_SESSION['bill'] = nl2br($msg);
			header("location:bill.php");
		
	}
	else
		echo "<script type='text/javascript'>alert('Please login');</script>";
}
?>
<html>
<head>
<title>Order</title>
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
  font{color:white}
img{width:300; height:200;}
table{border-color:white;height:90%;}
img{border-color:white}
body{no-repeat center center fixed; 
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;}
</style>
<script type="text/javascript">
	function subtractQty(qty){
		if(qty.value - 1 < 0)
			return;
	else
	qty.value--;
	}
	function chk()
	{
		var qty1=document.getElementById("qty1");
		var qty2=document.getElementById("qty2");
		var qty3=document.getElementById("qty3");
		var qty4=document.getElementById("qty4");
		var qty5=document.getElementById("qty5");
		var qty6=document.getElementById("qty6");
		var qty7=document.getElementById("qty7");
		var qty8=document.getElementById("qty8");
		var qty9=document.getElementById("qty9");
		if((qty1.value=='' && qty2.value=='' && qty3.value=='' && qty4.value=='' &&qty5.value=='' && qty6.value=='' && qty7.value=='' && qty8.value=='' &&qty9.value=='')||(qty1.value=='0' && qty2.value=='0' && qty3.value=='0' && qty4.value=='0' && qty5.value=='0' && qty6.value=='0' && qty7.value=='0' && qty8.value=='0' && qty9.value=='0' ))
		{
			alert("Please select atleast 1 item");
			return false;
		}
		return true;	
	}
</script>
</head>
<body background="bg1.jpg">
<FONT size="4" color="white">
<NAV align="right">
<A HREF="index.php">Home</A>&nbsp&nbsp&nbsp
<A HREF="help.php">Help</A>&nbsp&nbsp&nbsp
<?php  
if(isset($_SESSION['user_info']))
	echo 'Welcome <A HREF="login.php"> '.$_SESSION['user_info'].'</a>';
else
	echo '<A HREF="register.php">Login/Register</A>';

?>
</FONT></NAV>
<form action="order.php" name="orderform" method="post">
<table cellspacing="5" cellpadding="2" align="center">
<caption><font size="5"><U>ORDER HERE</U></font></caption>
<?php
$_SESSION['hotel_id'] = $_GET['id'];
$sql = "select * from fooditems where hotel_id =".$_GET['id']."";
if ($result=mysqli_query($connection,$sql))
  {
  // Fetch one and one row
  $i = 1;
  $row_count = ceil(mysqli_num_rows($result) / (float)3);;
  while ($row_count--)
    {	echo"<tr>";
    $count = 3;
    	while($count--){
    	$row=mysqli_fetch_row($result);
    	if($row) { 
	echo "<td><img src=\"".$row[4]."\" width=\"300\" height=\"200\" border=\"5\"><br/>";
	echo "<font size=\"4\">".$row[2]."</font>";
	echo "&nbsp;&nbsp;<input type='text' value = 0 name='qty".$i."' id='qty".$i."' size=\"1\" maxlength=\"2\" class=\"qty\" style=\"width: 25px;\"/>
			<input type='button' name='add' onclick='javascript: document.getElementById(\"qty".$i."\").value++;' value='+'/>
			<input type='button' name='subtract' onclick='javascript: subtractQty(qty".$i.");' value='-'/>
<font size=\"4\">Rs.".$row[3]."</font>
</td>";
	$i++;
	}
     }
     echo "</tr>";
   }
  }
?>
<tr></tr><tr></tr><tr></tr><tr></tr><tr><td colspan="3"><input type="submit" name="submit" value="Order now!!!"  class="button" onclick="return chk()"></input></td></tr>
</table></form>
</body>
</html>
