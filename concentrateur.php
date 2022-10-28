<?php 
//curl effectuer la mise à jour du concentrateur si il est en ligne ou pas---------------------------------------------------
            $CompanyName =  "NsResif";
            $UserName = "AMR03";
            $Password = 123456;

            $formData =  array (
                'CompanyName' => $CompanyName,   
                'UserName' => $UserName,
                'Password' => $Password
            );
            
            $str = http_build_query($formData);
            $curl = curl_init("https://ami.calinhost.com/api/COMM_OnlineStatus");
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            
            $output = curl_exec($curl);
            $err = curl_error($curl);
            
            $json_array=json_decode($output,true);
          
           //je recupere le status
           $status = $json_array['Result']['0']['Status'];
           if($status==1){
            echo  'wa';
           }
           else{
            echo  'no';
           }
            
                     
            curl_close($curl);
//end--curl---------------------------------------------------   

?> 