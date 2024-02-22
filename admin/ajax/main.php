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

    function in_array_custom($needle, $haystack, $strict = true){
        foreach ($haystack as $items){
            if (($strict ? $items === $needle : $items == $needle) || (is_array($items) && in_array_custom($needle, $items, $strict))){
                return true;
            }
        }
        
        return false;
    }

    function addParticipant_Events($id, $con, $email, $name){
        $query="SELECT * FROM newcomers_events WHERE event_id = '$id' LIMIT 1";
		$result=$con->query($query);
		if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $participants = $row['participants'];
            $e_participants = unserialize($participants);
            $randId = secure_random_string(7);
            $regdate = date("Y-m-d");
            $newParticipants = array(array(
                'id' => $randId, 
                'email' => $email,
                'name' => $name,
                'date' => $regdate 
            ));
            $e_participants = array_merge($e_participants, $newParticipants);
            $e_participants = serialize($e_participants);

            #update database
            $updateEvent = "UPDATE newcomers_events SET participants = '$e_participants' WHERE event_id = '$id'";
            $updateEventResult = $con->query($updateEvent);
            if ($updateEventResult) {
                $response = 'true';
            }else{
                $response = 'false';
            }
        }else{
            $response = 'error_id';
        }

        return $response;
    }
    function delParticipant_Events($e, $id, $con){
        $query="SELECT * FROM newcomers_events WHERE event_id = '$e' LIMIT 1";
		$result=$con->query($query);
		if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $participants = $row['participants'];
            $e_participants = unserialize($participants);
            $user_count = count($e_participants);

            $isInArray = in_array_custom($id, $e_participants) ? 'found' : 'notfound';
            if($isInArray === 'found'){
                for ($rowArray = 0; $rowArray < $user_count; $rowArray++) {
                    if($e_participants[$rowArray]['id'] == $id){
                        $found = true;
                        $rowNumber = $rowArray;
                    }
                }

                if($found && $found == true){
                    unset($e_participants[$rowNumber]);
                    $e_participants = array_values($e_participants);
                    $e_participants = serialize($e_participants);

                    #update database
                    $updateEvent = "UPDATE newcomers_events SET participants = '$e_participants' WHERE event_id = '$e'";
                    $updateEventResult = $con->query($updateEvent);
                    if ($updateEventResult) {
                        $response = 'true';
                    }else{
                        $response = 'false';
                    }
                }else{
                    $response = 'no_user_1';
                }
            }else{
                $response = 'no_user_2';
            }            
        }else{
            $response = 'error_id';
        }

        return $response;
    }
    function addParticipant_Single($email, $id, $con){
        #verify event
        $query="SELECT * FROM newcomers_events WHERE event_id = '$id' LIMIT 1";
		$result=$con->query($query);
		if ($result->num_rows > 0) {
            #add user
            $query="SELECT * FROM newcomers_event_participants WHERE email = '$email' LIMIT 1";
            $result=$con->query($query);
            if ($result->num_rows > 0) {
                $response = 'registered';
            }else{
                #add user
                $date = date("Y-m-d");
                $query = "INSERT INTO newcomers_event_participants (event_id, email, reg_date) VALUES ('$id', '$email', '$date')";
                $sql = mysqli_query($con, $query);
                if($sql){
                    $response = 'true';
                }else{
                    $response = 'false';
                }
            }
		}else{
            $response = 'error_id';
		}

        
		return $response;
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
		
        $e_id = sanitize_Plus($getArray['e_id']);
        $participant_name = sanitize_Plus($getArray['participant_name']);
        $participant_email = sanitize_Plus($getArray['participant_email']);
        $participant_email = str_replace("%40","@",$participant_email);
        $participant_name = str_replace("+"," ",$participant_name);
        
        $response = addParticipant_Events($e_id, $con, $participant_email, $participant_name);
        switch ($response) {
            case 'true':
                $response = '<span><i class="fas fa-check-double"></i> Participant Added Successfully!!</span>';
                break;
            case 'false':
                $response = '<span><i class="far fa-times-circle"></i> Error 502: Error Adding Participant!!</span>';
                break;
            case 'error_id':
                $response = '<span><i class="far fa-times-circle"></i> Error 402: Event ID Does Not Exist!!</span>';
                break;
            default:
                $response = '<span><i class="far fa-times-circle"></i> Error</span>';
                break;
        }
		
		
		echo $response;
    }

    if (isset($_POST["delUser"])) {
		include '../../inc/db.inc.php';

		function sanitize_Plus($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = strip_tags($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
		$value = $_POST["delUser"];
        $getArray = getToArray($value);
		
        $e_id = sanitize_Plus($getArray['event']);
		$u_id = sanitize_Plus($getArray['user']);
        
        $response = delParticipant_Events($e_id, $u_id, $con);
        switch ($response) {
            case 'true':
                $response = 'Participant Deleted Successfully!!';
                break;
            case 'false':
                $response = 'Error 502: Error Deleting Participant!!';
                break;
            case 'no_user_1':
                $response = 'Error 402: Participant Not Registered For Event!!';
                break;
            case 'no_user_2':
                $response = 'Error 402: Participant Not Registered For Event 2!!';
                break;
            case 'error_id':
                $response = 'Error 402: Participant Does Not Exist!!';
                break;
            default:
                $response = 'Error';
                break;
        }
		
		echo $response;
    }
?>