
<?php
session_start();
	if(isset($_POST['func']) && !empty($_POST['func'])){
		switch($_POST['func']){
			case 'getCal':
				getCal($_POST['year'],$_POST['month']);
				break;
			default:
				break;
		}
	}

	function getCal($year = '',$month = ''){
		$dYear = ($year != '')?$year:date("Y");
		$dMonth = ($month != '')?$month:date("m");
		$date = $dYear.'-'.$dMonth.'-01';
		$currentMonth = date("N",strtotime($date));
		$totalMonth = cal_days_in_month(CAL_GREGORIAN,$dMonth,$dYear);
		$totalMonthDisplay = ($currentMonth == 7)?($totalMonth):($totalMonth + $currentMonth);
		$boxDisplay = ($totalMonthDisplay <= 35)?35:42;
?>

<div class="calender_section">
	<ul>
       	   <li>
             <a 
			href="javascript:void(0);" 
			onclick="getCal('calen','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;
		</a>
                <select name="monthDropdown" class="monthDropdown dropdown"><?php echo monthList($dMonth); ?></select>
		<select name="yearDropdown" class="yearDropdown dropdown"><?php echo yearList($dYear); ?></select>
              <a 
			href="javascript:void(0);" 
			onclick="getCal('calen','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;
		</a>
            </li>
         </ul>
</div>
        
		<ul class="weekday">
			<li>Sunday</li>
			<li>Monday</li>
			<li>Tuesday</li>
			<li>Wednesday</li>
			<li>Thursday</li>
			<li>Friday</li>
			<li>Saturday</li>
		</ul> 

		<ul class="date">
	        <li>		
                    <?php 
        				$count = 1; 
				for($i=1;$i<=$boxDisplay;$i++){
					if(($i >= $currentMonth+1 || $currentMonth == 7) && $i <= ($totalMonthDisplay)){
						$found = 0;$text="";
						/*if(isset($_SESSION['eventlist']){
							foreach($_SESSION['eventlist'] as $ev){
						 		if($ev->date == $count &&  $ev->year == $dYear && $ev->month == $dMonth){
									$text = $ev->name;
									$found = 1;
						 		}
							}
						}*/
						$currentDate = $dYear.'-'.$dMonth.'-'.$count;
						echo '<li date="'.$currentDate.'" class="date_cell">';
						echo '<span>';
						echo $count;
						/*if($found == 1){echo $text;}*/
						echo '</span>';
						echo '</li>';
						$count++;
					}
					else{
			?>
			<li><span>&nbsp;</span></li>
			<?php } } }?>
		</li>
                </ul>

<script type="text/javascript">
	function getCal(div,year,month){
		$.ajax({
			type:'POST',
			url:'functions.php',
			data:'func=getCal&year='+year+'&month='+month,
			success:function(html){
				$('#'+div).html(html);
			}
		});
	}
	
	$(document).ready(function(){
		$('.date_cell').mouseenter(function(){
			date = $(this).attr('date');
			$(".date_popup_wrap").fadeOut();
			$("#date_popup_"+date).fadeIn();	
		});
		$('.date_cell').mouseleave(function(){
			$(".date_popup_wrap").fadeOut();		
		});
		$('.monthDropdown').on('change',function(){
			getCal('calen',$('.yearDropdown').val(),$('.monthDropdown').val());
		});
		$('.yearDropdown').on('change',function(){
			getCal('calen',$('.yearDropdown').val(),$('.monthDropdown').val());
		});
		$(document).click(function(){
			$('#event_list').slideUp('slow');
		});
	});
</script>

<?php
	function monthList($select = ''){
		$option = '';
		for($i=1;$i<=12;$i++){
			$val = ($i < 10)?'0'.$i:$i;
			$selectOption = ($val == $select)?'selected':'';
			$option .= '<option value="'.$val.'" '.$selectOption.' >'.date("F", mktime(0, 0, 0, $i+1, 0, 0)).'</option>';
		}
		return $option;
	}

	function yearList($select = ''){
		$option = '';
		for($i=2010;$i<=2020;$i++){
			$selectOption = ($i == $select)?'selected':'';
			$option .= '<option value="'.$i.'" '.$selectOption.' >'.$i.'</option>';
		}
		return $option;
	}
?>
