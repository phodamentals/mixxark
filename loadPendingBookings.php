<div class="panel-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>DATE</th>
                    <th>VENUE</th>
                    <th><i class="fa fa-clock-o" aria-hidden="true"></i> TIME</th>
                </tr>
            </thead>
            <tbody>
<?php
		$servername = "localhost";
		$username = "";
		$password = "";
		$dbname = "";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT BOOKDATE, VENUE, STARTTIME FROM BOOKINGS WHERE 1=1 AND STATUS='Pending' AND BOOKDATE < DATE_ADD(NOW(), INTERVAL +1 MONTH)";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		
	    // output data of each row
	    while($row = $result->fetch_assoc()) {

			$bookDate = date_create($row["BOOKDATE"]);
			$starTime = date_create($row["STARTTIME"]);
			$weekDaysArray = ['Mon', 'Tues','Wed','Thur','Fri','Sat','Sun'];
			echo "<tr>";
			echo "<td><small>" . $weekDaysArray[date_format($bookDate, "w")] . " " . date_format($bookDate, "M, j"). "</small></td>";
			echo "<td>" . $row['VENUE'];
			echo "<td>" . date_format($starTime, "g:i a"). "</td>";
			echo "</tr>";
	    }
	    
	} else {
	    echo "<td>-</td>";
	    echo "<td>-</td>";
	    echo "<td>-</td>";
	}
	$conn->close();
?>
            </tbody>
        </table>
    </div>
</div>


