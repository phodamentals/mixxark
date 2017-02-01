<?php
session_start();

$servername = "localhost";
$username = "";
$password = "";
$dbname = "";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$user_check = $_SESSION['login_user'];

if (!isset($user_check)) {
    header('Location: http://www.mixxark.com/login.php');
} else {

$sql = "SELECT * FROM USERS WHERE USERNAME ='".$user_check."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $currentUser = $row["USERNAME"];
        $currentLvl = $row["LEVEL"];
        $currentEmail = $row["EMAIL"];
        $currentFirstName = $row["FIRST_NAME"]; 
        $currentLastName = $row["LAST_NAME"];    
        $currentFullName = $row["FIRST_NAME"] . " " .$row["LAST_NAME"];
        $currentBio = trim($row["BIO"]);
        $currentGenres = $row["GENRES"];
        $currentFacebook = $row["FACEBOOK"];
        $currentSoundcloud = $row["SOUNDCLOUD"];
        $currentTwitter = $row["TWITTER"];
        $currentInstagram = $row["INSTAGRAM"];    
    }
}
$conn->close();
}

?>