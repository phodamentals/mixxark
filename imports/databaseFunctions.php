<?php


function getColumns($theTable) {

	include("../../cr33den7r@!!$.php");

	$columnsArray = array('');
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	} 
	
	$sql = "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='$theTable'";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
			foreach($row as $field => $value) { 
			  array_push($columnsArray, $value);
	        }       
	    }
	}
	$conn->close();  
    return $columnsArray;
}



function existInDatabase($theVariable, $theTable, $theWhereClause) {

	include("../../cr33den7r@!!$.php");
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "SELECT COUNT($theVariable) AS Count FROM $theTable WHERE $theWhereClause";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    if ($row['Count'] >= 1):
				return true;
			else:
				return false;
			endif;
	    }
	}
			
	$conn->close();  
}

function fetchDatabase($theVariables, $theTable, $theWhereClause) {


	include("../../cr33den7r@!!$.php");
	
	
	$theArray = array('');

	$conn = new mysqli($servername, $username, $password, $dbname);

	$sql = "SELECT $theVariables FROM $theTable WHERE $theWhereClause";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
			foreach($row as $field => $value) { 
			  array_push($theArray, $value);
	        }       
	    }
	}
	$conn->close();  
    return $theArray;
	
	
	}
	
function updateDatebase($theVariables, $theTable, $theWhereClause, $header, $messageType, $message) {
	include("../../cr33den7r@!!$.php");
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "UPDATE $theTable SET $theVariables WHERE $theWhereClause";

	if ($conn->query($sql) === TRUE) {
	    header("Location: $header?message=$messageType$ $message"); 
	} else {
	    echo "Error updating record: " . $conn->error;
	} 
	
	$conn->close();
	
}

function insertDatabase($theColumns, $theValues, $theTable, $header, $messageType, $message) {
	
	include("../../cr33den7r@!!$.php");
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "INSERT INTO $theTable ($theColumns) VALUES ($theValues)";

	if ($conn->query($sql) === TRUE) {
	    header("Location: $header?message=$messageType$ $message"); 
	} else {
	    echo "Error inserting record: " . $conn->error;
	} 
	
	$conn->close();
	
	
}


function deleteDatabase($theTable, $theWhereClause, $header, $messageType, $message) {
	
	include("../../cr33den7r@!!$.php");
	
	$conn = new mysqli($servername, $username, $password, $dbname);
	$sql = "DELETE FROM $theTable WHERE $theWhereClause";

	if ($conn->query($sql) === TRUE) {
	    header("Location: $header?message=$messageType$ $message"); 
	} else {
	    echo "Error deleting record: " . $conn->error;
	} 
	
	$conn->close();
	
	
}




?>