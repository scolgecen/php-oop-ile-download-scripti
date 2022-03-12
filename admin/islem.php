<?php 
require_once 'config.php';
$islem =  isset($_GET['islem']) ? $_GET['islem'] : NULL;
switch ($islem){
    case 'kullanici_ekle':
        if($_POST){
        require_once 'siniflar/kullanici.class.php';
        $kullanici = new Kullanici;
        
       
      if($kullanici->ekle($_POST) > 0){
                   header('location:kullanici_ekle.php?islem=true');
                   exit();
               }else{
                header('location:kullanici_ekle.php?islem=false');
               }
           
        
        }else{
            die('post edilmedi');

        }
    break;

    case 'kullanici_sil':
             if($_SESSION['yetki'] == 'admin'){//Admin Değilse silemez.
            $kullanici=isset($_GET['kullanici'])? $_GET['kullanici'] : NULL;
       
           if($kullanici==NULL){
            der('location:kullanicilar.php');
                    exit();

           }
           else
           {    $kullanici2=$site->kullanici($kullanici);//admin Kendinide Silemez
                if($_SESSION['id']!= $kullanici2->kullanici_id){
                    $sil=$site->sil('kullanicilar','kullanici_id',$kullanici);
                    if($sil > 0 )
                    {
                        header('location:kullanicilar.php');
                        exit();
                    }
                    else
                    {
                        header('location:kullanici.php?id='.$kullanici);
                        exit();
                    }
                }
                else{
                      header('location:kullanici.php?id='.$kullanici);
                        exit();
                }
            }
        }
        else{
           header('location:kullanici.php?id='.$kullanici);
                        exit();
        }
            
                
    break;

    case 'kullanici_guncelle':

        $kullanici=isset($_GET['kullanici'])? $_GET['kullanici'] :NULL;
          
            if($kullanici==NULL){
            header('location:kullanicilar.php');
                    exit();

           } 
           else
           {
            $kullanici_adi=$_POST['kullanici'];
            $kullanici_sifre=$_POST['parola'];
            $kullanici_mail=$_POST['eposta'];
            $kullanici_yetki=$_POST['yetki'];

            $sorgu='';
            $sorgu="kullanici_adi='$kullanici_adi',";
            $sorgu.="kullanici_mail='$kullanici_mail',";
            $sorgu.="kullanici_yetki='$kullanici_yetki',";
            $xxx=trim($kullanici_sifre)!=''? "kullanici_sifre='".md5($kullanici_sifre)."'":'';
            $sorgu.=$xxx;
            
            $kullaniciGuncelle=$site->guncelle('kullanicilar',"$sorgu","kullanici_id='".$kullanici."'");
                    if($dosyaGuncelle)
                    {
                         header('location:kullanici.php?id='.$kullanici);
                        exit();
                       
                    }
                    else
                    {
                        header('location:kullanicilar.php');
                        exit();
                    }
            }

    break;
    


     case 'login':
        if($_POST){
            $login= new Login;
            $kontrol = $login->girisYap($_POST['kullanici'],$_POST['parola']);
           
                if($kontrol->say == 1)
                {
                    //login Bşarılı, oturum İşlemleri
                    $_SESSION['login'] = 'ok';
                    $_SESSION['id'] = $kontrol->kullanici_id;
                    $_SESSION['kullanici'] = $kontrol->kullanici_adi;
                    $_SESSION['yetki'] = $kontrol->kullanici_yetki;
                    header('location:index.php');
                    exit();
                }
                else
                {
                    $login->cikisYap();
                    // Login Başarısız, Yönlendirme işlemleri
                }
        }
        else
        {
            die('Post Edilmedi');
        }
     break;
     
      case 'yukle':
             if($_POST)
             {
                require_once 'siniflar/upload.class.php';
                $upload = new Upload;
             $islem =  $upload->ekle($_POST['baslik'],$_FILES['dosya']['name'],$_FILES['dosya']['size'],$_FILES['dosya']['type']);
                    if($islem >0)
                    {
                     $yukle=$upload->yukle($_FILES);
                    
                    }
                    else
                    {
                         header('location:yukle.php?islem=false2');
                    }

             }
             else
             {
                
                die('Post Edilmedi');
             }

      break;
      case 'dosyaGuncelle':

        $dosya=isset($_GET['dosya'])? $_GET['dosya'] : NULL;
            if($dosya==NULL){
            header('location:dosyalar.php');
                    exit();

           }
           else
           {
            
            $dosyaGuncelle=$site->guncelle('dosyalar',"dosya_baslik='".$_POST['baslik']."'","dosya_id='".$dosya."'");
                    if($dosyaGuncelle)
                    {
                         header('location:incele.php?dosya='.$dosya);
                        exit();
                       
                    }
                    else
                    {
                        header('location:dosyalar.php');
                        exit();
                    }
            }
        break;
       case 'sil':
       $dosya=isset($_GET['dosya'])? $_GET['dosya'] : NULL;
       $sil=$site->sil('dosyalar','dosya_id',$dosya);
           if($dosya==NULL){
            der('location:dosyalar.php');
                    exit();

           }
           else
           {
                    if($sil > 0 )
                    {
                        header('location:dosyalar.php');
                        exit();
                    }
                    else
                    {
                        header('location:incele.php?dosya='.$dosya);
                        exit();
                    }
            }
         break;


    default: die('herhangi bir işlem yapılmadı');
    break;
    }



?>