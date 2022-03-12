<?php require_once 'header.php'; ?>
    <h3>Dosya Yüke</h3>
    <div class="sag_icerik">
    <form method="post" action="islem.php?islem=yukle" enctype="multipart/form-data">
    
    	<table>
    		<tr>
    			<td class="sagyasla w150">Dosya Başlığı</td>
    			<td><input type="text" name="baslik"></td>
    		</tr>
    		<tr>
    			<td class="sagyasla w150">Dosya</td>
    			<td><input type="file" name="dosya"></td>
    		</tr>
    		<tr>
    			<td>&nbsp;</td>
    			<td><button type="submit" value="Ekle" name="submit">Ekle</button></td>
    		</tr>
    	</table>
    	</form>   
    </div>
 <?php require_once 'footer.php';?>