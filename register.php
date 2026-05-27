<?php
session_start();
require('datacon.php');

// Retrieve data from the form
$name = $_POST['txtName'];
$mail = $_POST['txtEmail'];
$mobile = $_POST['txtPhn'];
$add = $_POST['txtAdd'];
$pass = $_POST['txtPassword'];

extract($_REQUEST);

if (isset($_POST['btnsubmit'])) {
    
    $sql = "INSERT INTO customers (name, email, phone, address, password) VALUES ('$name', '$mail', '$mobile', '$add', '$pass')";
    mysqli_query($conn, $sql) or die("error in insertion");
    echo "Record Inserted";
}
?>