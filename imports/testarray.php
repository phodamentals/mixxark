<?php


		$servername = "localhost";
		$username = "";
		$password = "";
		$dbname = "";


		$cssClass = '';

		// Create connection
		$conn = new mysqli($servername, $username, $password, $dbname);

		$sql = "SELECT STATUS, VENUE, STARTTIME, USERNAME FROM BOOKINGS WHERE 1=1 AND BOOKDATE='2016-05-11 00:00:00'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {

			$unassigned = 0;
			$pending = 0;
			$confirmed = 0;
									    	
		// output data of each row
		while($row = $result->fetch_assoc()) {
				if($row["STATUS"] == "Pending") {
				$pending++;

				} elseif($row["STATUS"] == "Unassigned") {
				$unassigned++;

				} elseif($row["STATUS"] == "Confirmed") {
				$confirmed++; 

				}	
						
				if (($confirmed >= 0) AND ($pending >= 1 ) AND ($unassigned >= 0)) {
					$cssClass = "pending";
					 if (($confirmed >= 0) AND ($pending >= 0) AND ($unassigned >= 1)) {
					 $cssClass = "unassigned";
					}
				}
				
				if (($confirmed >=1) AND ($pending == 0) AND ($unassigned == 0)) {
					$cssClass = "confirmed";
					}			
				}
		}
		$conn->close();


		echo $pending . "<br>";
		echo $unassigned . "<br>";
		echo $confirmed . "<br>";

		echo $cssClass;
?>


