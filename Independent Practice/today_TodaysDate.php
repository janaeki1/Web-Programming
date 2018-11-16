<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--today.php
	A trivial example to illustrate a php document
	Uses the date function to output today's date
	-->
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<title>today.php</title>
	</head>
	<body>
		<p>
			<?php
				print "<b>Welcome to my Home Page<br /><br />";
				print "Today is:</b>";
				print date("F jS");
				print "<br />";
			?>
		</p>
	</body>
</html>