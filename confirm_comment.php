<?php
require_once "helper.php";

$params = unpack_params($_GET["a"]);
if (($params == null) || ($params["_s"] !== "new")) {
    echo "cannot parse";
} else {
    $params["_s"] = "confirmed";
    // TODO: build and send e-mail to the moderator
    echo pack_params($params);
}
?>