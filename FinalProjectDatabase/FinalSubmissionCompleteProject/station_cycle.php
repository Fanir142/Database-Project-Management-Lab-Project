<!DOCTYPE html>
<html>
<body>


	<?php

	session_start();

	if(isset($_POST['home_search']))
	{
		$station_name = $_POST['home_search'];
		$_SESSION["home_search"] = $station_name;
		//echo "<br>".$station_name."<br>";
	}
	else
	{
		$station_name = $_SESSION["home_search"];
	}
	if(empty($_POST['home_search']) && empty($_POST['back']) )// change
	{
		if($_SESSION['flag']== 0)
		{
			header("Location: ../home.php?enter_a_station_name=");
		}
		else
		{
			$_SESSION['flag'] = 0;
		}
		
	}
	else if(isset($_POST['back'])||empty($_POST['cycle_code']))
	{
		$station_name = $_SESSION["home_search"];
	}

	echo "ki vaya cycle lagbe?<br>";
	echo "Cycle Id - Color - Fare Rate - Rating";

/*
	//$station_name = "'".$_POST['home_search']."'";
	$station_name = $_POST['home_search'];
	//echo $station_name;
	$_SESSION["home_search"] = $station_name;
																		*/

	$con1=mysqli_connect("localhost","root","","gopedal");


	/*$sql1 = "SELECT * FROM rentals as r JOIN cycles as c ON (r.cycle_id=c.cycle_id) JOIN stations as s ON(r.station_id=s.station_id)
		WHERE name=".$station_name;*/

	/*$sql1 = "SELECT * 
			FROM rentals as r JOIN cycles as c ON (r.cycle_id=c.cycle_id) 
			JOIN stations as s ON(r.station_id=s.station_id)
			WHERE name = '$station_name' AND availability = b'1' ";*/
	$sql1 = "SELECT * 
			FROM rentals as r JOIN cycles as c ON (r.cycle_id=c.cycle_id) 
			JOIN stations as s ON(r.station_id=s.station_id)
			WHERE name = '$station_name' AND availability = b'1' 
			ORDER BY rating DESC";		

	$res1= mysqli_query($con1,$sql1);
	$row1= mysqli_num_rows($res1);
	//echo "check =".$row1;
	echo "<br>------------------------------------------<br>";
	while($row1 = $res1->fetch_assoc())
	{
	    echo $row1["cycle_id"]."------".$row1["color"]."------".$row1["fare_rate"]."-----".$row1["rating"]."<br>";	
    }
/* start
    echo $_SESSION['user_id'];
end*/
    
?>

<form action = "renting.php" method = "POST" >
		<input type = "text" name = "cycle_code"  placeholder="Cycle Id" />
		<input type = "submit" name = "rent" value="Rent" />
</form>  
<form action = "home.php" method = "POST" >
		<input type = "submit" name = "back" value="Back" />
</form>

</body>
</html>
