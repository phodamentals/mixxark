<!DOCTYPE html>
<html lang="en">




<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-lg-12">
             <div class="col-md-6">
            <h3 class='OswaldFont'><i class="fa fa-check-circle-o" aria-hidden="true" style='margin: 0 10px; color:#1fa67a; '></i>SUCCESS!</h3>
             <hr>
             <p><strong>Thank you for submitting a booking request!</strong><br> You should receive a response in the next 48 hours from the next available DJ!<br>
             <hr>
             	<label class='OswaldFont'>CONFIRMATION DETAILS</label>
             	<?php
             		include("../../cr33den7r@!!$.php");
             		$conn = new mysqli($servername, $username, $password, $dbname);
					$sql = "SELECT BOOKNUM, BOOKDATE, VENUE, STARTTIME, ENDTIME FROM BOOKINGS WHERE BOOKDATE='".$_GET['bookdate']."' AND EMAIL='".$_GET['email']."'";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {			
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
							echo "<br><span class='OswaldFont' style='color:#1fa67a;'>BOOKING NO. #". $row['BOOKNUM']."</span></br>";
							$theDate = date_create($row['BOOKDATE']);
							$startTime = date_create($row['STARTTIME']);
							$endTime = date_create($row['ENDTIME']);
							echo "<h3 class='OswaldFont'>".$row['VENUE']."</h3>";
							echo "<h1 class='OswaldFont'>".date_format($theDate,'D M d, Y') ."</h1>";
							echo "<h3 class='OswaldFont'>".date_format($startTime, 'g:i a')."<i class='fa fa-arrow-right' aria-hidden='true' style='margin:0 10px;'></i>" .date_format($endTime, 'g:i a')."</h2>";
					    }
					}  
					$conn->close();
             	?>
             	<hr>
             	<a href='http://mixxark.com'><button type="button" class="btn btn-lg btn-danger OswaldFont" style='width: 100%;'>FINISH</button></a>
             </div>

             </div>
         </div>
    </div>
