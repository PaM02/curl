<?php 

// Connexion à la base de données

//curl effectuer la mise à jour du concentrateur si il est en ligne ou pas---------------------------------------------------
    setlocale(LC_TIME, 'fra_fra');

    //initialiser les variables;
    $RelayStatus = '';
    $CurrentCreditRegister = '';
    $TotalUnitsCounter = '';

    $idClilent='';
    $nomClient = '';
    $numCompteur = '';
    $etat = '';

    $Password = 123456;
    $CompanyName =  "NsResif";
    $UserName = "AMR03";

    $hier = new DateTime('-2 day');
    $hierEnChiffre = $hier -> format('d');
    $année = $hier -> format('Y');
    $mois = $hier -> format('m');

    $date =  $hier -> format('Y-m-d');


    //dans le boucle while à chaque tour la variable $tache recupere une tache de la bdd


        $formData =  array (
            'CompanyName' => $CompanyName,   
            'UserName' => $UserName,
            'Password' => $Password,
            'QueryList' => [
                    
                [
                    'MeterNo' => '47000564865',
                    'Year'=> $année,
                    'Month'=>$mois,
                    'Day'=>  $hierEnChiffre
                ]

            ]
                
        );


                
        $str = http_build_query($formData);
        $curl = curl_init("https://ami.calinhost.com/api/COMM_DailyData");
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                
                
        $output = curl_exec($curl);
        $err = curl_error($curl);
                
        $json_array=json_decode($output,true);
       
            
        if ($json_array['Result']==null) {

            echo $output;

        }
        elseif (!$json_array['Result']==null){

                    //je recupere les données
            $RelayStatus = $json_array['Result']['0']['RelayStatus'];
            $CurrentCreditRegister = $json_array['Result']['0']['CurrentCreditRegister'];
            $TotalUnitsCounter = $json_array['Result']['0']['TotalUnitsCounter'];
            
            if ($RelayStatus==0) {
                # code...
                $etat = 'OFF';
            }
            elseif ($RelayStatus==1) {
                # code...
                $etat = 'ON';
            }

            echo $output;

            
        }

       
        curl_close($curl);




    


//end--curl---------------------------------------------------   

?> 