<?php
            $server = "localhost";
            $username = "root";
            $password = "root";
            $db = "p2";
            
            
            $connect = new mysqli($server, $username, $password, $db);
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            }
            $sql = "INSERT INTO play (username, password)
                VALUES('$_GET[user]','$_GET[pass]')";
            if ($connect->query($sql) === TRUE) {
                
                echo "Thank you for signing up!";?>
<br> <br><a href="index.html">Click here to go to the home page</a>
<br> <br><a href="user.php">Click here to go to the user login page</a>
                
           <?php } else {
                echo "Error: " . $sql . "<br>" . $connect->error;
            }
                
            $connect->close();
        
?>

