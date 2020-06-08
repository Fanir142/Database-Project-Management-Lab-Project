<?php
	    //trying to insert data into the database
	/*include_once("connect.php");*///using this command is right
	$user = 'root';
    $pass = '';
    $db = 'hr';
    
    $db_connect = mysqli_connect('localhost',$user,$pass,$db);
    echo 'done';
    $fid = $_POST['fid'];
    echo $fid;
    $fname = "'".$_POST['fname']."'";
    echo $fname." ";
    $fage = $_POST['fage'];
    echo $fage;
    $femail ="'".$_POST['femail']."'";
    echo $femail." ";

    $qry = "INSERT into tomato
			VALUES ($fid,$fname,$fage,$femail);";

    $res = mysqli_query($db_connect,$qry);
    echo  "insertion seccessfull\n";

?>