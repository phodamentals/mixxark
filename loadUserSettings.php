<div class='pane-content'>
    <h4>Change Account Settings</h4>
		<form action="../processUpdateUser.php" method="post">

			<label>Username :</label>
				<input style="margin-bottom: 20px;" class="form-control" id="name" name="myusername" placeholder="<?php echo $currentUser;?>" type="text" disabled>
            <label>Email :</label>
                <input style="margin-bottom: 20px;" class="form-control" id="email" name="myemail" placeholder="<?php echo $currentEmail;?>" type="text">			
            <h4>Change Password</h4>
            <label>Enter New Password :</label>
                <input class="form-control" id="password" name="newpassword" placeholder="" type="password">
			<hr>    
                <input class="btn btn-primary" name="submit" type="submit" value="Save Settings" onclick="this.form.submit()">

        </form>
</div>