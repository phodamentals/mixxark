<?php

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

$sql = "SELECT * FROM TRACKS WHERE USERNAME ='pourit'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $thisTrack = $row["URL"];
        $thisOwner = $row["USERNAME"];  
        soundcloudParse($thisTrack);
    }
}
$conn->close();


function soundCloudParse($url){
//Get the JSON data of song details with embed code from SoundCloud oEmbed
$getValues=file_get_contents('http://soundcloud.com/oembed?format=js&url='.$url.'&iframe=true');
//Clean the Json to decode
$decodeiFrame=substr($getValues, 1, -2);
//json decode to convert it as an array
$jsonObj = json_decode($decodeiFrame);

//Change the height of the embed player if you want else uncomment below line
// echo $jsonObj->html;
//Print the embed player to the page
echo str_replace('height="400"', 'height="140"', $jsonObj->html);


}


?>