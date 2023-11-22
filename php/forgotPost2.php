<!-- mailtrap.io ile gönderme -->


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
        $phpmailer = new PHPMailer\PHPMailer\PHPMailer(); 
        $phpmailer->isSMTP();
        $phpmailer->Host = 'smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = '1b6de7406b831c';
        $phpmailer->Password = '813c1cc4dbe19b'; 
        $phpmailer->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj    
        $phpmailer->IsHTML(true);
        $phpmailer->SetLanguage("tr", "phpmailer/language");
        $phpmailer->CharSet  ="utf-8";    
        $phpmailer->SetFrom("info@ihmtal.com", "İhsan Mermerci Web Grubu"); // Mail attigimizda gorulecek ismimiz
        $phpmailer->AddAddress($email); // Maili gonderecegimiz kisi yani alici
        $phpmailer->Subject = "Mesajınıza Cevap Verilmiştir"; // Konu basligi
        $phpmailer->Body = $cevap; // Mailin icerigi
            if(!$phpmailer->Send()){   
       
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