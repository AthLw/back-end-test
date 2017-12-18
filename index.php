<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="./index.css">
</head>
<body>
    <div class="top">
        <p>welcome to the NJUPT home</p>
    </div>
    <div class="middle">
        <?php
            error_reporting(E_ALL^E_NOTICE^E_WARNING);
            echo '
            <div class="information">
                <h1 id="boxhead">Login</h1>
                <form action="do_login.php" method="post">
                    <strong><span>学号：</span></strong><input type="text" id="mysid" name="mysid" required>
                    <br><br><br>
                    <strong><span>密码：</span></strong><input type="password" id="mypwd" name="mypwd" required>
                    <br><br>
                    <input type="submit" name="submit" id="sub" value="LOGIN">
                </form>
                <br>
                <span color="blue"><a href="./do_register.php">还没有账号，创建一个？</a></span>
            </div> ';
        
        ?>

    </div>
</body>
</html>