# PHPMailer-mymemo
My memo of PHPMailer

これは、PHPMailerを使うためのメモです。

使おうとするたびに、PHPMailerのGitを見たり、他の人のサイトを見たりしていたので、自分のためにここにメモをおきます。

1. composer のインストール

  [windows用](https://getcomposer.org/doc/00-intro.md#installation-windows)

2. PHPMailerのインストール

```
$ composer require phpmailer/phpmailer
```

3. mymail.php の中の必要事項を記述。

4. 以下のコマンドを入力する。

```
$ php mymail.php
```

これで、無事にメールが送信できればＯＫ。

（配布元）https://github.com/PHPMailer/PHPMailer


## 参考URL

#### composer-URL

https://getcomposer.org/doc/00-intro.md#installation-windows

ここから Composer-Setup.exe をダウンロードして、インストールする。


#### PHPMailer-URL

https://github.com/PHPMailer/PHPMailer


#### gmailのsmtpサーバを使ってメール発信(PHPMailer) 
http://kanako.s500.xrea.com/nukblog/show.rhtml?id=526


#### 「PHPMailer」に深刻な脆弱性 - 過去修正済みの脆弱性が再発
https://www.security-next.com/126123


#### PHPMailerでメールをSTMP送信する
https://qiita.com/e__ri/items/857b12e73080019e00b5


#### PHPMailer の使い方
https://www.webdesignleaves.com/pr/php/php_phpmailer.php

