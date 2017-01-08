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
					$servername = "localhost";
					$username = "root";
					$password = "OaRkF9Idb3";
					$dbname = "mixxark";
			
				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				$sql = "SELECT BOOKDATE, VENUE, STARTTIME FROM BOOKINGS WHERE 1=1 AND STATUS='Unassigned'";
				$result = $conn->query($sql);
			
				if ($result->num_rows > 0) {
					echo "<tr>";
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
						$bookDate = date_create($row["BOOKDATE"]);
						$starTime = date_create($row["STARTTIME"]);
						$weekDaysArray = ['Mon', 'Tues','Wed','Thur','Fri','Sat','Sun'];
			
						echo "<td>" . $weekDaysArray[date_format($bookDate, "w")] . " " . date_format($bookDate, "M, j"). "</td>";
						echo "<td>" . $row['VENUE'];
						echo "<td>" . date_format($starTime, "g:i a"). "</td>";
				    }
				    echo "</tr>";
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


