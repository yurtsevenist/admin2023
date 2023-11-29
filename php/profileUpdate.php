<?php
try {
    include "connect.php";
    $name=$_POST['name'];
    $id=$_POST['id'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password_confirmation=$_POST['password-confirmation'];
    if(strlen($password)<4)
     {
      
      echo "<script>
      alert('Şifreniz 4 Karakterden Küçük Olamaz');
      window.location.href='../profile.php';
      </script>";
     }
     //şifre ve şifre doğrulama alanları aynımı
     if($password!=$password_confirmation)
     {
        echo "<script>
        alert('Şifre ve şifre doğrulama alanları uyuşmuyor');
        window.location.href='../profile.php';
        </script>";
     }
     $sorgu=$baglanti->query("SELECT * FROM users where id='$id' ",PDO::FETCH_ASSOC);
     if($sorgu->rowCount()>0)
     {
       
        foreach($sorgu as $sor)
        {           
            $id=$sor["id"];
            $name=$sor["name"];
            $pass=$sor["password"];
            $emailu=$sor["email"];
            $who=$sor["who"];          
        }
        if($emailu!=$email)
        {
            echo "<script>
            alert('E-Posta adresi değiştirilemez');
            window.location.href='../profile.php';
            </script>"; 
        }
        if (password_verify($password, $pass))
        {
            echo "<script>
            alert('Şifreniz bir önceki şifrenizden farklı olmalıdır');
            window.location.href='../profile.php';
            </script>";
        }
         $hashpass = password_hash($password, PASSWORD_DEFAULT);
            $kayit=$baglanti->prepare('UPDATE users SET password = ?,name=? WHERE email = ?');
            $kayit->execute(array($hashpass,$name,$email));
            $sorgu=$baglanti->query("SELECT * FROM users where email='$email' ",PDO::FETCH_ASSOC);
            echo "<script>
            alert('Şifreniz Güncellendi');
            window.location.href='../profile.php';
            </script>";
        
        

     }
     else
     {
        echo "<script>
        alert('E-Posta sistemde bulunamadı');
        window.location.href='../profile.php';
        </script>";
     }

    
}catch  (Exception $e) {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../profile.php';
    </script>";  
}



?>