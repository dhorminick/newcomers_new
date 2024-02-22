<?php
    $site = '| New Comers Union';
    $regMailSender = 'info@newcomersunion.com';
    $siteMainPhone = '+000-1111-222';
    $siteMainEmail = 'contact@newcomersunion.com';
    $to_contactus = 'info@newcomersunion.com';

    $page_fb = 'https://facebook.com/newcomersunion';
    $page_ig = 'https://instagram.com/newcomersunion';
    $page_x = 'https://twitter.com/newcomersunion';
    $page_ln = 'https://linkedin.com/newcomersunion';

    function secure_random_string($length) { 
        $random_string = ''; 
        for($i = 0; $i < $length; $i++) { 
            $number = random_int(0, 36);  
            $character = base_convert($number, 10, 36);
            $random_string .= $character; 
        } 
                
        return $random_string;
    }

    function truncateStr($string, $length, $dots = "...") {
        return (strlen($string) > $length) ? substr($string, 0, $length - strlen($dots)) . $dots : $string;
    }

    function cleanData($data, $num){
        $data = str_replace( '%p%' , ' ', $data );
        $data = str_replace( '%/p%', ' ', $data);
        $data = str_replace( '%b%' , ' ', $data );
        $data = str_replace( '%/b%', ' ', $data );
        $data = str_replace( '%u%' , ' ', $data );
        $data = str_replace( '%/u%', ' ', $data );
        $data = str_replace( '%\\%', ' ', $data );
        $data = str_replace( 'font-size' , ' ', $data );
        $data = str_replace( 'font-family' , ' ', $data );
        $data = str_replace( 'h3' , ' ', $data );
        $data = str_replace( 'h1' , ' ', $data );
        $data = str_replace( 'h2' , ' ', $data );

        $data = str_replace( '<p>' , ' ', $data );
        $data = str_replace( '</p>', ' ', $data);
        $data = str_replace( '<b>' , ' ', $data );
        $data = str_replace( '</b>', ' ', $data );
        $data = str_replace( '<u>' , ' ', $data );
        $data = str_replace( '</u>', ' ', $data );
        $data = str_replace( '%\\%', ' ', $data );
        $data = str_replace( '<li' , ' ', $data );

        $data = wordwrap($data, $num);
        return $data;
    }

    function eventName($data){
        $data = trim($data);
        $data = strtolower($data);
        $data = trim($data);
        $data = str_replace(" ", "-", $data);
        return $data;
    }

    function weirdlyEncode($data){
        $data = md5(crc32(md5(crc32(md5(crc32(md5($data)))))));
        return $data;
    }

    function sanitizePlus($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = strip_tags($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function dataExists($data, $returnError, $returnArray, $errorCountArray){
        if ($data != null || $data != '' || !$data) {
            return array_push($returnArray, $returnError);
            // $errorCountArray = true;
        }
    }

    function errorExists($data, $errorCounter){
        if ($data == null || $data == '' || !$data) {
            $errorCounter = true;
            return $errorCounter;
        }else if ($data != null || $data != '') {
            $errorCounter = false;
            return $errorCounter;
        }
    }

    function in_array_custom($needle, $haystack, $strict = true){
        foreach ($haystack as $items){
            if (($strict ? $items === $needle : $items == $needle) || (is_array($items) && in_array_custom($needle, $items, $strict))){
                return true;
            }
        }
        
        return false;
    }
?>