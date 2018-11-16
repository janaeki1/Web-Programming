<?php
            $server = "localhost";
            $username = "root";
            $password = "root";
            $db = "p2";
            
            
            $connect = new mysqli($server, $username, $password, $db);
            if ($connect->connect_error) {
                die("Connection failed: " . $connect->connect_error);
            }
            $name = $_GET["user"]; 
            $pwd = $_GET["pass"];
            $sql = "SELECT id FROM play WHERE username = '$name' and password = '$pwd'";
            $result = mysqli_query($connect,$sql);
            $count = mysqli_num_rows($result);
            if ($count == 1) {
                
                echo "User login successful ";//send to user page
                
            } else {
                echo "Incorrect user information";
            }
                
               
                
            $connect->close();
        
?>
