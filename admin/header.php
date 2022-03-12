<?php 
require_once 'config.php';

if(Login::girisKontrol()!= true){
    header('location:login.php');
}
?>
<!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
    <title>
        Admin Paneli- scolgecen.com
    </title>
    </head>
    <body>
    <div id="cerceve">
        <div id="ust_kisim"> Admin Paneli- serdarcolgecen.com</div>
        <div id="icerik">
            <div id="sol_kisim">
                <ul class="menu">
                    <li><a href="index.php">Anasayfa</a></li>
                    <li><a href="ayarlar.php">Ayarlar</a></li>
                    <li><a href="kullanici_ekle.php">Kullanıcı Ekle</a></li>
                    <li><a href="kullanicilar.php">Kullanıcılar</a></li>
                    <li><a href="yukle.php">Dosya Yükle</a></li>
                    <li><a href="dosyalar.php">Yüklenen Dosyalar</a></li>
                    <li><a href="cikis_yap.php">Çıkış Yap</a></li>
                    
                </ul>
            </div>
            <div id="sag_kisim">