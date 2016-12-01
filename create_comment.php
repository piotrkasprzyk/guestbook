<?php
require_once "helper.php";

$params = array(
    "tekst"=>$_POST["tekst"],
    "email"=>$_POST["email"],
    "instytucja"=>$_POST["instytucja"]
);

$params["_s"] = "new";

// TODO: build and send e-mail to the author
echo pack_params($params);

?>