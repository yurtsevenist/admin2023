<?php
 try{
    include "connect.php";
    $id=$_POST['id'];

    $kayit=$baglanti->prepare('DELETE FROM messages WHERE id = ?');
    $kayit->execute(array($id));

    echo "<script>
    alert('Mesaj Silinmiştir');
    window.location.href='../dashboard.php';
    </script>";
   

 }
 catch(Exception $e)
 {
    echo "<script>
    alert('Bir Hata meydana geldi Lütfen daha sonra tekrar deneyiniz.');
    window.location.href='../dashboard.php';
    </script>"; 
 }

?>