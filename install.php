<?php
require_once "config.php";

$conn = mysqli_connect("$db_host", "$db_username", "$db_password") or die("cannot connect to server");
mysqli_select_db($conn, "$db_name") or die("cannot select DB");
mysqli_set_charset($conn, 'utf8');

$sql = "CREATE TABLE IF NOT EXISTS $tbl_name"
    . "("
    . "   email VARCHAR(100) PRIMARY KEY"
    . " , podpis VARCHAR(100)"
    . " , instytucja VARCHAR(100)"
    . " , tekst VARCHAR(1000)"
    . " , ts DATETIME"
    . " , INDEX (ts)"
    . ")"
    . " CHARACTER SET=utf8";
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "OK";
} else {
    echo "ERROR";
}
mysqli_close($conn);
?>

