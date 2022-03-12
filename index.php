<?php 
  $id=isset($_GET['dosya']) ? (int)$_GET['dosya'] : NULL;
	  if($id== NULL)
	  {
	  	header("Content-Type:text/html;charset=utf8");
	  	echo '<script type="text/javascript">alert(\'Dosya İndirdiğinize Emin Misiniz?\');</script>';
	  }
	  else
	  {
	  	require_once 'admin/siniflar/veritabani.class.php';
	  	require_once 'admin/siniflar/site.class.php';
	  	$site = new Site;
	  	$dosya= $site->dosya($id);

$klasor_yolu='uploads/';

$dosya_isim=$dosya->dosya_adi;
$ek='scolgecen.com';
$dosya_base=substr($dosya_isim,0,strlen($ek)) == $ek ? $dosya_isim :$ek.'-'.$dosya_isim;
//$dosya_base='siberteknoloji.com-'.$dosya_isim;
$indirme_yolu=$klasor_yolu.$dosya_isim;
header("Expires: 0");
header("Last-Modified:".gmdate("d/m/Y H.i")." GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-chech=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Type: aplication/zip");
header("Content-Length:123456789");
header("Content-Disposition:attachment;filename=".basename($dosya_base));
$site->guncelle('dosyalar','dosya_indirilme=dosya_indirilme+1',"dosya_id='".$id."'");
readfile($indirme_yolu);
exit();
 }
?>