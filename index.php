<?php
    
    $CompanyName =  "NsResif";
    $UserName = "AMR03";
    $Password = 123456;
    $MeterNo = 47000564139;
    $Token = "06689096266332390902";

    $formData =  array (
        'CompanyName' => $CompanyName,   
        'UserName' => $UserName,
        'Password' => $Password,
        'MeterNo' => $MeterNo,
        'Token' => $Token
    );
    $str = http_build_query($formData);
    $curl = curl_init("https://ami.calinhost.com/api/COMM_RemoteToken");
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
	$output = curl_exec($curl);
	$err = curl_error($curl);
    curl_close($curl);
	echo $output;
	if($err) {
		echo 'Curl Error: ' . $err;
	}
    
 ?>
 