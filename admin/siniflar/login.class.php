<?php

class Login extends Database {

    function __construct() {
        parent::__construct();
    }

    public function girisYap($kullanici,$parola)
    {
        $sorgu=$this->prepare("SELECT count(kullanici_id) AS say, kullanici_adi ,kullanici_id, kullanici_yetki FROM
         kullanicilar WHERE kullanici_adi=:k AND kullanici_sifre=:p");
        $sorgu->execute(array(
            'k'=>$kullanici,
            'p'=>md5($parola)
            ));
        //print_r($sorgu->fetch());
        return $sorgu->fetch(PDO::FETCH_OBJ);
    }


    public function cikisYap()
    {
        session_destroy();
        header('location:login.php');
    }



    public function oturum()
    {
        session_start();
    }



    public static function girisKontrol()
    {   
        if(isset($_SESSION['login']) && isset($_SESSION['kullanici']))
        {

                if($_SESSION['login']=='ok' && $_SESSION['kullanici'] !='')
                {
                    return true;
                }
                else
                {
                    return false;
                }
        }
        else

        {
            return false;
        }
    }
    
}
?>