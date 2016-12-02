<?php
require_once "config.php";

function send_email($target_email, $subject, $message) {
    global $email_author;

    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

    $headers .= "To: $target_email" . "\r\n";
    $headers .= "From: $email_author" . "\r\n";

    mail($target_email, "=?UTF-8?B?" . base64_encode($subject) . "?=", $message, $headers);
};

function send_confirmation_link($target_email, $params, $link) {
    $text = $params["tekst"];

    $message = "<p>Kliknij w link <a href='$link'>$link</a>, aby dodać poniższy komentarz:</p>"
        . "<p>$text</p>";

    send_email($target_email, "Wpis w księdze pamiątkowej", $message);
};

function send_acceptance_link($params, $link) {
    global $moderator_emails;

    $text = $params["tekst"];
    $email = $params["email"];
    $message = "<p>Kliknij w link <a href='$link'>$link</a>, aby zaakceptować poniższy komentarz, dodany przez "
        . "<i>$email</i>:</p>"
        . "<p>$text</p>"
        . "<p>Aby odrzucić komentarz, po prostu skasuj ten email.</p>";

    send_email($moderator_emails, "Nowy wpis do księgi pamiątkowej", $message);
};
?>