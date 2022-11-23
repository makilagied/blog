<?php
 session_start();
 $db=mysqli_connect("localhost","root","","kim_blog");
if($db == false){
    die("Couldn't connect". mysqli_connect_error());
}

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $mail = mysqli_real_escape_string($db,$_POST['mail']);
      $pwd = mysqli_real_escape_string($db,$_POST['pwd']); 
      
      $sql = "SELECT Username FROM administrator WHERE Passwords = '$pwd' and Email = '$mail'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //   $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count > 0) {
        //  session_register("Username");
         $_SESSION['Username'] = $username;
         
         header("location: ../posts.html");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
