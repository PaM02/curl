<?php 

//curl effectuer la mise à jour du concentrateur si il est en ligne ou pas---------------------------------------------------
            $CompanyName =  "NsResif";
            $UserName = "AMR03";
            $Password = 123456;
            $TaskNo = "abbb70e6-d781-43b9-9198-7eab07d48296";

            $formData =  array (
                'CompanyName' => $CompanyName,   
                'UserName' => $UserName,
                'Password' => $Password,
                'TaskNo' => $TaskNo
            );
            
            $str = http_build_query($formData);
            $curl = curl_init("https://ami.calinhost.com/api/COMM_RemoteTokenTask");
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            
            
            $output = curl_exec($curl);
            $err = curl_error($curl);
            
            $json_array=json_decode($output,true);
          
           //je recupere le status
           $status =  $json_array['Result']['Status'];

            if($status){
                
                    // update  update la table
                    $req = $bdd->prepare('UPDATE tache_jeton SET etat = :etat WHERE etat = "En attente" AND date = CURRENT_DATE ');
                    $req->execute(array(
                    
                    'etat' => 'Succès'
                ));
            }
            
            curl_close($curl);
//end--curl---------------------------------------------------   

?> 