<?php
include 'session.php';

if(strlen($_POST['soundURL']) > 1):
    $insertURL = str_replace("https://", "", $_POST['soundURL']);
else:
    $insertURL = "";
    header ('Location: account.php?message=Please enter valid Soundcloud Link.');
endif;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO TRACKS (`URL`, `TYPE`, `USERNAME`) VALUES ('".$insertURL."', 'SOUNDCLOUD', '".$currentUser."')";

if ($conn->query($sql) === TRUE) {
    header ('Location: account.php?message=Successfully updated profile settings!');
} else {
    header ('Location: account.php?message=There was an error processing your request.');
}

$conn->close();
?>