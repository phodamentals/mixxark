<!DOCTYPE html>
<html lang="en">




<?php include 'header.php';?>

    <!-- Page Content -->
    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-lg-12">
             <div class="col-md-6">
            <h3 class='OswaldFont'>FINALIZE BOOKING</h3>
             <hr>
             	<label class='OswaldFont'>BOOKING INFORMATION</label>
             	<?php
             		  $timeArray = array("2400", "0100", "0200","0300", "0400", 
             		  					 "0500","0600", "0700", "0800","0900", 
             		  					 "1000", "1100","1200", "1300", 
             		  					 "1400","1500", "1600", "1700",
             		  					 "1800", "1900", "2000","2100", 
             		  					 "2200", "2300");

             		  $normalTimeArray = array("12:00 AM", "1:00 AM", "2:00 AM","3:00 AM", "4:00 AM", 
             		  					 "5:00 AM","6:00 AM", "7:00 AM", "8:00 AM","9:00 AM", 
             		  					 "10:00 AM", "11:00 AM","12:00 PM", "1:00 PM", 
             		  					 "2:00 PM","3:00 PM", "4:00 PM", "5:00 PM",
             		  					 "6:00 PM", "7:00 PM", "8:00 PM","9:00 PM", 
             		  					 "10:00 PM", "11:00 PM");


                      $theDate = date_create($_POST['date']);

                      if(date_format($theDate, 'm/d/Y') == date('m/d/Y')) {
                        $adjustedDate = date_create(date("m/d/Y"));
                            date_add($adjustedDate,date_interval_create_from_date_string("2 days"));
                        $theDate = $adjustedDate;
                      } 

             		  $startTime = array_search($_POST['startTime'], $timeArray);
					  $endTime = $startTime + $_POST['duration'];

					  if($endTime > 24) {
					  	$endTime = $endTime - 24;
					  }

             		  echo  "<form action='confirmBooking.php' method='post'>";
             		  echo  "<input type='hidden' name='startTime' value=".$timeArray[$startTime]."></input>";
				      echo  "<input type='hidden' name='endTime' value=".$timeArray[$endTime]."></input>";    
				      echo  "<input type='hidden' name='bookDate' value=".date_format($theDate,'Y-m-d')."></input>";

             		  echo "<h2 class='OswaldFont' style='font-size: 22px;'>".date_format($theDate,'D M d, Y')."</br><span style='font-size: 32px;'>".$normalTimeArray[$startTime]." - ". $normalTimeArray[$endTime]."</span></h2>";

             	?>
             </div>
            </div>
         </div>
         <hr>
         <div class="row">
         	<div class="col-lg-12">
         	  <div class="col-md-6">
			<div class="form-group">
                <label class='OswaldFont'>LOCATION</label>
                <input class="form-control" placeholder="Venue Name" name='venue'>
                <label class='OswaldFont'></label>
                <input class="form-control" placeholder="Address" name='address1'>
                <label class='OswaldFont'></label>
                <input class="form-control" placeholder="Suite #"  name='address2'>
            </div>
			<div class="form-group">
                <select class="form-control"  name='state'>
	                <option>Arkansas</option>
	                <option>Kansas</option>
	                <option>Texas</option>
	                <option>Oklahoma</option>
                </select>		
            </div>
            <div class="form-group">
                <input class="form-control" placeholder="City" name='city'>
            </div>  
   			<div class="form-group">
                <input class="form-control" placeholder="Zip Code" name='zip'>
            </div>  
          <hr>
            <div class="form-group">
                <label class="OswaldFont">EMAIL</label><br>
                <input class="form-control" placeholder="john@example.com" name='email'>
            </div>
			<div class="form-group">
			    <label class="OswaldFont">PHONE NUMBER</label><br>
			    <input type="text" class="form-control" style="width: 60px; display: inline;" id="areaCode" name="areaCode" placeholder=""> - 
			    <input type="text" class="form-control" style="width: 70px; display: inline;" id="phone1" name="phone1" placeholder=""> - 
			    <input type="text" class="form-control" style="width: 80px; display: inline;" id="phone2" name="phone2" placeholder="">
			  </div>
			  <div class="form-group">
	                <label class="OswaldFont">COMMENTS / NOTES</label>
	                <textarea class="form-control" rows="3" style="resize: none;"  name='comments'></textarea>
	          </div>
	          <button type="button" class="btn btn-lg btn-primary OswaldFont" style="width: 100%;" onclick="this.form.submit();">CONFIRM & SUBMIT</button                                           
            </div>
            </div>
            </form>


             
        </div>
        </div>
        <!-- /.row -->
        </div>

        </body>

</html>
