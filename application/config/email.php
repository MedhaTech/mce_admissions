<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$config['protocol'] = 'smtp'; // The mail sending protocol: mail, sendmail, or smtp

$config['smtp_host'] = 'smtp.gmail.com'; // SMTP Server Address
$config['smtp_user'] = 'noreply@mcehassan.ac.in'; // SMTP Username
$config['smtp_pass'] = 'Malnad@2024'; // SMTP Password
$config['smtp_port'] = 587; // SMTP Port
$config['smtp_crypto'] = 'tls'; // SMTP Encryption: tls or ssl

$config['mailtype'] = 'html'; // Mail format: text or html
$config['charset'] = 'utf-8'; // Character set: utf-8, iso-8859-1, etc.
$config['newline'] = "\r\n"; // Newline character sequence: "\r\n" or "\n" or "\r"

$config['wordwrap'] = TRUE; // Wordwrap: TRUE or FALSE
$config['crlf'] = "\r\n"; // Carriage Return and Line Feed: "\r\n" or "\n" or "\r"

$config['validate'] = TRUE; // Whether to validate the email address before sending: TRUE or FALSE
$config['priority'] = 3; // Email Priority: 1 for highest priority, 5 for lowest, 3 is normal

$config['smtp_timeout'] = 30; // SMTP Timeout in seconds

$config['useragent'] = 'CodeIgniter'; // Mail user-agent string

$config['smtp_keepalive'] = TRUE; // Enable persistent SMTP connections: TRUE or FALSE

$config['bcc_batch_mode'] = FALSE; // Enable BCC Batch Mode: TRUE or FALSE
$config['bcc_batch_size'] = 200; // Number of emails in each BCC batch
