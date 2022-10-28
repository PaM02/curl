<?php 

    // Change une date aaaa/mm/dd en dd mois aaaa
    function MeF_Date($str) {

        // Récupère la date dans des variables
        list($annee, $mois) = explode("-", $str);
        // Met le mois en littéral
        $moisli[1] = "Janvier";
        $moisli[2] = "Février";
        $moisli[3] = "Mars";
        $moisli[4] = "Avril";
        $moisli[5] = "Mai";
        $moisli[6] = "Juin";
        $moisli[7] = "Juillet";
        $moisli[8] = "Août";
        $moisli[9] = "Septembre";
        $moisli[10] = "Octobre";
        $moisli[11] = "Novembre";
        $moisli[12] = "Décembre";
    
        if (substr($mois, 0, 1)=="0"){
            $mois=substr($mois, 1, 1);
        }
        $mois = $moisli[$mois];
        // Met en forme 
        $str = $mois.' '.$annee;
        return $str;
    }

    //je recupere le mois courant
    setlocale(LC_TIME, 'fra_fra');
    $datTime = new DateTime("+1 month", new DateTimeZone('Africa/Dakar'));
    $date = $datTime -> format('Y-m'); 
    
    $dateFr = MeF_Date($date);
    echo $dateFr;
    ?> 