<?php
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    $insert_sql = new mysqli('106.14.157.105','tempinsert','temp','njuptstu');
    if($insert_sql->connect_error){
        echo 'connect sql failed';
        die();
    }
    $insert_sql->set_charset('utf8');