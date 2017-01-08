<!DOCTYPE html>
<html lang="en">

<?php 

$theDJ = $_GET['dj'];

$animal = array('type' => 'dog', 
'name' => 'Max');

$b = (object) $animal;

$servername = "localhost";
$username = "root";
$password = "OaRkF9Idb3";
$dbname = "mixxark";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 


$user_check = $_SESSION['login_user'];


$sql = "SELECT * FROM USERS WHERE USERNAME ='".$theDJ."'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $thisUser = $row["USERNAME"];
        $thisEmail = $row["EMAIL"];  
        $thisName = $row["FIRST_NAME"] . " " .$row["LAST_NAME"];
        $thisBio = trim($row["BIO"]);
        $thisImage = $row['IMAGE'];
        $thisGenres = $row["GENRES"];
        $thisFacebook = $row["FACEBOOK"];
        $thisSoundcloud = $row["SOUNDCLOUD"];
        $thisTwitter = $row["TWITTER"];
        $thisInstagram = $row["INSTAGRAM"];    
    }
}
$conn->close();


if(strlen($thisBio) < 1):
    $thisBio = "This Mix Artist has not written anything yet.";
endif;

if(strlen($thisFacebook) < 1):
    $social1 = "<li class='social-links-inactive'><i class='fa fa-facebook-official'></i></li>";
else:
    $social1 = "<a href='http://$thisFacebook'><li class='social-links'><i class='fa fa-facebook-official'></i></li></a>";
endif;
if(strlen($thisSoundcloud) < 1):
    $social2 = "<li class='social-links-inactive'><i class='fa fa-soundcloud'></i></li>";
else:    
    $social2 = "<a href='http://$thisSoundcloud' style='color: #f50;'><li class='social-links'><i class='fa fa-soundcloud'></i></li></a>";
endif;
if(strlen($thisTwitter) < 1):
    $social3 = "<li class='social-links-inactive'><i class='fa fa-twitter-square'></i></li>";
else:    
    $social3 = "<a href='http://$thisTwitter' style='color: #55acee;'><li class='social-links'><i class='fa fa-twitter-square'></i></li></a>";
endif;
if(strlen($thisInstagram) < 1):
    $social4 = "<li class='social-links-inactive'><i class='fa fa-instagram'></i></li>";
else:    
    $social4 = "<a href='http://$thisInstagram' style='color: #333;'><li class='social-links'><i class='fa fa-instagram'></i></li></a>";
endif;

echo " <div class='container' style='max-width: 600px;'>

        <div class='row'>
            <div class='col-lg-12 text-center'>
                <h1 class='OswaldFont'>$theDJ</h1>
                <hr>
                <div class='col-lg-8'>
                <div class='panel panel-default'>
                        <div class='panel-heading'>
                            <span class='OswaldFont'>SHORT BIO</span>
                        </div>
                        <div class='panel-body'>
                            <p>$thisBio</p>
                            <span class='OswaldFont' style='text-transform: uppercase;'>$thisGenres</span>
                        </div>
                        <div class='panel-footer'>

                        </div>
                    </div>
                    </div>
                    <div class='col-lg-4'>
                     <img src='/img/profile/$thisImage' style='width: 80%; border-radius: 5px;'>

                <ul class='list-unstyled'>
                    $social1
                    $social2
                    $social3
                    $social4             
                </ul>

             </div>
            </div>
        </div>
        <!-- /.row -->

    </div>";


?>


    <!-- Page Content -->
   
    <!-- /.container -->



</body>

</html>
