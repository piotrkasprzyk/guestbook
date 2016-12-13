<?php
require_once "helper.php";
require_once "mailer.php";
require_once "db.php";

if (!isset($_POST["tekst"]) || !isset($_POST["email"]) || !isset($_POST["instytucja"])) {
    echo "Incorrect arguments";
    http_response_code(400);
    return;
}

$params = array(
    "tekst"=>$_POST["tekst"],
    "email"=>$_POST["email"],
    "instytucja"=>$_POST["instytucja"],
    "timestamp"=>time()
);

if (is_inappropriate($_POST["tekst"])) {
    echo "Banned word used";
    http_response_code(400);
    return;
}

$params["_s"] = "new";
$link = $base_url . '/confirm_comment.php?a=' . pack_params($params);

// one comment per email address
if (!email_exists($_POST["email"])) {
    send_confirmation_link($_POST["email"], $params, $link);
    echo "OK";
};
?>