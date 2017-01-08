<?php include $_SERVER['DOCUMENT_ROOT'] . '/session.php'; ?>
<div class='pane-content' style="max-width: 640px;">
    <h4>Update Public Profile</h4>
        <p>Edit what will be seen on the front page. Let everyone know what you're style is about!</p> 
		<form action="../processUpdateProfile.php" method="post">

			<label>Bio :</label>
				<textarea class="form-control" rows="4" cols="150" id="bio" name="bio" style="resize: none; margin-bottom: 20px;" placeholder="<?php echo $currentBio;?>" ></textarea>
            <label>Genres :</label>
                <input style='margin-bottom: 20px;' class="form-control" id="tags" name="tags" placeholder="<?php echo $currentGenres;?>" type="text">			
            <h4>Network</h4>
            <label>Facebook :</label>
                <input style='margin-bottom: 5px;' class="form-control" id="facebook" name="facebook" placeholder="<?php echo $currentFacebook;?>" type="type">
            <label>Soundcloud :</label>
                <input style='margin-bottom: 5px;' class="form-control" id="soundcloud" name="soundcloud" placeholder="<?php echo $currentSoundcloud;?>" type="type">     
            <label>Instagram :</label>
                <input style='margin-bottom: 5px;' class="form-control" id="instagram" name="instagram" placeholder="<?php echo $currentInstagram;?>" type="type">
            <label>Twitter :</label>
                <input style='margin-bottom: 5px;' class="form-control" id="twitter" name="twitter" placeholder="<?php echo $currentTwitter;?>" type="type">                                          
			<hr>    
                <input class="btn btn-primary" name="submit" type="submit" value="Update Profile" onclick="this.form.submit()">

        </form>
</div>