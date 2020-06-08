<?php

	$ename = $_POST['fname'];
	echo $ename;
	$lname = $_POST['lname']
	

	$user = 'root';
	$pass = '';
	$db = 'hr';
	
	$db_connect = new mysqli('localhost',$user,$pass,$db) or die('unable to connect');
	echo 'done'."<br>";


/*
	$qry = "select * from employees where first_name = "."'".$ename."'";
	echo $qry." "."<br>";
	$res = $db_connect->query($qry) or die('bad query');
	echo $res->num_rows." "."<br>";

	while($row = $res->fetch_assoc()) {
        echo $row["first_name"].' '.$row["last_name"].' '.$row["salary"]."<br>";
        if (($row['first_name']==$ename)&& ($row['last_name']==$lname)) {
        	# code...
        }
    }
 */   
    $qry = "select * from employees where first_name = "."'".$ename."'" AND ."last_name = "."'".$lname."'";
	echo $qry." "."<br>";
	$res = $db_connect->query($qry) or die('bad query');
	echo $res->num_rows." "."<br>";

	while($row = $res->fetch_assoc()) {
        echo $row["first_name"].' '.$row["last_name"].' '.$row["salary"]."<br>";
        if (($row['first_name']==$ename)&& ($row['last_name']==$lname)) {
        	
        }
    }


?>
    <<!DOCTYPE html>
    <html>
    <body>
	    <form action = "formphp.php" method = "POST" >
		
		<input type = "submit" value="back" />
	</form>
    </body>
    </html>>


