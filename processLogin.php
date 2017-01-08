<?php
session_start();

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="OaRkF9Idb3"; // Mysql password 
$db_name="mixxark"; // Database name 

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypassword=trim($_POST['mypassword']); 

// To protect MySQL injection (more detail about MySQL injection)

$sql="SELECT * FROM USERS WHERE USERNAME='$myusername' and PASSWORD='".md5($mypassword)."'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){
$_SESSION['login_user'] = $myusername;
setcookie('activeLink', 'account', time() + 1800, "/"); 
header ('Location: artist/account.php');

}
else {
echo "Wrong Username or Password".md5($mypassword);

}
?>



