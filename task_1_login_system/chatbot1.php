<?php
 $con=mysqli_connect("localhost","gokul","gokul","gokul");

 $getmsg=mysqli_real_escape_string($con,$_POST['name']);
 $sel="SELECT * FROM chatbot WHERE messages LIKE '$getmsg%'";
 if($getmsg=="h"){
 
 ?>Do you mean<?php $sell=mysqli_query($con,$sel);

  if(mysqli_num_rows($sell) > 0){


    
  while($r=mysqli_fetch_assoc($sell))
    {
     $result=$r['response'];
     echo "<br>$result ";
  }
}
}
else{
  

$sell=mysqli_query($con,$sel);

if(mysqli_num_rows($sell) > 0){
  $r=mysqli_fetch_assoc($sell);


  

   $result=$r['response'];
   echo$result;
}
else{
  echo"Sorry i didn't get you";
}
}

?>

