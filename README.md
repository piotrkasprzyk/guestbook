# Simple guestbook

A simple php/mysql guestbook application with minimal database usage and two-step acceptance process. Basic intended flow:

 1. User fills out `form.html`.
 2. `create_comment.php` uses data entered into form to create a URL which user has to access to confirm their entry (by default, the link is sent via mail using `mail_templates.php`).
 3. `config_comment.php` verifies the entry data from URL params and forwards the entry to a moderator (again, the link is sent via mail using `mail_templates.php`), who makes the final decision (again, by accessing a link).
 4. `accept_comment.php` verifies the accepted entry data from URL params and only then stores it in the DB.

`form.html`, as well as messages in `send_confirmation_link` and `send_acceptance_link` of `mailer.php`, are pretty minimal and intended to be edited.

`config.php` stores the DB access info and a secret used to generate links, while `install.php` can be used to create a table in the DB.

Caveat: some user-facing data is in Polish, because I can.