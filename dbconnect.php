<?php
    
    DEFINE ('DB_USER','root');
    DEFINE ('DB_HOST','localhost');
    DEFINE ('DB_PSWD','');
    DEFINE ('DB_NAME','login');

    $scon=mysqli_connect(DB_HOST,DB_USER,DB_PSWD,DB_NAME);

    if(!$scon)
    {
        die('Error Connecting to Database');
    }
?>