<?php
    $con = mysqli_connect("localhost","root","","newcomers");
	if (mysqli_connect_errno()){
	    die("Connection failed: " . $con->connect_error); 
	}else{}
?>