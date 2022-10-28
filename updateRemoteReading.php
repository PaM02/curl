<?php 

// Connexion à la base de données
include("bdd.php");

//je fais un filtre afin de recuperer les taches qui sont en attente---------------------------------------------------



$reponse = $bdd->query('SELECT tacheLecture FROM lecture_tache  WHERE etat = "En attente" AND date_de_creation = CURRENT_DATE');
        

while ($donnees = $reponse->fetch())
{

    //dans le boucle while à chaque tour la variable $tache recupere une tache de la bdd
   $tache = $donnees['tache'];
   $CompanyName =  "NsResif";
   $UserName = "AMR03";
   $Password = 123456;

        //passé au post

   $formData =  array (
       'CompanyName' => $CompanyName,   
       'UserName' => $UserName,
       'Password' => $Password,
       'TaskNo' => $tache
   );

    $str = http_build_query($formData);
    $curl = curl_init("https://ami.calinhost.com/api/COMM_RemoteReadingTask");
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $str);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($curl);
    $err = curl_error($curl);
    
    $json_array=json_decode($output,true);
  
   //je recupere le status
   $status =  $json_array['Result']['Status'];
   $Data =  $json_array['Result']['Data'];

    if($status=='True'){
        //si c'est true j'update la base de donnees
         
        $req = $bdd->prepare('UPDATE tache_controle SET etat = :etat,Reception_donnees = :Reception_donnees WHERE tacheLecture = :tacheLecture ');
        $req->execute(array(
        'tacheLecture' => $tache,
        'Reception_donnees'=> $Data,
            'etat' => 'Succès'
        ));
    }
    elseif ($status=='False') {
        # code...
                //si c'est true j'update la base de donnees
         
            $req = $bdd->prepare('UPDATE tache_controle SET etat = :etat,Reception_donnees = :Reception_donnees WHERE tacheLecture = :tacheLecture ');
            $req->execute(array(
            'tacheLecture' => $tache,
            'Reception_donnees'=> $Data,
            'etat' => 'Echec'
        ));
    }
    
    curl_close($curl);
//end--curl--------------------------------------------------- 

}
//endwhile--------------------------------------------------- 

$reponse->closeCursor();

            
            
            
            
  

?> 