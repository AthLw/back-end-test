<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE^E_WARNING);
    require_once('connect_sql.php');
    
    if(!isset($_POST['mysid'])){
        header('Location: ./index.php');
        echo '<dialog>please input the sid</dialog>';
        die();
    }
    $sid = $_POST['mysid'];
    $pwd = $_POST['mypwd'];
    $tablename = 'njupt'.substr(lcfirst($sid),0,1);
    $sql_query = "select * from $tablename where sid = '$sid'";
    $result = $connect->query($sql_query);
    if($result===NULL){
        header('Location: ./index.php');
        echo '<dialog>your student id or password wrong!even you have not registered</dialog>';
        die();
    }
    $result_assoc = $result->fetch_assoc();
    $istrue = password_verify($pwd,$result_assoc['password']);
    $name = $result_assoc['name'];
    if($istrue){
        $_SESSION['mysid'] = $sid;
        echo "Welcome come back, $name";
    }
    else{
        echo '账号或密码错误';
    }


?>