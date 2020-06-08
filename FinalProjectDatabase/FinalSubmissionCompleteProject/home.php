<!DOCTYPE html>
<html>
<body>


	

	<form action = "station_cycle.php" method = "POST" >
		<input type = "text" name = "home_search"  placeholder="Station name" />  <!-- search by station for cycle list-->
		<input type = "submit" name = "search" value="Search" />
		<?php
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

		?>
		
	</form>



<!--
	<form action = "renting.php" method = "POST" >
		<input type = "submit" name = "rent" value="Rent" />
	</form>
-->


	<form action = "index.php" method = "POST" >
		<input type = "submit" name = "logout" value="Log out" />
		<?php
		?>
	</form>




</body>
</html>

