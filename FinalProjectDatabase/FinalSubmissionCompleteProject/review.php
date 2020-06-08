<?php
	session_start();

	echo "thanks for your time"."<br>";
	$cycle_code = $_SESSION['cycle_code'];
	echo $cycle_code."<br>";
	$cycle_rating = $_POST['cycle_rating'];
	$review = $_POST['review'];
	echo $cycle_rating."<br>";
	$user_id = $_SESSION['user_id'] ;

	$con=mysqli_connect("localhost","root","","gopedal");

	$qry = "INSERT into reviews
                VALUES (null,$cycle_code,$user_id,'$review',$cycle_rating);";
	$res = mysqli_query($con,$qry);

	$qry1 = "SELECT cycle_rating 
			FROM (SELECT cycle_id,AVG (rating) as cycle_rating FROM `reviews` 
			GROUP by cycle_id) as T
			WHERE cycle_id = '$cycle_code'";
	$res1 = mysqli_query($con,$qry1);
	while ($row = $res1->fetch_assoc()) {
		$avg_rating= $row['cycle_rating'];
	}


	$qry2 = "UPDATE `cycles` SET `rating` = $avg_rating WHERE `cycles`.`cycle_id` = $cycle_code";
	$res2 = mysqli_query($con,$qry2);
/*
	$qry1 = "SELECT * FROM customers WHERE  customer_id = $user_id";
	$res1 = mysqli_query($con,$qry1);
	$row =mysqli_num_rows($res1);
	while ($row = $res1->fetch_assoc()) {
		echo $row['first_name']." ".$row['last_name'];
	}*
	/*
	$qry1 = "UPDATE `review` SET `start_time` = now() WHERE  cycle_id = $cycle_code";
	$res1 = mysqli_query($con,$qry1);*/
?>
<form action = "station_cycle.php" method = "POST" >
		<input type = "submit" name = "back" value="Back" />
</form>