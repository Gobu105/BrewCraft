<?php
session_start();

$uname=$_POST['txtEmail'];
$pass=$_POST['txtPassword'];

require('datacon.php');

$tbl_name="customers"; // Table name

mysqli_select_db($conn,"$database")or die("cannot select DB");


$sql="SELECT * FROM $tbl_name WHERE email='$uname' and password='$pass'";
echo "$sql";

$result=mysqli_query($conn,$sql);

//$row=mysql_fetch_array($result);

//echo "\n\n ..nam..".$row['f_name']."\n\n ..pass..".$row['password'];

if(mysqli_num_rows($result) < 1)
{
	echo " .... LOGIN TRY  ....";
	$_SESSION['error'] = "1";
	header("location:login1.php"); //
}
else
{
	$_SESSION['name'] = $uname; // Make it so the username can be called by $_SESSION['name']    //
	echo " ....   LOGIN  ....";
	echo $_SESSION['name'];
	header("location:index.php");    //
}

?>

	