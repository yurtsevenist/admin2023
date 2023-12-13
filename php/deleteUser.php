<?php
 try{
    include "connect.php";
    $id=$_POST['uid'];
    $email= $_POST['session_email'];
    $sorgu=$baglanti->query("SELECT * FROM users where id='$id' ",PDO::FETCH_ASSOC);
    if($sorgu->rowCount()>0)
    {
        foreach($sorgu as $sor)
        {           
           
            $emailu=$sor["email"];
                   
        }
    }
    if($email==$emailu)
    {
        echo "<script>
        alert('Kendini siliyorsun silemezsin silmemelisin');
        window.location.href='../dashboard.php';
        </script>";
    }
    else
    {
        $kayit=$baglanti->prepare('DELETE FROM users WHERE id = ?');
        $kayit->execute(array($id));
        echo "<script>
        alert('Kullanıcı Silinmiştir');
        window.location.href='../dashboard.php';
        </script>";
    }
   

    
   

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../dashboard.php';
    </script>"; 
 }

?>