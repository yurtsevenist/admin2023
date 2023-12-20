<?php
    include "connect.php";
    $id=$_POST["id"];
    $answer=$_POST["answer"];
    $sorgu=$baglanti->prepare("SELECT * FROM messages WHERE id=?");
    $sorgu->execute(array($id));
    foreach($sorgu as $satir)
    {       
    
        $email=$satir["email"]; 
        $mid=$satir["id"];
        $subject=$satir["subject"];
        $message=$satir["message"];                   
    }
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
    $mail->SetFrom("bilgi@ihmtal.com", "İhsan Mermerci 11-B Sınıfı Web Grubu"); // Mail attigimizda gorulecek ismimiz
    $mail->AddAddress($email); // Maili gonderecegimiz kisi yani alici
    $mail->Subject = "Yeni Şifreniz :"; // Konu basligi
    $mail->Body = $answer; // Mailin icerigi
 if(!$mail->Send()){
        echo "<script>
            alert('$mail->ErrorInfo');
            window.location.href='../dashboard.php';
            </script>";
    
    } else {
        $status=1;
       $kayit=$baglanti->prepare('UPDATE messages SET status = ? WHERE id = ?');
        $kayit->execute(array($status,$id));
        $kayit=$baglanti->prepare("INSERT INTO answers SET message_id=?, auth_id=?, answer=?");
        $kayit->execute(array($id,1,$answer));
        echo "<script>
            alert('Cevap kullanıcıya gönderildi.');
            window.location.href='../dashboard.php';
            </script>";
    }



?>