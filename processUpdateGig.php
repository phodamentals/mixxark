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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE BOOKINGS SET USERNAME='".$_POST['user']."', STATUS='".$_POST['status']."' WHERE BOOKNUM ='".$_POST['booking']."'";

if ($conn->query($sql) === TRUE) {
	echo "<script>showMessage('success','Successfully Assigned Gig!', 'test_dashboard.php')</script>";
} else {
	echo "<script>showMessage('danger','There was an error processing your request.', 'test_dashboard.php')</script>";
}

$conn->close();



?>
