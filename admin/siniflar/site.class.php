<?php

class Site extends Database {

    function __construct() {
        parent::__construct();
    }
    public function kullanicilar($baslangic,$limit)
    {
        $sorgu=$this->prepare("SELECT * from kullanicilar order by kullanici_id ASC LIMIT $baslangic,$limit");
        $sorgu->execute();
       
       return $sorgu->fetchAll(PDO::FETCH_OBJ);
        
    }
     public function kullanici($id)
    {
         $sorgu=$this->prepare("SELECT * from kullanicilar where kullanici_id='$id'");
        $sorgu->execute();
       
       return $sorgu->fetch(PDO::FETCH_OBJ);
    }
    public function dosyalar($baslangic,$limit)
    {
        $sorgu=$this->prepare("SELECT * from dosyalar order by dosya_eklenme ASC LIMIT $baslangic,$limit");
        $sorgu->execute();
       
       return $sorgu->fetchAll(PDO::FETCH_OBJ);
		
    }
    
    public function dosya($id)
    {
         $sorgu=$this->prepare("SELECT * from dosyalar where dosya_id='$id'");
        $sorgu->execute();
       
       return $sorgu->fetch(PDO::FETCH_OBJ);
    }
    public function dosyaBoyutu($byte)
    {   

        if($byte < 1024)
        {
            $byte="$byte Byte";
        }
        elseif($byte<(1024*1024))
        {
            $byte=round($byte/1024, 2)." Kb";
        }
        elseif($byte<(1024*1024*1024))
        {
            $byte=round($byte/(1024*1024), 2)." Mb";
        }
        else{
            $byte=round($byte/(1024*1024*1024), 2)." Gb";
        }
        
        return $byte;
    }

    public function tarih($tarih)
    {
        $tarih = strtotime($tarih);
        return date("d/m/Y H:i",$tarih);
    }
    public function dosyaTuru($turu)
    {
        switch ($turu) {

                case 'image/png':
                $donder='Resim Dosyası : (PNG)';
                break;

                case 'image/jpg':
                $donder='Resim Dosyası : (JPG/JPEG)';
                break;

                case 'image/jpeg':
                 $donder='Resim Dosyası : (JPG/JPEG)';
                break;

                case 'aplication/x-zip-compressed':
                case 'aplication/zip':
                case 'application/octet-stream':
                $donder='Sıkıştırılmış Zip Dosyası';
                break;
            
            default:
               $donder='Bilinmeyen Dosya';
            break;
        }
        return $donder;
    }

    public function uyeAdi($id)
    {
         $sorgu=$this->prepare("SELECT kullanici_adi from kullanicilar where kullanici_id='$id'");
        $sorgu->execute();
        return $sorgu->fetch(PDO::FETCH_OBJ);
    }
     public function guncelle($tablo,$deger,$kosul)
    {
            $sorgu=$this->prepare("UPDATE $tablo SET $deger where $kosul");
            $sorgu->execute();
            return true;
    }
    public function sil($tablo,$sutun,$kosul)
    {

            $dosya=$this->dosya($kosul);
            $sorgu=$this->exec("DELETE from $tablo  where $sutun='$kosul'");
            if($sorgu>0){
                unlink('../uploads/'.$dosya->dosya_adi);
            }
            return $sorgu; 
    }


 }