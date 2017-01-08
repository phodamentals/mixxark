 <script src="js/jquery.js"></script>
 <script src="js/jquery.cookie.js"></script>  

<script>
    function showMessage(type, message, address) {
      $.cookie('message', type + "#" + message);
      window.location.assign(address)
    }
</script>

<?php
// Required field names
$required = array('venue', 'address1', 'state', 'zip', 'city', 'email', 'areaCode', 'phone1', 'phone2');

// Loop over field names, make sure each one exists and is not empty
$error = false;
foreach($required as $field) {
  if (empty($_POST[$field])) {
  	echo "<script>showMessage('danger','Please fill out all required fields.', 'completeBooking.php?')</script>";
    $error = true;
  }
}

if ($error) {
  echo "<script>showMessage('danger','There was an error processing your request.', 'completeBooking.php')</script>";
} else {

	include("../../cr33den7r@!!$.php");

	$phoneNumber = $_POST['areaCode'] . "-" . $_POST['phone1'] . "-" . $_POST['phone2'];
	
	$startTime =  wordwrap($_POST['startTime'] , 2 , ':' , true ) . ":00:00";
    $endTime =  wordwrap($_POST['endTime'] , 2 , ':' , true ) . ":00:00" ;

	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO BOOKINGS (`VENUE`, `BOOKDATE`, `ADDRESS1`,`ADDRESS2`,`ZIPCODE`,`STATE`,`CITY`,`DETAILS`,`EMAIL`,`PHONE`,`STARTTIME`,`ENDTIME`,`STATUS`) 
			VALUES ('".$_POST['venue']."', '".$_POST['bookDate']."', '".$_POST['address1']."', '".$_POST['address2']."', '".$_POST['zip']."'
			, '".$_POST['state']."', '".$_POST['city']."', '".$_POST['comments']."','".$_POST['email']."','".$phoneNumber."','".$_POST['bookDate']." ".$startTime."', '".$_POST['bookDate']." ".$endTime."', 'Unassigned')";
	if ($conn->query($sql) === TRUE) {
		// the message
		$to = $_POST['email'];
		$subject = "Booking Confirmation from MIXXARK";
		$txt = "Your Booking has been received and we will respond to you within 48 hours. 
		Venue: ".$_POST['venue']."
		Date: ".$_POST['bookDate'];
		$headers = "From: no-reply@mixxark.com";

		mail($to,$subject,$txt,$headers);

		$callback = "?email=".$_POST['email'] . "&bookdate=" . $_POST['bookDate'];
	    echo "<script>showMessage('success','Your Booking has been successfully submitted!', 'successBooking.php$callback')</script>";

	} else {
	    echo "<script>showMessage('danger','There was an error processing your request.', 'completeBooking.php?')</script>";			


	}

	$conn->close();

}


?>