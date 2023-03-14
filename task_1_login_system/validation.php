<?php

$nameErr = $emailErr = $countryErr = $phoneErr = $usernameErr = $passwordErr = "";
$a !="" && $b !="" && $c !="" && $d !="" && $e !="" && $f != "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
//name validation
  if (empty($_POST['a'])) {
  $nameErr = "*Name is required";
  }
  else {
  // $a = test_input($_POST['a']);
  }
 //email validation 
  $email = test_input($_POST['b']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "*Invalid email format";
  }
  //country validation
  if(empty($_POST['c'])) {
  $countryErr = "*Country name is required";
  }
  else {
  $c = test_input($_POST['c']);
  }
  //phonenumber validation
  $d=test_input($_POST['d']);
  if(preg_match('/^[0-9]{10}+$/', $d))
  {
    $phoneErr="";
  }
  else{
    $phoneErr="*Invalid phonenumber";
  }
  //password validation
  $f=test_input($_POST['f']);
  if(!preg_match('/^(?=.*\d)(?=.*[@#\-_$%^&+=§!\?])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z@#\-_$%^&+=§!\?]{4,20}$/',$f)){
    $passwordErr='*at least one lowercase char<br>    
    *at least one uppercase char<br>
    *at least one digit<br>
    *at least one special sign ';
  }
  else {
   false;
  }
  //username validation 
  $e=test_input($_POST['e']);
  $con=mysqli_connect("localhost","gokul","gokul","gokul");
  $sql=mysqli_query($con,"select * from form where username='$e'");
  if(mysqli_num_rows($sql)>0) {
    $usernameErr="Username exists";
  }
  else "";

}

function test_input($data)
{
  $data = trim($data);
//   $data = stripslashes($data);
//   $data = htmlspecialchars($data);
  return $data;
} 
?>
<html>
 <head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="form1.css"/>
 </head>
 <header>
  <?php include("header.php")?>
 </header>
 <body>
  <!-- //register -->
  <div class="form">
   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form1" >
    <h1 class=form-head>Register</h1>
    Name:<input type="text" name="a"  value="<?php echo$_POST['a'];?>"><br><br>
     <span class="error"><?php echo"$nameErr";?></span><br>
    Email Address:<input type="email" name="b"value="<?php echo$_POST['b'];?>"><br><br>
     <span class="error"><?php echo"$emailErr";?></span><br>
    Country:<input type="text" name="c" value="<?php echo$_POST['c'];?>"><br><br>
     <span class="error"><?php echo"$countryErr";?></span><br>
    Phone:<input type="number" name="d" value="<?php echo$_POST['d'];?>"><br><br>
     <span class="error"><?php echo"$phoneErr";?></span><br>
    UserName:<input type="email" name="e" value="<?php echo$_POST['e'];?>"><br><br>
     <span class="error"><?php echo"$usernameErr";?></span><br>
    Password:<input type="password" name="f" value="<?php echo$_POST['f'];?>" ><br><br>
     <span class="error"><?php echo"$passwordErr";?></span><br>
     <input type="submit" value="Create Account"  name="g"><br><br>
   </form>
     <!-- signin -->
   <form method="post">
    <h1 class="form-head">SignIn</h1>
    Username:<input type="email" name="a1"><br><br>
    Password:<input type="password" name="b1"><br><br>
    <input type="submit" value="login" name="c1">
   </form>
<?php
  $con=mysqli_connect("localhost","gokul","gokul","gokul");
  if(isset($_POST['c1']))
  {
  $a1=$_POST['a1'];
  $b1=$_POST['b1'];
  $sel=mysqli_query($con,"select name from form where username='$a1' and password='$b1'");
  if(mysqli_num_rows($sel)>0)
  {
   session_start();
   $_SESSION['usr']= mysqli_fetch_row($sel);
   header("location:hii.php");
  }
  else
  {
   echo"invalid username/password";
  }

}


?>
  </div>
  
 </body>
 <footer>
  <?php include("footer.php")?>
 </footer>
</html>
<?php
  $servername = "localhost";
  $username = "gokul";
  $password = "gokul";
  $dbname = "gokul";
  $conn = mysqli_connect($servername, $username, $password, $dbname);



  if(isset($_POST['g']))
  {
  $a=$_POST['a'];
  $b=$_POST['b'];
  $c=$_POST['c'];
  $d=$_POST['d'];
  $e=$_POST['e'];
  $f=$_POST['f'];
  if(!empty($_POST["a"]) && !empty($_POST["b"]) && !empty($_POST["c"]) && !empty($_POST["d"]) && !empty($_POST["e"]) && !empty($_POST["f"]))
 {
  $ins = "INSERT INTO form (name,email,country,phone,username,password) VALUES ('$a','$b','$c','$d','$e','$f')";
   {
  $inss=mysqli_query($conn,$ins);
  if($inss==1)
  {
  echo"inserted";
  }
  else
  {
   echo "Error" . $sql . "<br/>" . $conn->error;
  }
  }
  }
}
?>