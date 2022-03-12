<?php require_once 'header.php'; ?>
    <h3>Kullanıcılar</h3>
    <div class="sag_icerik">
    <table class="dosyalar">
    	<tr>
    		<th width="5%">ID</th>
    		<th width="20%">Kullanıcı Adı</th>
    		<th width="20%">Kullanıcı Yetki</th>
    		<th width="15%">Kayıt tarihi</th>
    		<th width="10%">Detay</th>
    	</tr>
    	<?php $kullanicilar=$site->kullanicilar(0,25);
        if(count($kullanicilar)>0):
    	foreach ($kullanicilar as $kullanici) {?>
    	<tr>
    		<td><?=$kullanici->kullanici_id;?></td>
    		<td><?=$kullanici->kullanici_adi;?></td>
    		<td><?=$kullanici->kullanici_yetki;?></td>
    	
    		<td><?=$kullanici->kullanici_kayit_tarih;?></td>
    		
    		<td><a href="kullanici.php?id=<?=$kullanici->kullanici_id;?>"><img src="images/detay.png" height="25"></a></td>
    	</tr>
    	<?php } else: ?>
        <tr><td colspan="6" align="center">Hiç Kullanıcı Eklenmemiş</td></tr>	
        <?php endif;?>
    </table> 
    </div>
 <?php require_once 'footer.php';?>