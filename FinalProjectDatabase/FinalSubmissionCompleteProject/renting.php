<?php
session_start();
//problems starting
if(empty($_POST['cycle_code']) && !isset($_POST['start']) && !isset($_POST['end']))
	{
		$_SESSION['flag']=1;
		header("Location: ../station_cycle.php?enter_a_cycle_code=");
	}
	// problem solving

if(isset($_POST['cycle_code']))
{
	echo "renting cycle";
	$cycle_code = $_POST['cycle_code'];
	$_SESSION['cycle_code'] = $cycle_code;


	$con1=mysqli_connect("localhost","root","","gopedal");

	$qry2 = "UPDATE `rentals` SET `start_time` = NULL WHERE  cycle_id = $cycle_code";
	$res2 = mysqli_query($con1,$qry2);

	$qry3 = "UPDATE `rentals` SET `end_time` = NULL WHERE  cycle_id = $cycle_code";
	$res3 = mysqli_query($con1,$qry3);
	//echo "<br>".$id;
}
if(isset($_POST['start']))
{
	echo "starting ride";
	$cycle_code = $_SESSION['cycle_code'];
	echo $cycle_code;
	//here by user_id we can add users details of ride.or for every ride we can use users detail....
	$user_id = $_SESSION['user_id'] ;

	$con=mysqli_connect("localhost","root","","gopedal");

	$qry = "UPDATE `cycles` SET `availability` = b'0' WHERE `cycles`.`cycle_id` = $cycle_code";
	$res = mysqli_query($con,$qry);

	$qry1 = "UPDATE `rentals` SET `start_time` = now() WHERE  cycle_id = $cycle_code";
	$res1 = mysqli_query($con,$qry1);
/*
	$qry = "INSERT into customers
                VALUES (null,$u_fname,$u_lname,$u_dob,$u_email,$u_phone,$u_address,null,$u_nid,$u_password);";

        $res = mysqli_query($db_connect,$qry);
        header("Location: ../index.php?successfulsignup");


	//$con1=mysqli_connect("localhost","root","","gopedal");
	
*/
	//for submitting station 
		$db_connect1 = mysqli_connect('localhost','root','','gopedal');
			echo "<br><br>Station ID-----Station name----------Area";
			echo "<br>---------------------------------------------------<br>";
			$qry1 = "SELECT * FROM stations as s JOIN addresses a ON (s.address_id=a.address_id) WHERE 1";
			$res = mysqli_query($db_connect1,$qry1);
			$row = mysqli_num_rows($res);
			while($row = $res->fetch_assoc())
			{
	        	echo $row["station_id"]."----------------".$row["name"]."---------".$row["area"]."<br>";  	
        	}

}
if(isset($_POST['end']))
{
	echo "ending ride";
	
	$cycle_code = $_SESSION['cycle_code'];
	$user_id = $_SESSION['user_id'] ;

	$con=mysqli_connect("localhost","root","","gopedal");

	$qry = "UPDATE `cycles` SET `availability` = b'1' WHERE `cycles`.`cycle_id` = $cycle_code";
	$res = mysqli_query($con,$qry);

	$qry1 = "UPDATE `rentals` SET `end_time` = now() WHERE  cycle_id = $cycle_code";
	$res1 = mysqli_query($con,$qry1);


	//fare calculation



	$qry2= "SELECT fare_rate FROM cycles WHERE cycle_id = '$cycle_code'";
	$res2= mysqli_query($con,$qry2);
	$row= mysqli_num_rows($res2);

	while($row = $res2->fetch_assoc())
	{
	    $_SESSION['fare_rate'] = $row['fare_rate'];
	    $fare_rate = $row['fare_rate'];	
    }

    $qry3= "SELECT MINUTE((SELECT timediff(end_time,start_time) FROM rentals WHERE cycle_id = '$cycle_code'))as minutes";
	$res3= mysqli_query($con,$qry3);
	$row1= mysqli_num_rows($res3);

	while($row1 = $res3->fetch_assoc())
	{
	    $min = $row1['minutes'];	
    }
    
    $qry4= "SELECT HOUR((SELECT timediff(end_time,start_time) FROM rentals WHERE cycle_id = '$cycle_code'))as hours";
	$res4= mysqli_query($con,$qry4);
	$row2= mysqli_num_rows($res4);

	while($row2 = $res4->fetch_assoc())
	{
	    $hour = $row2['hours'];	
    }
    echo "<br>Total Riding time : ".$hour."hour -".$min."- minutes"."<br>";
    echo "Fare rate :".$fare_rate."TK per hour <br>";
    $fare_count =($min+($hour * 60)) *($fare_rate / 60);
    echo "Total Fare : ".$fare_count."<br>";





    //fare calculation ended

    //station id  update
    $station_to_submit = $_POST['station_to_submit'];
    $qry5 = "UPDATE `rentals` SET `station_id` = $station_to_submit WHERE  cycle_id = $cycle_code";
	$res5 = mysqli_query($con,$qry5);

}



?>
<form action = "renting.php" method = "POST" >
	<input type = "submit" name = "start" value="Start Ride" />
</form>

<form action = "renting.php" method = "POST" >
	<input type="text" name="station_to_submit" placeholder="Station ID [Where to submit]"/>
	<input type = "submit" name = "end" value="End Ride" />
</form>

<form action = "review.php" method = "POST" >
		<input type = "text" name = "review" placeholder="Give us your feedback"  />
<!--		<input type = "submit" name = "submit" />
</form>
<form action = "review.php" method = "POST" > -->
		<input type = "text" name = "cycle_rating" placeholder="Rate the cycle"  />
		<input type = "submit" name = "submit"  />
</form>

<form action = "station_cycle.php" method = "POST" >
		<input type = "submit" name = "back" value="Back" />
</form>