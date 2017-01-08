 <script src="js/jquery.js"></script>
 <script src="js/jquery.cookie.js"></script>  

<script>
    function showMessage(type, message, address) {
      $.cookie('message', type + "#" + message);
      window.location.assign(address)
    }
</script>

<?php

	include("../../cr33den7r@!!$.php");


	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "UPDATE BOOKINGS SET STATUS='Confirmed' WHERE BOOKNUM ='".$_POST['booknum']."'";

	if ($conn->query($sql) === TRUE) {

		// the message
		$to = $_POST['email'];
		$subject = "Booking Confirmation from MIXXARK";
		$txt = "Your Booking has been accepted by ".$_POST['user']."!";
		$headers = "From: no-reply@mixxark.com";

		mail($to,$subject,$txt,$headers);
	    echo "<script>showMessage('success','You have accepted this gig! An Email was sent to the client.', 'account.php')</script>";
	} else {
		//echo $sql;
	    echo "<script>showMessage('danger','There was an error processing your request.', 'account.php')</script>";
	}

	$conn->close();
?>