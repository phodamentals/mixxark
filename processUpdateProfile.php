<?php
include 'session.php';

if(strlen($_POST['bio']) > 1):
    $changeBio = ",BIO='".str_replace("'", "\\'", $_POST['bio'])."' ";
else:
    $changeBio = "";
endif;

if(strlen($_POST['tags']) > 1): 
    $changeTags = ",GENRES='".$_POST['tags']."' ";
else:
    $changeTags = "";
endif;

if(strlen($_POST['facebook']) > 1): 
    $changeFacebook = ",FACEBOOK='".$_POST['facebook']."' ";
else:
    $changeFacebook = "";
endif;

if(strlen($_POST['soundcloud']) > 1): 
    $changeSoundcloud = ",SOUNDCLOUD='".$_POST['soundcloud']."' ";
else:
    $changeSoundcloud = "";
endif;

if(strlen($_POST['instagram']) > 1): 
    $changeInstagram = ",INSTAGRAM='".$_POST['instagram']."' ";
else:
    $changeInstagram = "";
endif;

if(strlen($_POST['twitter']) > 1): 
    $changeTwitter = ",TWITTER='".$_POST['twitter']."' ";
else:
    $changeTwitter = "";
endif;

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE USERS SET USERNAME='$currentUser' $changeBio $changeTags $changeFacebook $changeSoundcloud $changeInstagram $changeTwitter WHERE USERNAME ='".$currentUser."'";

if ($conn->query($sql) === TRUE) {
    header ('Location: account.php?message=Successfully updated profile settings!');
} else {
    header ('Location: account.php?message=There was an error processing your request.');
}

$conn->close();

?>