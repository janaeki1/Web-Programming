<?xml version = "1.0"?>
<!DOCTYPE html PUBLIC "-//w3c//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php 
    //session_start();
     //$_SESSION['eventlist']= array();
?>
<html xmlns = "http://www.w3.org/1999/xhtml">
	<head>
		<title>Interactive Calendar</title>
		<link type="text/css" rel="stylesheet" href="calstyle.css"/>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
                <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
	</head>
        
	<?php include_once('functions.php'); ?>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script> 
    <script src="jquery.min.js"></script>
	<body>        
	     <?php 
             /*  if(isset($_POST['event']){
			$event =  new event;
			$event->name = $_POST["event"];
                        $event->date = $_POST["dateDropdown"];
                        $event->month = $_POST["monthDropdown"];
                        $event->year = $_POST["yearDropdown"];
			array_push($_SESSION['eventlist'],$event);
                }*/
             ?>	
        <h2 style="text-align: center">Interactive Calendar</h2>
        <br>
	<div class="container">
		<div class="row">
		<div class="col-md-3">
		<form action="/calendar.php" method="POST">
                Event:  <input type="text" name="event"><br/>
                <select name="monthDropdown" class="monthDropdown dropdown"><?php echo monthList($dMonth); ?></select>          
                <select name="dateDropdown">
                 <?php
                                     
                                for($i=1;$i<=31;$i++){
                                   echo "<option value='".$i."'>";
                                   echo $i;
                                   echo "</option>";          
                                }
                  ?>                                                             
                   </select>
                 <select name="yearDropdown" class="yearDropdown dropdown"><?php echo yearList($dYear); ?></select> 
                 <br/>  
                  <input type="Submit" name="Submit"><br/>
                 
			</form>
		</div>
        	<div id="calen" class="col-md">
			<?php echo getCal(); ?>
		</div>
		</div>
	</div>		
	</body>
        
        <?php 
         /* class Event {
            public $name,$date,$year,$month; 
          }*/ 
        ?>
</html>
