<?php
require_once "helper.php";
require_once "mailer.php";
require_once "db.php";

$params = array(
    "tekst"=>$_POST["tekst"],
    "email"=>$_POST["email"],
    "instytucja"=>$_POST["instytucja"]
);

$params["_s"] = "new";
$link = $base_url . '/confirm_comment.php?a=' . pack_params($params);

// one comment per email
if (!email_exists($_POST["email"])) {
    send_confirmation_link($_POST["email"], $params, $link);
};
?>