<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <title>Projet 2 Admin Login</title>
    </head>
    <body>
        <form action="adminpage.php" method="get">
    
        <h1>Admin Login</h1>
        
        <table border = "1" >
            <tbody>
                <tr>
                    <td>Enter Admin username</td>
                    <td><input type = "text" name = "user"> </input></td>
                </tr>
                <tr>
                    <td>Enter Admin password</td>
                    <td><input type = "text" name = "pass"> </input></td>
                </tr>
            </tbody>
        </table>
        <input type = "submit" name = "login" value="Submit"></input>
        
    </form>
    </body>
</html>
