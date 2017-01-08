<div class="panel-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Venue</th>
                    <th><i class="fa fa-clock-o" aria-hidden="true"></i></th>
                </tr>
            </thead>
            <tbody>
<?php
	$arrayToEcho = fetchDatabase("BOOKDATE, VENUE, STARTTIME", "BOOKINGS", "1=1 AND STATUS='Unassigned'");
	$theCount = 0;
	foreach ($arrayToEcho as $item) {
		if(!empty($item)):		
			if($theCount != 3) {
				if($theCount == 0) {
					$date = date_create($item);
					$weekDaysArray = ['Mon', 'Tues','Wed','Thur','Fri','Sat','Sun'];
					echo "<tr>";
					echo "<td>" . $weekDaysArray[date_format($date, "w")] . " " . date_format($date, "M, j"). "</td>";
					$theCount++;
				} elseif($theCount == 2) {
					$date = date_create($item);
					echo "<td>" . date_format($date, "g:i a"). "</td>";
					echo "</tr>";
					$theCount = 0;
				} 
				else {
					echo "<td>" .$item. "</td>";
				}		
				$theCount++;
			} 			
	    endif;
	} 
?>
            </tbody>
        </table>
    </div>
</div>

