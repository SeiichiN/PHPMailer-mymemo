<?php
require_once ('vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;

const GMAIL_ACCOUNT = 'XXXXXX@gmail.com';  // gmailアカウント
const GMAIL_PASS = 'YYYYYYYY';             // gmailパスワード
const SMTP_SERVER = 'smtp.gmail.com';
const SMTP_PORT = 587;

const FROM_NAME = '(Your Name)';           // 差出人の名前
const REPLY_ADDRESS = "ZZZZZZZ@example.com, 'Your Name'";
                                    // 返信先 -- 特に指定したい場合

/**
 * @params: string $subject
 *          string $body
 *          string $to -- send to.
 *          string $reply -- 返信先。もし引数が指定されなかったらNULL。
 * @return:
 *         boolean TRUE.
 *       
 */
function gmail($subject, $body, $to, $reply = NULL) {
	$from = GMAIL_ACCOUNT;
	$pass = GMAIL_PASS;
	if ($reply == NULL) $reply = REPLY_ADDRESS; // あるいは $from;
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->CharSet = 'utf-8';
	$mail->Host = SMTP_SERVER;
	$mail->Port = SMTP_PORT;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = $from;
	$mail->Password = $pass;
	$mail->setFrom($from, FROM_NAME);
	$mail->addReplyTo($reply);
	$mail->addAddress($to);
	$mail->Subject = $subject;
	$mail->Body = $body;
	return $mail->send();
}

$subject = "テストメール";
$to = "DDDDDDD@example.com";    // 送り先メールアドレス
$body = "これは、テストメールです。\n";

if (gmail($subject, $body, $to)) {
    echo "メールを送信しました。\n";
} else {
    echo "メール送信に失敗しました。\n";
}

/****************************************
 （参考）
 https://github.com/PHPMailer/PHPMailer
****************************************/
