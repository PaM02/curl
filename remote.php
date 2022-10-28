<?php 
//curl effectuer la mise à jour du concentrateur si il est en ligne ou pas---------------------------------------------------

            $CompanyName =  "NsResif";
            $UserName = "AMR03";
            $Password = 123456;
            $MeterNo ='47000564139';
            $Token = '12314963428594571253
            ';

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
            
            $json_array=json_decode($output,true);
          
           //je recupere le taskNo
            echo  $json_array['Result']['TaskNo'];
            

            
            
            
            
            
            
            curl_close($curl);
//end--curl---------------------------------------------------   

?> 