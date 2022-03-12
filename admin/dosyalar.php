<?php require_once 'header.php'; ?>
    <h3>Yüklenen Dosyalar</h3>
    <div class="sag_icerik">
    <table class="dosyalar">
    	<tr>
    		<th width="5%">ID</th>
    		<th width="35%">Dosya Başlık</th>
    		<th width="25%">Dosya Adı</th>
    		<th width="15%">Eklenme tarihi</th>
    		<th width="10%">İndirilme</th>
    		<th width="10%">Detay</th>
    	</tr>
    	<?php $dosyalar=$site->dosyalar(0,10);
        if(count($dosyalar)>0):
    	foreach ($dosyalar as $dosya) {?>
    	<tr>
    		<td><?=$dosya->dosya_id;?></td>
    		<td><?=$dosya->dosya_baslik;?></td>
    		<td><?=$dosya->dosya_adi;?></td>
    	
    		<td><?=$dosya->dosya_boyut;?></td>
    		<td><?=$dosya->dosya_indirilme;?></td>
    		<td><a href="incele.php?dosya=<?=$dosya->dosya_id;?>"><img src="images/detay.png" height="25"></a></td>
    	</tr>
    	<?php } else: ?>
        <tr><td colspan="6" align="center">Hiç Dosya Yüklenmemiş</td></tr>	
        <?php endif;?>
    </table> 
    </div>
 <?php require_once 'footer.php';?>