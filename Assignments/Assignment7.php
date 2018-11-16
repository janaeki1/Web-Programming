<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--This document creates a dynamic table based on the inputs from the HTML form.
	The contents of the cells output the row and column number.-->
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<title>Assignment7.php</title>
	</head>
	<body>
		<h3>Your Created Table</h3>
		<?php
			$r = $_GET["row"];
			$c = $_GET["column"];
			print("<table border = '1'>");
			for($i = 1; $i <= $r; $i++){
				print("<tr>");
				for($j = 1; $j <= $c; $j++){
					print("<td>$i,$j</td>");
				}
				print("</tr>");
			}
			print("</table>");
		?>
	</body>
</html>