
<?php

    include("../../cr33den7r@!!$.php");

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT BOOKNUM, BOOKDATE, VENUE, STARTTIME, EMAIL FROM BOOKINGS WHERE 1=1 AND STATUS='Pending' AND USERNAME='".$user_check."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>VENUE</th>
                                <th><i class="fa fa-clock-o" aria-hidden="true"></i> TIME</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';
        echo "<h3 class='OswaldFont'>PENDING</h3>";
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $bookDate = date_create($row["BOOKDATE"]);
            $starTime = date_create($row["STARTTIME"]);
            $weekDaysArray = ['Mon', 'Tues','Wed','Thur','Fri','Sat','Sun'];
            echo "<tr>";
            echo "<td><small>" . $weekDaysArray[date_format($bookDate, "w")] . " " . date_format($bookDate, "M, j"). "</small></td>";
            echo "<td>" . $row['VENUE'];
            echo "<td>" . date_format($starTime, "g:i a"). "</td>";
            echo "<form action='processAcceptGig.php' method='post'>";
            echo "<input type='hidden' name='email' value='".$row["EMAIL"]."'>";
            echo "<input type='hidden' name='booknum' value='".$row["BOOKNUM"]."'>";
            echo "<input type='hidden' name='user' value='".$user_check."'>";
            echo "<td><button type='button' class='btn btn-success OswaldFont' onclick='this.form.submit()'>ACCEPT</button></td>";
            echo "</form>";
            echo "</tr>";
        }
        
    } else {
    // do nothing.
    }

    $conn->close();

    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "SELECT BOOKDATE, VENUE, STARTTIME FROM BOOKINGS WHERE 1=1 AND STATUS='Confirmed' AND USERNAME='".$user_check."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>DATE</th>
                                <th>VENUE</th>
                                <th><i class="fa fa-clock-o" aria-hidden="true"></i> TIME</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>';        
        echo "<h3 class='OswaldFont'>CONFIRMED</h3>";
        // output data of each row
        while($row = $result->fetch_assoc()) {

            $bookDate = date_create($row["BOOKDATE"]);
            $starTime = date_create($row["STARTTIME"]);
            $weekDaysArray = ['Mon', 'Tues','Wed','Thur','Fri','Sat','Sun'];
            echo "<tr>";
            echo "<td><small>" . $weekDaysArray[date_format($bookDate, "w")] . " " . date_format($bookDate, "M, j"). "</small></td>";
            echo "<td>" . $row['VENUE'];
            echo "<td>" . date_format($starTime, "g:i a"). "</td>";
            echo "</tr>";
        }
        
    } 
    $conn->close();

?>
            </tbody>
        </table>
    </div>
</div>


