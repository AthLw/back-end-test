<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="top">
        <strong>
            <span>
                <p>Register</p>
            </span>
        </strong>
    </div>
    <div class="middle">
        <?php
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
            session_start();
            if(isset($_POST['mysid'])&&isset($_POST['myname'])&&isset($_POST['mypwd'])){
                require_once('connect_sql.php');
                require_once('insert_sql.php');
                $name = $_POST['myname'];
                $sid = $_POST['mysid'];
                $pwd = password_hash($_POST['mypwd'],PASSWORD_DEFAULT);
                echo $name.'  '.$sid;
                $tablename = 'njupt'.substr(lcfirst($sid),0,1);
                $class = substr($sid,0,7);
                $sql_query = "select * from $tablename where sid = $sid";
                $result = $connect->query($sql_query);
                if($result!=null){
                    echo '您已注册,请勿重复注册';
                    die();
                }
                else{
                    $sql_query = "insert into $tablename(sid,name,password,class) values('$sid','$name','$pwd','$class')";
                    echo $sql_query;
                    $res = $insert_sql->query($sql_query);
                    if($res){
                       echo '<div class="middle">
                            <p>您已成功注册，5秒后将跳转到登录页面</p>
                            <button onclick="jump()">立即登录</button>
                        </div>
                        <script>
                            setTimeout(jump,5000);
                            function jump(){
                                window.location.href = "./index.php";
                            }
                        </script>'; 
                    }
                    else{
                        die('注册失败');
                    }
                }
            }
            else{
                echo <<<s
<form action="./do_register.php" method="post">
<span><p>姓名：</p></span>
<input type="text" name="myname" id="myname" required>
<br><br><br>
<span><p>学号：</p></span>
<input type="text" name="mysid" id="mysid" required>
<br><br><br>
<span><p>密码：</p></span>
<input type="password" name="mypwd" id="mypwd" required>
<br>
<input type="submit" value="注册">
</form>
s;
            }
        ?>
       
    </div>
</body>
</html>
