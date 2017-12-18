<?php
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    $connect = new mysqli('106.14.157.105','temp','temp','njuptstu');
    if($connect->connect_error){
        die('connect mysql failed');
    }
    $connect->set_charset('utf8');
?>
