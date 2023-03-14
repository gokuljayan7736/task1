<html>
 <head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="hii.css"/>  
 </head>
 <header>
  <?php include("header.php")?>
 </header>
 <body>
<?php
$servername = "localhost";
$username = "gokul";
$password = "gokul";
$dbname = "gokul";

$conn = mysqli_connect($servername, $username, $password, $dbname);
session_start();
$a1=$_SESSION['usr'];
$sel=mysqli_query($conn,"select * from form where username='$a1'");
if(mysqli_num_rows($sel)>0)
{
 $r=mysqli_fetch_row($sel);
?><h2 class="result">Welcome<br><?php echo$r[1]; ?> </h2> <?php
}

?>
 </body>
 <footer>
  <?php include("footer.php");?>
 </footer>
</html> 
