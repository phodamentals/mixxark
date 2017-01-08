<?php include $_SERVER['DOCUMENT_ROOT'] . '/session.php'; ?>
<!DOCTYPE html>
<html lang="en">


<?php include $_SERVER['DOCUMENT_ROOT'] .  '/header.php'; ?>
    <!-- Page Content -->
    <div class="container">
        <div class="col-lg-8">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <?php echo "<h2 class='OswaldFont'>Welcome, " . $currentUser . "! </h2>";?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body" style='min-height: 600px;'>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class='active' id="tab_bookings"><a href="#bookings" data-toggle="tab">
                                <span class='OswaldFont'>BOOKINGS</span></a>
                                </li>                                                           
                                <li id="tab_profile"><a href="#profile" data-toggle="tab"><span class='OswaldFont'>PROFILE</span></a>
                                </li>
                                <li id="tab_settings"><a href="#settings" data-toggle="tab">
                                <span class='OswaldFont'>SETTINGS<span></a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="bookings">
                                    <?php include '../loadUserBookings.php';?>
                                </div>                                
                                <div class="tab-pane fade" id="profile">
                                    <?php include '../loadUserProfileEdit.php';?>
                                </div>

                            </div>
                        </div>
                    </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->

            <div class="col-lg-4">
                <div class='side-container'>
                    <span><img class='profilePic' src='../img/profile/default.png'></span> 
                </div>
            </div>

    </body>
</html>