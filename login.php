<?php
require 'PHPmailer/class.phpmailer.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];

    // Autentikasi pengguna di sini (cek email dan kata sandi)

    if (authentikasi_pengguna($user_email, $user_password)) {
        // Simpan data pengguna yang berhasil login (misalnya, $user_email) ke dalam variabel

        // Konfigurasi PHPMailer
        $mail = new PHPMailer;
        $mail->IsMail(true); // SMTP
        $mail->Host= "mail.kindastream.id"; // Ganti dengan host SMTP yang sesuai
        $mail->SMTPAuth = true;
        $mail->Username = 'mailcoba@kindastream.id'; // Ganti dengan alamat email pengirim
        $mail->Password = 'Jancok01@'; // Ganti dengan kata sandi email pengirim
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Pengirim email
        $mail->setFrom('mailcoba@kindastream.id', 'user'); // Ganti dengan alamat email dan nama pengirim
        $mail->addAddress('muhammadyoviers@gmail.com'); // Ganti dengan alamat email penerima
        $mail->isHTML(true);

        // Subjek dan isi pesan
        $mail->Subject = 'Notifikasi Login Berhasil';
        $mail->Body = 'Pengguna dengan email ' . $user_email . ' berhasil login pada ' . date('Y-m-d H:i:s');

        if ($mail->send()) {
            echo 'Email notifikasi berhasil dikirim.';
        } else {
            echo 'Gagal mengirim email notifikasi: ' . $mail->ErrorInfo;
        }
    } else {
        echo 'Autentikasi gagal, silakan coba lagi.';
    }
}

function authentikasi_pengguna($email, $password) {
    // Logika autentikasi pengguna di sini
    return true; // Ganti dengan logika autentikasi sesungguhnya
}

echo"<br/><br/><center><h3>email telah terkirim</h3></center>";
?>
