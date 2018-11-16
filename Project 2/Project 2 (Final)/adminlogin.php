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
                    
            if ($name == "admin" && $pwd == "password") {
                
                echo "Admin login successful ";//send to admin page
                
            } else {
                echo "Incorrect admin information";
            }
                
               
                
            $connect->close();
        
?>
