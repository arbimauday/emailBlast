<?php
require 'PHPMailer/PHPMailerAutoload.php';
$mail = new PHPMailer;

// Konfigurasi SMTP
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = ''; /* user pengirim (akun gmail)*/
$mail->Password = ''; /* password gmail */
$mail->SMTPSecure = 'tls';
$mail->Port = 587;

$mail->setFrom('arbimauday@gmail.com', 'GX-Account');
$mail->addReplyTo('arbimauday@gmail.com', 'GX-Account');

// Menambahkan penerima
$mail->addAddress('arbi@globalxtreme.net');

// Menambahkan beberapa penerima
//$mail->addAddress('penerima2@contoh.com');
//$mail->addAddress('penerima3@contoh.com');

// Menambahkan cc atau bcc 
$mail->addCC('kevin@globalxtreme.net');
$mail->addBCC('arbimauday101@gmail.com');

// Subjek email
$mail->Subject = 'GX ACCOUNT-'. time();

// Mengatur format email ke HTML
$mail->isHTML(true);

// Konten/isi email
$mailContent = file_get_contents('account.html');

$mail->Body = $mailContent;

// Menambahakn lampiran
//$mail->addAttachment('lmp/file1.pdf');
//$mail->addAttachment('lmp/file2.png', 'nama-baru-file2.png'); //atur nama baru

// Kirim email
if(!$mail->send()){
    echo 'Pesan tidak dapat dikirim.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}else{
    echo 'Pesan telah terkirim';
}