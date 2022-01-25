<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

// config
// smtpサーバーのアカウント
const MAIL_ACCOUNT = 'xxxxxxx@yyyyy.jp';
// smtpサーバーのパスワード
const MAIL_PASS = 'secret';
// smtpサーバーのドメイン名
const SMTP_SERVER = 'smtp.mail.ne.jp';
// ポート番号
const SMTP_PORT = 587;

const FROM_NAME = 'Your Name';   // 差出人の名前
const REPLY_ADDRESS = "getMail@gmail.com, 'Your Name'";
// 返信先 -- 特に指定したい場合

/**
 * @param: string $subject -- 件名
 *         string $body -- メール本文
 *         string $to -- メールの送り先
 *         string $reply -- 返信先を指定することができる。
 */
function mymail($subject, $body, $to, $reply = NULL) {
  $original_encoding = mb_internal_encoding();
  mb_internal_encoding('UTF-8');

  $from = MAIL_ACCOUNT;
  $pass = MAIL_PASS;
  if ($reply = NULL) $reply = REPLY_ADDRESS;

  try {
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = "iso-2022-jp";
    $mail->Encoding = "7bit";
    $mail->Host = SMTP_SERVER;
    $mail->Port = SMTP_PORT;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;  // 'tls'でもOK;
    $mail->SMTPAuth = true;
    $mail->Username = $from;
    $mail->Password = $pass;
    $mail->setFrom($from, mb_encode_mimeheader(FROM_NAME));
    $mail->addReplyTo($reply);
    $mail->addAddress($to);
    $mail->Subject = mb_encode_mimeheader($subject);
    $mail->Body = mb_convert_encoding($body, "JIS", "UTF-8");
    $mail->send();  
    $msg =  '送信しました。';
  }
  catch (Exception $e) {
    $msg = '送信できませんでした。';
    echo "Mailer Error: {$mail->ErrorInfo}";
  }
  mb_internal_encoding($original_encoding);
  return $msg;
}

$subject = "テストメール6";
$to = "xxxxxx@gmail.com";             // 送り先メールアドレス
$body = "これはテストメール6です。\n";

$msg = mymail($subject, $body, $to);
echo $msg;

/********************************************
   (参考)
   https://github.com/PHPMailer/PHPMailer
 ********************************************/

// 修正時刻: Tue Jan 25 20:07:33 2022
