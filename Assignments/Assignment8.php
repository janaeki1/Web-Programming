<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--Assignment8.php
	A PHP script to access the database through MySQL
	-->
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<title>Assignment8.php</title>
	</head>
	<body>
		<?php
			//Connects to MySQL
			/*Use this for local server:
			  $db = mysqli_connect("localhost", "root", "", "csc4370");*/
			$db = mysqli_connect("localhost", "janaeki1", "janaeki1", "janaeki1");
			if(!$db){
				exit("Cannot connect to MySQL: <br />".mysqli_connect_error());
			}
			
			//Executes the query
			$query = "SELECT * FROM assignment8";
			$result = mysqli_query($db, $query);
			
			//Prints all contents from the database table into an HTML table
			print "<table border = '1'><caption><h2 style='text-decoration: underline'>Assignment 8 Table</h2></caption>";
			print "<tr align = 'center'>";
			
			$num_row = mysqli_num_rows($result); //Determines number of rows
			$row_array = mysqli_fetch_array($result); //Returns an array of the next row
			$num_field = mysqli_num_fields($result); //Determines number of fields in a result row
			
			//Prints the column labels
			$key = array_keys($row_array);
			for($index = 0; $index < $num_field; $index++){
				print "<th>".$key[2 * $index + 1]."</th>";
			}
			print "</tr>";
			
			//Prints the contents of the fields in the rows
			for($row = 0; $row < $num_row; $row++){
				print "<tr align = 'center'>";
				$value = array_values($row_array);
				for($index = 0; $index < $num_field; $index++){
					$val = htmlspecialchars($value[2 * $index + 1]);
					print "<th>".$val."</th>";
				}
				print "</tr>";
				$row_array = mysqli_fetch_array($result);
			}
			print "</table>";
		?>
	</body>
</html>