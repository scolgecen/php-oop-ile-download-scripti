<?php 
    require_once 'header.php'; 
    $id=isset($_GET['dosya']) ? (int)$_GET['dosya'] : NULL;
    $dosya=$site->dosya($id);
?>
    <h3>Dosya Yüke</h3>
    <div class="sag_icerik">
    <?php if($id==NULL || empty($dosya)):?>
                <p>Geçersiz Dosya Yolu</p>
            <?php else:?>
    <form method="post" action="islem.php?islem=dosyaGuncelle&dosya=<?=$id?>">
    
    	<table>
    		<tr>
    			<td class="sagyasla w150">Dosya Başlığı</td>
    			<td><input type="text" name="baslik" value="<?=$dosya->dosya_baslik;?>"></td>
    		</tr>
    		
    		<tr>
    			<td>&nbsp;</td>
    			<td><button type="submit" value="Ekle" name="submit">Güncelle</button></td>
    		</tr>
    	</table>
    	</form>
        <?php endif;?>   
    </div>
 <?php require_once 'footer.php';?>