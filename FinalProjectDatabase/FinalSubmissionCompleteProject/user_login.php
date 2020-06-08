<?php
/*$l_email="'".$_POST['l_email']."'";
$l_password = "'".$_POST['l_password']."'";*/
$l_email=$_POST['l_email'];
$l_password = $_POST['l_password'];
session_start();

$con=mysqli_connect("localhost","root","","gopedal");


$sql ="SELECT * FROM customers WHERE email = '$l_email' AND password = '$l_password'" ;//* AND `password`='$l_password'";
$result= mysqli_query($con,$sql);
$count= mysqli_num_rows($result);
if($count==1)
{
	echo "Login success";
	//trying to remember
	$abc= "SELECT customer_id FROM customers WHERE email = '$l_email'";
	$xyz= mysqli_query($con,$abc);
	$hah= mysqli_num_rows($xyz);

	while($hah = $xyz->fetch_assoc())
	{
	    $_SESSION['user_id'] = $hah['customer_id'];	
    }
	//echo $_SESSION['user_id'];
	//this ends here
	$_SESSION['log']=1;
	header("Location: ../home.php?log in successful=".$count);

}
else
{
	echo $count;
	header("Location:index.php?err=".$count);
        die();
}


?>