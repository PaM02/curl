<?php
    

    function Tiret($code){
        $date1 = substr($code, 0, 4).'-';  // abcd
        $daTa2 = $date1.''.substr($code, 4,4).'-';
        $daTa3 = $daTa2.''.substr($code,8,4).'-';
        $daTa4 = $daTa3.''.substr($code,12,4).'-';
        $code = $daTa4.''.substr($code,16,4);
        return $code;
     }

     echo Tiret('12345678948965845630')
    
 ?>