<?php
$servername = "localhost";
$username = "root";
$password = "";
try {
  $baglanti = new PDO("mysql:host=$servername;dbname=webproje;charset=utf8", $username, $password);
  $baglanti->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 
} catch(PDOException $e) {
    echo "<script>
    alert('Veri Tabanı Bağlantı Hatası');
    window.location.href='../index.php';
    </script>"; 
}
?>