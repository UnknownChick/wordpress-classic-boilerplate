<?php defined('ABSPATH') || die();

add_action('phpmailer_init', function ($phpmailer) {
    $phpmailer->isSMTP();
    $phpmailer->Host = SMTP_HOST;
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = SMTP_PORT;
    $phpmailer->Username = SMTP_USERNAME;
    $phpmailer->Password = SMTP_PASSWORD;
    $phpmailer->SMTPSecure = 'tls';

    $phpmailer->From = SMTP_FROM;
    $phpmailer->FromName = SMTP_FROM_NAME;
    $phpmailer->addReplyTo(SMTP_FROM, SMTP_FROM_NAME);

    if (SMTP_DEBUG != 0) {
        $phpmailer->SMTPDebug = SMTP_DEBUG;
        $phpmailer->Debugoutput = function ($str, $level) {
            echo "PHPMailer debug level $level: $str\n";
        };
    }
});
