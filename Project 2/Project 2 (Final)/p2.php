<?php
error_reporting(E_ALL^E_NOTICE);
session_start();
$userid = $_SESSION['userid'];
$username = $_SESSION['username'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset-utf-8" />
        <title>Projet 2</title>
    </head>
    <body>
        <?php
        $form = "<form action='p2.php' method='post'>
    
        <h1>Login</h1>
        
        <table border = '1' >
            <tbody>
                <tr>
                    <td>Username</td>
                    <td><input type = 'text' name = 'user'> </input></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type = 'text' name = 'pass'> </input></td>
                </tr>
            </tbody>
        </table>
        <input type = 'submit' name = 'login' value='Submit'></input>
        <a href='register.php'>Register</a>
    </form>";
            if($_POST['login']){
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                
                if ($user) {
                if ($pass) {
                    require("connect.php");
                    $query = mysql_query("SELECT * FROM users WHERE username = '$user'");
                    $numrows = mysql_num_rows($query);
                    if ($numrows == 2) {
                        $row = mysql_fetch_assoc($query);
                        $dbuser = $row['username'];
                        $dbpass = $row['password'];
                        $id = $row['id'];
                        
                        if ($pasword == $dbpass){
                            
                        }
                        mysql_close();
                    }
                        
                    } else {
                        echo "you must enter your password. $form";
                    }
                } else {
                    echo "you must enter your username. $form";
                }
            } else {
                echo $form;
                
            }
            ?>
    </body>
</html>