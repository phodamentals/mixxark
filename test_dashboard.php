<?php include 'session.php'; ?>
<!DOCTYPE html>
<html lang="en">


<?php 
  include 'header.php';
	include 'imports/calendar.php';
?>

<script type="text/javascript">
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({html:true}); 
    });

  function reply_click(clicked_id, status)
  {
      var popup = new $.Popup();
      popup.open('loadCalendarDate.php?date=' + clicked_id + '&status=' + status);
  }
</script>


<link href="css/calendar.css" rel="stylesheet">
    <!-- Page Content -->
    <div class="container">
          <?php include 'breadcrumb.php'; ?>

            <div class="col-md-8">
            <div class="panel-heading">
               <h3 class='OswaldFont'>BOOKINGS</h3>
               <hr>
               <?php
              		 $calendar = new Calendar();
              		 echo $calendar->show();
               ?>
            </div>
                        
                        
            </div>
            <div class="col-md-4">
              <div class="panel-heading">
                   <h3 class='OswaldFont'>NEXT 30 DAYS</h3>
               </div>
               <div class="panel-heading">
                   <h4 class='OswaldFont'><i class="fa fa-check-square" aria-hidden="true" style="margin-right: 10px; color: #5cb85c;"></i>CONFIRMED</small></h3>
                   <?php include 'loadConfirmedBookings.php';?>
               </div>
               <div class="panel-heading">
                   <h4 class='OswaldFont'><i class="fa fa-pause-circle-o" aria-hidden="true" style="margin-right: 10px; color: #d0d0d0;"></i>PENDING</h3>
                   <?php include 'loadPendingBookings.php';?>
               </div>
               <div class="panel-heading">
                   <h4 class='OswaldFont'><i class="fa fa-exclamation-triangle" aria-hidden="true" style="margin-right: 10px; color: red;"></i>UNASSIGNED</h3>
                   <?php include 'loadUnassignedBookings.php';?>
               </div>

        </div>
    </body>
<script>
$("#tab_bookings").click(function(){
  $.cookie('accountTab', 'tab_bookings');
});
$("#tab_tracks").click(function(){
  $.cookie('accountTab', 'tab_tracks');
});
$("#tab_profile").click(function(){
  $.cookie('accountTab', 'tab_profile');
});
$("#tab_settings").click(function(){
  $.cookie('accountTab', 'tab_settings');
});
</script>



</html>

