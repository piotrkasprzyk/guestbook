<?php
require_once "helper.php";
require_once "mailer.php";

$params = array(
    "tekst"=>$_POST["tekst"],
    "email"=>$_POST["email"],
    "instytucja"=>$_POST["instytucja"]
);

$params["_s"] = "new";
$link = $base_url . '/confirm_comment.php?a=' . pack_params($params);

send_confirmation_link($_POST["email"], $params, $link);
?>