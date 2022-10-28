<?php 
//curl---------------------------------------------------
         $CompanyName =  "NsResif";
         $UserName = "AMR03";
         $Password = 123456;
         $MeterNo = '47000564139';
        
     
         $formData =  array (
             'CompanyName' => $CompanyName,   
             'UserName' => $UserName,
             'Password' => $Password,
             'MeterNo' => $MeterNo,
             'Token' => '42008441814006461653'
         );
         
         $str = http_build_query($formData);
         $curl = curl_init("https://ami.calinhost.com/api/COMM_RemoteToken");
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