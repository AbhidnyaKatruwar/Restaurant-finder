<HTML>
<HEAD>
<TITLE>Welcome to 24X7 Foodies.com!</TITLE>
<style type="text/css">
@import url(style.css);
   a:link {color: #ffffff}
   a:visited {color: #ffffff}
   a:hover {color: #ffffff}
   a:active {color: #ffffff}
</style>
</HEAD>
<BODY background="background1.png">
<?php include("header.php"); ?>
<FONT size="5" color="white">
<SECTION>
<MAIN>
<B><P>We are available only with the following restaurants.<BR> Please select any one:</P></B></FONT>

<TABLE>
<?php
$connect = mysqli_connect("localhost","root","root", "foodies");
$sql="SELECT hotel_id,hotel_name FROM restaurant";

if ($result=mysqli_query($connect,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
   echo "<TR><TD><FONT size=\"6\"  color=\"white\">";
   echo"<A HREF=\"order.php?id=".$row[0]."\" style=\"text-decoration: none\">".$row[1]."</FONT></TD></TR>";
    }
  // Free result set
  mysqli_free_result($result);
}
?>
</TABLE>
</SECTION>
</MAIN><BR><HR width="1000">
<div style="margin-top:220px">
<FONT size="2" color="white">
By continuing past this page, you agree to our Terms of Service, Cookie Policy, Privacy Policy and Content Policies. &copy 2018-2019 - 24x7 Foodies Media Pvt Ltd. All rights reserved.</FONT>
</div>
</BODY>
</HTML>
