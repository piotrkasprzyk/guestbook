<?php
$base_url = "http://localhost:8080/guestbook"; // url prefix on which app is deployed

$db_host = "localhost";
$db_username = "test";
$db_password = "test";
$db_name = "test";
$tbl_name="guestbook";

$email_author = 'Guestbook Admin <guestbook@example.com>';
$moderator_emails = 'moderator@example.com'; // comma-separated list

$secret_string = "1234567890123456789"; // the longer and more random, the better; DO NOT USE THE DEFAULT ONE

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>