<?php

error_reporting(-1);

//include($_SERVER['DOCUMENT_ROOT']."/common/config.php");
include($_SERVER['DOCUMENT_ROOT']."/imports/databaseFunctions.php");
//include($_SERVER['DOCUMENT_ROOT']."/common/session.php");

echo "Yoooooo!";
echo "<p><b>Fetch Columns In a Table.<br></b></p>";
$arrayOfColumns = getColumns("USERS");
	foreach ($arrayOfColumns as $columns) {
		if(!empty($columns)):
			echo $columns ."</br>";
	    endif;
	} 

echo "<p><b>Check if an item exist in Database.</b></p>";
	if(existInDatabase("USERNAME", "USERS", "USERNAME='pourit'")):
		echo "True!";
	else:
		echo "False!";
	endif;


echo "<p><b>Fetch Items in a Database. <br></b></p>";
$arrayToEcho = fetchDatabase("USERNAME, BIO, GENRES", "USERS", "USERNAME='pourit'");
	foreach ($arrayToEcho as $item) {
		if(!empty($item)):
			echo $item ."<br> ";
	    endif;
	} 
	
	
echo "<p>";

?>