<?php
 try {
    include "connect.php";
     $name=$_POST['name'];
     $email=$_POST['email'];
     $password=$_POST['password'];
     $password_confirmation=$_POST['password_confirmation'];
     //şifre 4 karakterden küçükmü kontrol ediyoruz
     if(strlen($password)<4)
     {
      
      echo "<script>
      alert('Şifreniz 4 Karakterden Küçük Olamaz');
      window.location.href='../register.php';
      </script>";
     }
     //şifre ve şifre doğrulama alanları aynımı
     if($password!=$password_confirmation)
     {
        echo "<script>
        alert('Şifre ve şifre doğrulama alanları uyuşmuyor');
        window.location.href='../register.php';
        </script>";
     }
     //bu email daha önce kayıt olmuşmu
     $sorgu=$baglanti->query("SELECT * FROM users where email='$email' ",PDO::FETCH_ASSOC);
     if($sorgu->rowCount()>0)
     {
      echo "<script>
      alert('Bu eposta daha önce kullanılmıştır');
      window.location.href='../register.php';
      </script>";
     }
     //üyeyi kaydet
     $hashpass = password_hash($password, PASSWORD_DEFAULT);
     $kayit=$baglanti->prepare("INSERT INTO users SET name=?, email=?, password=?");
     $kayit->execute(array($name,$email,$hashpass));
     echo "<script>
     alert('Kayıdınız Tamamlanmıştır E-Posta ve Şifreniz ile giriş yapabilirsiniz');
     window.location.href='../index.php';
     </script>";


 }
 catch (Exception $e) {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../register.php';
    </script>";    
 }



?>