<div class='pane-content' style='padding: 15px;'>
	<input class="btn btn-primary" name="submit" type="submit" value="Add New DJ" style='width: 100%;'>
</div>	

<div class="panel-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>DJ</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                </tr>
            </thead>
            <tbody>
<?php
	$arrayToEcho = fetchDatabase("USERNAME, FIRST_NAME, LAST_NAME", "USERS", "1=1 AND EMAIL IS NOT NULL");
	$theCount = 0;
	foreach ($arrayToEcho as $item) {
		if(!empty($item)):
			if($theCount == 0){
				echo "<tr>";
			}			
			if($theCount != 2) {
				echo "<td>" . $item . "</td>";
				$theCount++;
			} else {
				echo "<td>" . $item . "</td>";
				echo "</tr>";
				$theCount = 0;
			}				
	    endif;
	} 
?>
            </tbody>
        </table>
    </div>
</div>


