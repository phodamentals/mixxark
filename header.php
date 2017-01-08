<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MIXXARK - ARKANSAS DJs</title> 
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Bootstrap Core CSS 
    <link href="css/bootstrap.css" rel="stylesheet">
    -->

    <!-- Custom CSS -->
    <link href="../css/mixxark.css" rel="stylesheet">
    <link href="../css/popup.css" rel="stylesheet">
    
    <script src="../js/jquery.js"></script>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
	
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


    <script src="../js/jquery.cookie.js"></script>
    <script src="../js/bootstrap-datepicker.min.js"></script>
    <link href="../css/bootstrap-datepicker3.css" rel="stylesheet">
    
    <script src="../js/jquery.timepicker.js"></script>
    <link href="../css/jquery.timepicker.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">

    <?php include($_SERVER['DOCUMENT_ROOT']."/imports/databaseFunctions.php"); ?>

    
</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container" style='margin-top: 0px !important'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="../index.php">
                    <img src="../img/logo.png" alt="Welcome to MIXXARK!" id='logo' style="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php

                    if (!isset($user_check)) {
              echo "<li>
                        <a href='/login.php' id='services' class='navigation$menu3'>LOGIN</a>
                    </li>                                     
                    <li>
                        <a href='/contact.php' id='contact' class='navigation$menu5'>Contact</a>
                    </li>";
                    } else {
              echo "<li>
                        <a href='/artist/account.php' id='contact' class='navigation$menu5'><i class='fa fa-calendar-check-o' aria-hidden='true' style='margin-right: 5px;'></i>
                        <span style='font-size: 11px;'>CALENDAR</span></a>
                    </li>
                    <li>
                        <a href='/loadUserProfileEdit.php' id='contact' class='navigation$menu5 _popup'><i class='fa fa-headphones' aria-hidden='true'  style='margin-right: 5px;'></i>
                        <span style='font-size: 11px;'>ACCOUNT</span></a>
                    </li>
                    <li>
                        <a href='/loadUserSettings.php' id='settings' class='navigation$menu5 _popup'><i class='fa fa-cog' aria-hidden='true' style='margin-right: 5px;'></i>
                        <span style='font-size: 11px;'>SETTINGS</span></a>
                    </li>                                                                           
                    <li>
                        <a href='/logout.php' id='contact' class='navigation$menu5'><i class='fa fa-ticket' aria-hidden='true' style='margin-right: 5px;'></i>
                        <span style='font-size: 11px;'>LOGOUT</span></a>
                    </li>";
                    }

                    
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <script src="../js/jquery.popup.js"></script>
    <script src="../js/bootstrap-notify.js"></script>
<?php
if(isset($_COOKIE['message'])) {
    $message = explode("#", $_COOKIE['message']);

    echo "<script>";
    echo "$.notify({
    // options
        message: '".$message[1]."' 
    },{
        // settings
        type: '".$message[0]."',
    });
    document.cookie = 'message=;expires=Thu, 01 Jan 1970 00:00:01 GMT;';
    ";
echo "</script>";

}

?>


<script>
$('._popup').popup();
</script>