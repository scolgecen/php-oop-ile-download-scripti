<?php require_once 'header.php'; ?>
    <?php if($_SESSION['yetki'] == 'admin'): ?>
        <?php 
   
    $id=isset($_GET['id']) ? (int)$_GET['id'] : NULL;
    $kullanici=$site->kullanici($id);
?>
    <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
    <?php if($id==NULL || empty($id)):?>
                <p>Geçersiz kullanıcı</p>
            <?php else:?>
        <form method="post" action="islem.php?islem=kullanici_guncelle&kullanici=<?=$id?>">
        <table>
            
            <tr>
                <td class="sagayasla w150">Kullanıcı Adı :</td>
                <td><input type="text" name="kullanici"  value="<?=$kullanici->kullanici_adi;?>" /></td>
            </tr>
            <tr>
                 <td class="sagayasla w150">Parola :</td>
                <td><input type="text" name="parola" /></td>
            </tr>
            <tr>
                 <td class="sagayasla w150">Eposta :</td>
                <td><input type="text" name="eposta" value="<?=$kullanici->kullanici_mail;?>" /></td>
            </tr>
            <tr>
                <td class="sagayasla w150">Yetki :</td>
                 <td>
                    <select name="yetki" style="width: 35%; height: 30px;">
                        <option value="default"<?php if($kullanici->kullanici_yetki=='default'): echo 'selected';endif;?>>Normal üye</option>
                        <option value="admin"<?php if($kullanici->kullanici_yetki=='admin'): echo 'selected';endif;?>>Yönetici</option>
                        
                    </select>
                    
                </td>
            </tr>
             <tr>
                  <td class="sagayasla w150">&nbsp;</td>
                <td><input type="submit" name="submit" value="Kullanıcı Güncelle" style="width: 35%; color: white;background-color: #36A5C9; font-size: 15px; height: 30px; font-weight: bold;"/>
                </td>

            </tr>
            <?php if($_SESSION['id']!= $kullanici->kullanici_id):?>
            <tr>
             <td class="sagayasla w150">&nbsp;</td>
                <td>
                    <input type="button" onclick="window.location='islem.php?islem=kullanici_sil&kullanici=<?=$id?>'" name="submit" value="Kullanıcı Sil" style="width: 35%; color: white;background-color: #c9302c; font-size: 15px; height: 30px; font-weight: bold;"/>
                </td>
            </tr>
        <?php else:?>
        <?php endif;?>    
        </table>
        </form>
    </div>
    <?php endif;?>
    <?php else:?>
        <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
        <p>Kullanıcıları Düzenlemeye yetkili Değilsiniz.</p>
    </div>
    <?php endif;?>
 <?php require_once 'footer.php';?>