<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>


<?php
session_start();
$user_check = $_SESSION['login_user'];

if (!isset($user_check)) {
    //Do nothing.
} else {
    header('Location: http://www.mixxark.com/artist/account.php');
}

?>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-lg-12">
                <!-- <img class="img-responsive img-rounded" src="img/main.jpg" alt=""> -->
        
                <h1 class='OswaldFont' style='text-align:center;'>WELCOME TO MIXXARK!</h1>
                <hr>
                <p style='text-align:center;'>Explore Arkansas's best DJs and find everything you need to make your next event exciting, special, and memorable. Mixxark, your gateway to Northwest Arkansas's DJ scene and the fastest way to book a DJ for your next event today.</p>
                <hr>
                <a class="btn btn-danger btn-lg frontpage-btn function_popup" href='dialogBooking.php'>
                        <i class="fa fa-calendar-plus-o adjustIcon"></i>
                    <span class="OswaldFont">BOOK A DJ</span>
                </a>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="container">
        <div class="row">
            <div class="col-lg-12" style='text-align: center;'>
                <h4><small class='OswaldFont'>EXPLORE MIX ARTIST</small></h4>
                <div class="well" style='padding-left: 0; text-align: center;'>
                    <ul style='list-style: none; display: inline-block;'>

                        <?php
                        include("../../cr33den7r@!!$.php");
                        $conn = new mysqli($servername, $username, $password, $dbname);
                        $sql = "SELECT USERNAME, LOGO FROM USERS";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {            
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                if(file_exists("img/logos/".strtolower($row['USERNAME']).".png")) {
                                    echo '<a href="profile.php?dj='.$row['USERNAME'].'" class="function_popup" style="text-decoration: none;">
                                    <li style="display: inline-block;"">
                                    <img class="djLogos" src="img/logos/'.strtolower($row['USERNAME']).'.png" alt='.$row['USERNAME'].'></li></a>';        
                                } 
                                else if($row['LOGO'] == 'default.png') {
                                    echo '<a style="text-decoration: none; text-transform: uppercase; color: #0d0d0d; display: inline-block; vertical-align: bottom;" href="profile.php?dj='.$row['USERNAME'].'" class="function_popup">
                                    <li style="display: inline-block;"><img class="djLogos" src="img/logos/'.$row['LOGO'].'" alt='.$row['USERNAME'].'><br><span class="OswaldFont"><small>'.$row['USERNAME'].'</small></span></li></a>';
                                } else {
                                   echo '<a href="profile.php?dj='.$row['USERNAME'].'" class="function_popup">
                                    <li style="display: inline-block;"">
                                    <img class="djLogos" src="img/logos/'.$row['LOGO'].'" alt='.$row['USERNAME'].'></li></a>';                                         
                                }
                            }
                        }  
                        $conn->close();
                        ?>                                  
                    </ul>
                    
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
</div>

        <!-- Footer -->
        <?php include 'footer.php';?>

    </div>
    <!-- /.container -->


<script src="js/jquery.popup.js"></script>
<script>$('.function_popup').popup();</script>
</body>

</html>
