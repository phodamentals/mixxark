<?php
include 'session.php';

if(strlen($_POST['myemail']) > 1):
    $changeEmail = ",EMAIL='".($_POST['myemail'])."' ";
else:
    $changeEmail = "";
endif;

if(strlen($_POST['newpassword']) > 1):
    $changePassword = ",PASSWORD='".md5($_POST['newpassword'])."' ";
else:
    $changePassword = "";
endif;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE USERS SET USERNAME='$currentUser' $changeEmail $changePassword WHERE USERNAME ='".$currentUser."'";

if ($conn->query($sql) === TRUE) {
    header ('Location: account.php?message=Successfully updated account settings!');
} else {
    header ('Location: account.php?message=There was an error processing your request.');
}

$conn->close();

?>
