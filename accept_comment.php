<?php
require_once "helper.php";
require_once "config.php";
require_once "db.php";

$params = unpack_params($_GET["a"]);
if (($params == null) || ($params["_s"] !== "confirmed")) {
    echo "Incorrect link parameters";
    http_response_code(400);
} else {
    create_entry($params["email"], $params["instytucja"], $params["tekst"]);
};
?>