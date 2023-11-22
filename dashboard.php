<?php
session_start();
if(!(isset($_SESSION['access_key']) && $_SESSION["access_key"]=="abcd1234"))
{
    //eğer oturum açma yetkisi yoksa
    echo "<script>
    alert('Yetkiniz olmayan bir alana erişmek istiyorsunuz lütfen önce Oturum Açın');
    window.location.href='index.php';
    </script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <h1>Burası yönetici sayfası</h1> 
</body>
</html>