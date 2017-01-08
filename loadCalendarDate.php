<style>
.rTable {
	display: table;   	
	width: 100%; 
	} 
.rTableRow {   	
	display: table-row; 
	line-height: 3em;
} 
.rTableHeading {
	display: table-header-group;   	
	background-color: #ddd; 
} 
.rTableCell, .rTableHead {   
	display: table-cell;   	
	padding: 3px 10px;   	
	border-bottom: 1px solid #f7f7f7; 
}
.rTableHeading {   	
	display: table-header-group;   	
	background-color: #ddd;   	
	font-weight: bold;
} 
.rTableFoot {   	
	display: table-footer-group;   
	font-weight: bold;   	
	background-color: #ddd; 
} 
.rTableBody {   	
	display: table-row-group; 
}


</style>
<?php

include 'session.php';
$theDate = $_GET['date'];
$status = $_GET['status'];
$date = date_create(substr($theDate, 3));

		$weekDay = array("Sunday", "Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");

		echo "<h1 class='OswaldFont' style='background: #f0f0f0; padding: 10px; text-align: right; color: #a0a0a0;'>".$weekDay[date_format($date,"w")]." ".date_format($date,"M d")."</h1>";


		include($_SERVER['DOCUMENT_ROOT']."/imports/databaseFunctions.php");
		$allUsers = fetchDatabase("USERNAME", "USERS", "1=1 AND EMAIL IS NOT NULL");
        $allPending = fetchDatabase("BOOKNUM, VENUE, STARTTIME, ENDTIME, USERNAME", "BOOKINGS", "STATUS='Pending' AND BOOKDATE='".substr($theDate, 3)." 00:00:00'");   
        $allConfirmed = fetchDatabase("BOOKNUM, VENUE, STARTTIME, ENDTIME, USERNAME", "BOOKINGS", "STATUS='Confirmed' AND BOOKDATE='".substr($theDate, 3)." 00:00:00'");   
        $allUnassigned = fetchDatabase("BOOKNUM, VENUE, STARTTIME, ENDTIME, USERNAME", "BOOKINGS", "STATUS='Unassigned' AND BOOKDATE='".substr($theDate, 3)." 00:00:00'");   

        $checkBookingCount = count($allPending) + count($allConfirmed) + count($allUnassigned);

        if ($checkBookingCount == 3) {
        	echo "lets make a new booking here!";
        } else {
        	if(count($allUnassigned) > 1) {	
			echo "<h3 class='OswaldFont'><i class='fa fa-exclamation-triangle' aria-hidden='true' style='margin-right: 10px; color: red;'></i>Unassigned</h3><hr>";	
			$x = 0;
			echo '<div class="rTable">
				<div class="rTableHeading">
					<div class="rTableHead" style="min-width: 120px;">
						VENUE
					</div>
					<div class="rTableHead">
						START / END
					</div>
					<div class="rTableHead">
						ASSIGNED DJ
					</div>
				</div>
			</div>';			
					 foreach($allUnassigned as $unassigned) {
						if($unassigned != null) {
							if($x == 0) {
								echo '<div class="rTableBody">';
								echo '<form action="processUpdateGig.php" method="post">';
								echo '<input type="hidden" name="booking" value="'.$unassigned.'">';
								echo '<input type="hidden" name="status" value="Pending">';
								echo '<div class="rTableRow">';
							} elseif ($x == 1) {
								echo '<div class="rTableCell" style="min-width: 180px;">'.$unassigned.'</div>'; 
							} elseif ($x == 2) {
								$startTime = date_create(substr($unassigned, 3));
							} elseif ($x == 3) {
								$endTime = date_create(substr($unassigned, 3));
								$timeframe = date_format($startTime, 'h:i a') . 
											'<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin: 0 5px;"></i>' . 
											 date_format($endTime, 'h:i a');
								echo '<div class="rTableCell">'.$timeframe.'</div>';
							} elseif ($x == 4) {
								echo '<div class="rTableCell">';
									echo '<select name="user" class="form-control" style="min-width: 150px;">';
									echo "<option value='None'>Select a DJ</option>";
						
									foreach($allUsers as $user) {
										if($user != null) {
											if($user == $unassigned) {
												echo "<option value=".$user." selected='selected'>".$user."</option>";	
											} else {
												echo "<option value=".$user.">".$user."</option>";												
											}						
										}
									}
									echo '</select>';
								echo '</div>';
								echo '<div class="rTableCell"><button type="button" class="btn btn-sm btn-success" onclick="this.form.submit()">Assign</button></div></form></div>';
							} elseif ($x == 5) {
								echo '<div class="rTableBody">';
								echo '<form action="processUpdateGig.php" method="post">';
								echo '<input type="hidden" name="booking" value="'.$unassigned.'">';
								echo '<input type="hidden" name="status" value="Pending">';
								echo '<div class="rTableRow">';
								$x = 0;
							} 
							$x++;
											
						}
					}	
				echo '</div>';
			echo '</div>';	
		} 	
		if(count($allPending) > 1) {	
			echo "<h3 class='OswaldFont'><i class='fa fa-pause-circle-o' aria-hidden='true' style='margin-right: 10px; color: #d0d0d0;'></i>Pending</h3><hr>";	
			$x = 0;
			echo '<div class="rTable">
				<div class="rTableHeading">
					<div class="rTableHead" style="min-width: 120px;">
						VENUE
					</div>
					<div class="rTableHead">
						START / END
					</div>
					<div class="rTableHead">
						ASSIGNED DJ
					</div>
				</div>
			</div>';
					 foreach($allPending as $pending) {
						if($pending != null) {
							if($x == 0) {
								echo '<div class="rTableBody">';
								echo '<form action="processUpdateGig.php" method="post">';
								echo '<input type="hidden" name="booking" value="'.$pending.'">';
								echo '<input type="hidden" name="status" value="Pending">';
								echo '<div class="rTableRow">';
							} elseif ($x == 1) {
								echo '<div class="rTableCell" style="min-width: 180px;">'.$pending.'</div>'; 
							} elseif ($x == 2) {
								$startTime = date_create(substr($pending, 3));
							} elseif ($x == 3) {
								$endTime = date_create(substr($pending, 3));
								$timeframe = date_format($startTime, 'h:i a') . 
											'<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin: 0 5px;"></i>' . 
											 date_format($endTime, 'h:i a');
								echo '<div class="rTableCell">'.$timeframe.'</div>';
							} elseif ($x == 4) {
								echo '<div class="rTableCell">';
									echo '<select name="user" class="form-control" style="min-width: 150px;">';
									echo "<option value='None'>Select a DJ</option>";
						
									foreach($allUsers as $user) {
										if($user != null) {
											if($user == $pending) {
												echo "<option value=".$user." selected='selected'>".$user."</option>";	
											} else {
												echo "<option value=".$user.">".$user."</option>";												
											}						
										}
									}
									echo '</select>';
								echo '</div>';
								echo '<div class="rTableCell"><button type="button" class="btn btn-sm btn-success" onclick="this.form.submit()">Change</button></div></form></div>';
							} elseif ($x == 5) {
								echo '<div class="rTableBody">';
								echo '<form action="processUpdateGig.php" method="post">';
								echo '<input type="hidden" name="booking" value="'.$pending.'">';
								echo '<input type="hidden" name="status" value="Pending">';
								echo '<div class="rTableRow">';
								$x = 0;
							} 
							$x++;
											
						}
					}	
				echo '</div>';
			echo '</div>';	
		} 	

		if(count($allConfirmed) > 1) {	
			echo "<h3 class='OswaldFont'><i class='fa fa-check-square' aria-hidden='true' style='margin-right: 10px; color: #5cb85c;'></i>Confirmed</h3><hr>";	
			$x = 0;
			echo '<div class="rTable">
				<div class="rTableHeading">
					<div class="rTableHead" style="min-width: 120px;">
						VENUE
					</div>
					<div class="rTableHead">
						START / END
					</div>
					<div class="rTableHead">
						ASSIGNED DJ
					</div>
				</div>
			</div>';
					 foreach($allConfirmed as $confirmed) {
						if($confirmed != null) {
							if($x == 0) {
								echo '<div class="rTableBody">';
								echo '<form action="processUpdateGig.php" method="post">';
								echo '<input type="hidden" name="booking" value="'.$confirmed.'">';
								echo '<input type="hidden" name="status" value="Pending">';
								echo '<div class="rTableRow">';
							} elseif ($x == 1) {
								echo '<div class="rTableCell" style="min-width: 180px;">'.$confirmed.'</div>'; 
							} elseif ($x == 2) {
								$startTime = date_create(substr($confirmed, 3));
							} elseif ($x == 3) {
								$endTime = date_create(substr($confirmed, 3));
								$timeframe = date_format($startTime, 'h:i a') . 
											'<i class="fa fa-long-arrow-right" aria-hidden="true" style="margin: 0 5px;"></i>' . 
											 date_format($endTime, 'h:i a');
								echo '<div class="rTableCell">'.$timeframe.'</div>';
							} elseif ($x == 4) {
								echo '<div class="rTableCell">';
									echo '<select name="user" class="form-control" style="min-width: 150px;" disabled>';
									echo "<option value='None'>Select a DJ</option>";
						
									foreach($allUsers as $user) {
										if($user != null) {
											if($user == $confirmed) {
												echo "<option value=".$user." selected='selected'>".$user."</option>";	
											} else {
												echo "<option value=".$user.">".$user."</option>";												
											}						
										}
									}
									echo '</select>';
								echo '</div>';
								echo '<div class="rTableCell"><button type="button" class="btn btn-sm btn-danger" onclick="this.form.submit()">Cancel</button></div></form></div>';
							} elseif ($x == 5) {
								echo '<div class="rTableBody">';
								echo '<form action="processUpdateGig.php" method="post">';
								echo '<input type="hidden" name="booking" value="'.$confirmed.'">';
								echo '<input type="hidden" name="status" value="Pending">';
								echo '<div class="rTableRow">';
								$x = 0;
							} 
							$x++;
											
						}
					}	
				echo '</div>';
			echo '</div>';	
		} 	
        }
				
		



?>







				
					


				