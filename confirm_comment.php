<?php
require_once "helper.php";
require_once "mailer.php";

$params = unpack_params($_GET["a"]);
if (($params == null) || ($params["_s"] !== "new")) {
    echo "Incorrect link parameters";
    http_response_code(400);
} else {
    $params["_s"] = "confirmed";
    $link = $base_url . '/accept_comment.php?a=' . pack_params($params);

    send_acceptance_link($params, $link);
};
?>