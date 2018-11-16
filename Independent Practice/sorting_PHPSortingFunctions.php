<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

<!--sorting.php
	An example to illustrate several of the sorting functions
	-->
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<title>Sorting</title>
	</head>
	<body>
		<?php
			$original = array("Fred" => 31, "Al" => 27, "Gandalf" => "wizard", 
							  "Betty" => 42, "Frodo" => "hobbit");
		?>
		<h4>Original Array</h4>
		<?php
			foreach($original as $key => $value)
				print("[$key] => $value<br />");
				
			$new = $original;
			sort($new);
		?>
		<h4>Array Sorted with "sort"</h4>
		<?php
			foreach($new as $key => $value)
				print("[$key] => $value<br />");
				
			$new = $original;
			asort($new);
		?>
		<h4>Array Sorted with "asort"</h4>
		<?php
			foreach($new as $key => $value)
				print("[$key] => $value<br />");
				
			$new = $original;
			ksort($new);
		?>
		<h4>Array Sorted with "ksort"</h4>
		<?php
			foreach($new as $key => $value)
				print("[$key] => $value<br />");
		?>
	</body>
</html>