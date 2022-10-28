<?php 

    
    // Connexion à la base de données
   
    // Change une date aaaa/mm/dd en dd mois aaaa

            
             //curl---------------------------------------------------
            // $DataItem = Switch on Ou Switch off
            $CompanyName =  "NsResif";
            $UserName = "AMR03";
            $Password = 123456;
            $MeterNo = '47000565359';
            $DataItem = 'Current Credit Register';

            $formData =  array (
                'CompanyName' => $CompanyName,   
                'UserName' => $UserName,
                'Password' => $Password,
                'MeterNo' => $MeterNo,
                'DataItem' => $DataItem
            );
            
            $str = http_build_query($formData);
            $curl = curl_init("https://ami.calinhost.com/api/COMM_RemoteReading");
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            $output = curl_exec($curl);
            
            $json_array=json_decode($output,true);

            //je recupere le taskNo
            $tache =  $json_array['Result']['TaskNo'];
            
            curl_close($curl);
            //end--curl---------------------------------------------------  



?> 