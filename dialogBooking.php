<!DOCTYPE html>
<html lang="en">

<?php 

$date=date_create(date("m/d/Y"));
date_add($date,date_interval_create_from_date_string("2 days"));

echo " <div class='container' style='max-width: 252px;'>
        <form action='completeBooking.php' method='post'>
        <div class='row'>
            <div class='col-lg-12 text-center'>
                <h1 class='OswaldFont'>Book a DJ</h1>
                <hr>
                <h3 class='OswaldFont'>Select a Date</h3>             
                <input class='form-control datepicker' data-date-format='mm/dd/yyyy' placeholder='". date_format($date,"m/d/Y")."' style='font-size: 24px !important;text-align:center !important' name='date'>
                <h3 class='OswaldFont'>Start Time</h3>             
                <select class='form-control' style='font-size: 19px !important;text-align:center !important;' name='startTime'>
                    <option value='0600'>6 AM</option>
                    <option value='0700'>7 AM</option>
                    <option value='0800'>8 AM</option>
                    <option value='0900'>9 AM</option>
                    <option value='1000'>10 AM</option>
                    <option value='1100'>11 AM</option>
                    <option value='1200'>12 PM</option>
                    <option value='1300'>1 PM</option>
                    <option value='1400'>2 PM</option>
                    <option value='1500'>3 PM</option>   
                    <option value='1600'>4 PM</option>
                    <option value='1700'>5 PM</option>
                    <option value='1800'>6 PM</option>
                    <option value='1900'>7 PM</option>
                    <option value='2000'>8 PM</option>          
                    <option value='2100'>9 PM</option>
                    <option value='2200'>10 PM</option>
                    <option value='2300'>11 PM</option>      
                    <option value='2400'>12 AM</option>                                                                      
                </select>
                <h3 class='OswaldFont'>Duration</h3>             
                <select class='form-control' style='font-size: 19px !important;text-align:center !important;' name='duration'>
                    <option value='1'>1 Hour</option>
                    <option value='2'>2 Hours</option>
                    <option value='3'>3 Hours</option>
                    <option value='4'>4 Hours</option>
                    <option value='5'>5 Hours</option>
                    <option value='6'>6 Hours</option>
                    <option value='7'>7 Hours</option>
                    <option value='8'>8 Hours</option>
                    <option value='9'>9 Hours</option>
                    <option value='10'>10 Hours</option>   
                    <option value='11'>11 Hours</option>
                    <option value='12'>12 Hours</option>                                                                   
                </select>    
                <hr>
                <button type='button' class='btn btn-lg btn-primary' style='width: 90%;' onclick='this.form.submit();'>Next!</button>                                
			</div>
        </div>
        </form>
    </div>";


?>

<script>
var d = new Date();
d.setDate(d.getDate() + 2);
	  
$('.datepicker').datepicker({
	autoclose: true,
	startDate: d
});

</script>

</body>

</html>
