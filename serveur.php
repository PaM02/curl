<?php 
$url = 'http://www.m2m-iot.cc:8081/member';
        // Create a new cURL resource
        $ch = curl_init($url);
        $m0=md5('abcdef');
        $m1='P@sser2009'. $m0;
        $password=md5($m1);

        // Setup request to send json via POST
        $data = array(
            'action_cmd' => 'login',
            'seq_id' => '0',
            'body' => array(
                'pwd' => $password,
                'username' => '6x-smart',
                'login_from' => 'web'
            ),
            'version' => '1.0'
        );

        $payload = json_encode($data);

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);
        //$data = json_decode(file_get_contents('php://input'), true);
        // Close cURL resource
        curl_close($ch);

        // pour recupérer et inserer les données dans la base de donnée
        $url = 'http://www.m2m-iot.cc:8081/query';
        // Create a new cURL resource
        $ch = curl_init($url);
        $m0=md5('abcdef');
        $m1='P@sser2009'. $m0;
        $password=md5($m1);
        //echo $password;
        // Setup request to send json via POST
        $data = array(
            'action_cmd' => 'query_device_currentdata2',
            'seq_id' => '2',
            'body' => array(
                'deviceid' => '6xm00002',
                'tid' => '7b308d9fab032115ab00521a2e6ebf41'
            ),
            'version' => '1.0'
        );

        $payload = json_encode($data);
        // echo $payload;
        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);
        echo $result;
        // $data = json_decode(file_get_contents('php://input'), true);
        // Close cURL resource
        curl_close($ch);
        // Decoder les données json pour recupérer les valeurs avec php
      

    ?> 