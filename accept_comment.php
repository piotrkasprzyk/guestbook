<?php
require_once "config.php";
require_once "helper.php";

$params = unpack_params($_GET["a"]);
if (($params == null) || ($params["_s"] !== "confirmed")) {
    echo "cannot parse";
} else {

    $conn = mysqli_connect("$host", "$username", "$password") or die("cannot connect to server");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");
    mysqli_set_charset($conn, 'utf8');

    $email = mysqli_real_escape_string($conn, $params["email"]);
    $instytucja = mysqli_real_escape_string($conn, $params["instytucja"]);
    $tekst = mysqli_real_escape_string($conn, $params["tekst"]);

    $sql = "INSERT INTO $tbl_name(email, instytucja, tekst) VALUES ('$email', '$instytucja', '$tekst')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "success";
    } else {
        echo "ERROR";
    }
    mysqli_close($conn);
}
?>