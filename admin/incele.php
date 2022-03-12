<?php 
    require_once 'header.php'; 
    $id=isset($_GET['dosya']) ? (int)$_GET['dosya'] : NULL;
    $dosya=$site->dosya($id);
?>
    
    <h3>Dosya Detayları</h3>
        <div class="sag_icerik">
            <?php if($id==NULL || empty($dosya)):?>
                <p>Geçersiz Dosya Yolu</p>
            <?php else:?>
                
                <table class="dosyalar">
                    <tr>
                        <th width="28%"></th>
                        <th width="4%"></th>
                        <th width="68%"></th>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">Dosya Başlığı</td>
                        <td>:</td>
                        <td><?=$dosya->dosya_baslik?></td>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">Dosya Adı</td>
                         <td>:</td>
                        <td><?=$dosya->dosya_adi?></td>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">Dosya Boyutu</td>
                         <td>:</td>
                        <td><?=$site->dosyaBoyutu($dosya->dosya_boyut);?></td>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">İndirilme Sayısı</td>
                         <td>:</td>
                        <td><?=$dosya->dosya_indirilme?></td>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">Yükleyen Üye</td>
                         <td>:</td>
                        <td><?=$site->uyeAdi($dosya->dosya_yukleyen)->kullanici_adi;?></td>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">Eklenme Tarihi</td>
                         <td>:</td>
                        <td><?= $site->tarih($dosya->dosya_eklenme);?></td>
                    </tr>
                    <tr>
                        <td class="sagayasla w150">Dosya türü</td>
                         <td>:</td>
                        <td><?=$site->dosyaTuru($dosya->dosya_mime);?></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                         <td></td>
                        <td ><input onclick="window.location='../index.php?dosya=<?=$id?>'" type="button" name="indir" value="İndir">
                        <input onclick="window.location='duzenle.php?dosya=<?=$id?>'" type="button" name="duzenle" value="Düzenle"> 
                        <input type="button" onclick="window.location='islem.php?islem=sil&dosya=<?=$id?>'" name="sil" value="Sil"></td>
                    </tr>

                </table>

            <?php endif;?>
        </div>
<?php require_once 'footer.php';?>