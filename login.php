<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<?php include 'header.php';?>

<div class="container">

<div class="container-fluid">
		<div class="row">
		<form style="text-align: left; line-height:1.3em; padding-bottom: inherit;" action="processLogin.php" method="post">
			<div class="col-md-4 col-md-offset-4">
					<h3 class='OswaldFont'>MEMBER LOGIN</h3>
                        <div class="panel panel-white">
                            <div class="panel-heading">
                                <div class="row" style="padding:10px;">
								<label>Username :</label>
									<input class="form-control" id="name" name="myusername" placeholder="" type="text">
								<label>Password :</label>
									<input class="form-control" id="password" name="mypassword" placeholder="" type="password"><br />
								<hr>    
                                    <input class="btn btn-primary" style='width: 100%;' name="submit" type="submit" value=" Login " onclick="this.form.submit()">
                                </div>
                            </a>
                        </div>
                    </div> 
                </div>
            </div>
            <span><?php echo $error; ?></span>
        </form>
        </div>
    </div>

   	</div>

    </body>

</html>