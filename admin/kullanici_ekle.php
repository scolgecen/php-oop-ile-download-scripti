<?php require_once 'header.php'; ?>
    <?php if($_SESSION['yetki'] == 'admin'): ?>
    <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
        <form method="post" action="islem.php?islem=kullanici_ekle">
        <table>
            
            <tr>
                <td class="sagayasla w150">Kullanıcı Adı :</td>
                <td><input type="text" name="kullanici" /></td>
            </tr>
            <tr>
                 <td class="sagayasla w150">Parola :</td>
                <td><input type="text" name="parola" /></td>
            </tr>
            <tr>
                 <td class="sagayasla w150">Eposta :</td>
                <td><input type="text" name="eposta" /></td>
            </tr>
            <tr>
                <td class="sagayasla w150">Yetki :</td>
                 <td>
                    <select name="yetki" style="width: 35%; height: 30px;">
                        <option value="default" selected='selected'>Normal Üye</option>
                        <option value="admin" >Yönetici</option>
                        
                    </select>
                    
                </td>
            </tr>
             <tr>
                  <td class="sagayasla w150">&nbsp;</td>
                <td><input type="submit" name="submit" value="Kullanıcı Ekle" style="width: 35%; color: white;background-color: #36A5C9; font-size: 15px; height: 30px; font-weight: bold;"/></td>
            </tr>
            
        </table>
        </form>
    </div>
    <?php else:?>
        <h3>Kullanıcı Ekle</h3>
    <div class="sag_icerik">
        <p>Kullanıcı Eklemeye Yetkili Değilsiniz.</p>
    </div>
    <?php endif;?>
 <?php require_once 'footer.php';?>