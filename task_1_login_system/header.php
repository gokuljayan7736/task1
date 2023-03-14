<html>
 <head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="header1.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
 </head>
 <body>
  <header>
   <div class="nav-bar">
    <a class="logo" href="home.php">
     <img src="images/novartis_logo_pos_rgb.svg"/>
    </a>
    <div class="top-button">
     <div class="top-search">
      <ul class="search">
       <li class="search-button">
        <i class="fa-solid fa-magnifying-glass"></i>
        <span class="btn--1">Search</span>
       </li>
      </ul>
      <ul class="search">
       <li class="global-button">
        <i class="fa-solid fa-globe"></i>
        <span class="btn--2">Global |</span>
        <span class="btn--3">en
         <i class="fa-solid fa-sort-down"></i>
        </span>
       </li>
      </ul>  
      <ul class="search">
       <li class="bar-button">
        <i class="fa-solid fa-bars"></i>
        <span class="btn">Menu</span>
       </li>
      </ul>
      <ul class="search">
       <li class="bar-button">
       
        <?php
       session_start();

     $con=mysqli_connect("localhost","gokul","gokul","gokul");
    //    $a1=$_SESSION['usr'];

        if(empty($_SESSION['usr']))
        
        {
            ?><a href="validation.php"  class="btn--1">Register/Login</a> <?php
          
        }        
       else
           {

        //     $con=mysqli_connect("localhost","gokul","gokul","gokul");
        //     session_start();
        //     $a1=$_SESSION['usr'];
        //     $sel=mysqli_query($con,"select * from form where username='$a1'");
        //     //  if(mysqli_num_rows($sel)>0) 
            
        //      $r=mysqli_fetch_row($sel);
        //  echo$r[1];
         ?> <a class="logout" href="logout.php"><?php echo(reset($_SESSION['usr'])) ?></a><a class="logout" href="logout.php"> Log Out</a><?php
  
          
           } 
          
        
        ?>
        <!-- <a href="validation.php" name="ab" class="btn--1">Register/Login</a>  -->
       </li>
      </ul>
     </div>
 
   </div>
  </header>
 </body>
</html>