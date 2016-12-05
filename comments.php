<?php
require_once "db.php";

$count = isset($_GET["count"]) ? $_GET["count"] : 10;

$comments = get_last_comments($count);

echo json_encode($comments);
?>