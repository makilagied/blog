<?
session_start();

$connection=mysqli_connect("localhost","root","","kim_blog");
if($connection == false){
    die("Couldn't connect". mysqli_connect_error());
}
if(isset($_POST['submit'])) {
  $mail=$_POST["mail"];
  $password=$_POST["pwd"];
  $query = "SELECT * FROM administrator WHERE Email='$mail' AND Password='$password'";
		$run = mysqli_query($connection,$query);
		if (mysqli_num_rows($run)>0) {
			$_SESSION['mail'] = $mail;
			header('location: ../posts.html');
		}else{
      $_SESSION['error'] = "INVALID CREDENTIALS.";
			header('location: ../login.php');
		}

  echo $result;
}

?>