<!-- kendi hostingimizin mail ayarları ile gönderme -->

<?php
try {
    include "connect.php";
    $email=$_POST["email"];
    $sorgu=$baglanti->query("SELECT * FROM users where email='$email' ",PDO::FETCH_ASSOC);
    if($sorgu->rowCount()==0)
    {
     echo "<script>
     alert('Bu e-posta sistemde kayıtlı değil');
     window.location.href='../forgot.php';
     </script>";
    }
    else
    {
        //yeni şifre oluşturma
        $newpassword=rand(1000,9999);
        // PHPMailer dosyamızı çağırıyoruz 
        require_once('PHPMailer/src/PHPMailer.php');
        require_once('PHPMailer/src/SMTP.php');    
        $mail = new PHPMailer\PHPMailer\PHPMailer(); 
        $mail->SMTPKeepAlive = true;   
        $mail->Mailer = "smtp"; // don't change the quotes!
        $mail->IsSMTP();
        $mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
        $mail->Host = "mail.ihmtal.com"; // Mail sunucusuna ismi
        $mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
        $mail->IsHTML(true);
        $mail->SetLanguage("tr", "phpmailer/language");
        $mail->CharSet  ="utf-8";
        $mail->Username = "passwordreset@ihmtal.com"; // Mail adresimizin kullanicı adi
        $mail->Password = "onbira1234567890"; // Mail adresimizin sifresi
        $mail->SetFrom("passwordreset@ihmtal.com", "İhsan Mermerci 11-B Sınıfı Web Grubu"); // Mail attigimizda gorulecek ismimiz
        $mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
        $mail->Subject = "Yeni Şifreniz :"; // Konu basligi
        $mail->Body = $newpassword; // Mailin icerigi
     if(!$mail->Send()){
            echo "<script>
                alert('$mail->ErrorInfo');
                window.location.href='../forgot.php';
                </script>";
        
        } else {
           $hashpass = password_hash($newpassword, PASSWORD_DEFAULT);
           $kayit=$baglanti->prepare('UPDATE users SET password = ? WHERE email = ?');
           $kayit->execute(array($hashpass,$email));
            echo "<script>
                alert('Yeni Şifreniz E-Posta olarak gönderildi');
                window.location.href='../index.php';
                </script>";
        }

    }

}
    catch  (Exception $e) {
        echo "<script>
        alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
        window.location.href='../index.php';
        </script>";    
    }


?>