<?php
require_once "config.php";

function begin_conn() {
    global $db_host, $db_username, $db_password, $db_name;
    $conn = mysqli_connect("$db_host", "$db_username", "$db_password") or die("cannot connect to server");
    mysqli_select_db($conn, "$db_name") or die("cannot select DB");
    mysqli_set_charset($conn, 'utf8');
    return $conn;
}

function end_conn($conn) {
    mysqli_close($conn);
}

function email_exists($email) {
    global $tbl_name;

    $conn = begin_conn();

    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT count(*) AS c FROM $tbl_name WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    $count = 0;
    foreach ($result as $row) {
        $count = $row["c"];
        break; // count returns only 1 row
    }

    end_conn($conn);

    return $count > 0;
};


function get_last_comments($count) {
    global $tbl_name;

    $conn = begin_conn();

    $sql = "SELECT email, instytucja, tekst FROM $tbl_name ORDER BY ts DESC LIMIT $count";
    $result = mysqli_query($conn, $sql);

    $comments = [];
    foreach ($result as $row) {
        array_push($comments, $row);
    }

    end_conn($conn);

    return $comments;
};

function create_entry($email, $instytucja, $tekst) {
    global $tbl_name;

    $conn = begin_conn();

    $email = mysqli_real_escape_string($conn, $email);
    $instytucja = mysqli_real_escape_string($conn, $instytucja);
    $tekst = mysqli_real_escape_string($conn, $tekst);

    $sql = "INSERT INTO $tbl_name(email, instytucja, tekst) VALUES ('$email', '$instytucja', '$tekst')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "success";
    } else {
        echo "ERROR";
    };

    end_conn($conn);
};



?>