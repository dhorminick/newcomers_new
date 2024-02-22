<?php

    function secure_random_string($length) { 
        $random_string = ''; 
        for($i = 0; $i < $length; $i++) { 
            $number = random_int(0, 36);  
            $character = base_convert($number, 10, 36);
            $random_string .= $character; 
        } 
                
        return $random_string;
    }

    function getToArray($array){
		$getArray = [];

		$convertArray = explode("&", $array);
		for ($i=0; $i < count($convertArray); $i++) { 
			$keyValue = explode('=', $convertArray[$i]);
			$getArray[$keyValue [0]] = $keyValue [1];
		}

		return $getArray;
	}
    
    #get requests
	if (isset($_POST["insertUser"])) {
		include '../../inc/db.inc.php';

		function sanitize_Plus($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = strip_tags($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		$value = $_POST["insertUser"];
        $getArray = getToArray($value);
		
        $email = sanitize_Plus($getArray['email']);
        $email = str_replace("%40","@",$email);

        $date = date("Y-m-d");
        $query = "INSERT INTO newcomers_newsletter (email, reg_date) VALUES ('$email', '$date')";
        $sql = mysqli_query($con, $query);
        if($sql){
            $response = 'Email Address Added Successfully!!';
        }else{
            $response = 'Error Adding Email Address!!';
        }
		
		echo $response;
    }
?>