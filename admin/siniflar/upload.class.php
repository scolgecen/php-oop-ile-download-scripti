<?php

class Upload extends Database {

    function __construct() {
        parent::__construct();
    }
    public function ekle($baslik,$dosya,$boyut,$mime)
    {
		$sorgu = $this->prepare("INSERT into dosyalar(dosya_baslik,dosya_adi,dosya_boyut,dosya_yukleyen,dosya_mime) values(:baslik,:adi,:boyut,:yukleyen,:mime)");
		$sorgu->execute(array(
			'baslik'=>$baslik,
			'adi'=>$dosya,
			'boyut'=>$boyut,
			'yukleyen'=>$_SESSION['id'],
			'mime'=>$mime
			));
	 return $this->lastInsertId();
    }
     public function yukle($data)
    {
    		if($data['dosya']['size']>0 && $data['dosya']['error']==0)
    			{

    				$klasor ='C:\xampp\htdocs\Download\uploads';
    				$tmp=$data['dosya']['tmp_name'];
    				$dosya_adi = $data['dosya']['name'];

    				if(move_uploaded_file($tmp, $klasor.'/'.$dosya_adi))
    				{
    					header('location:yukle.php?islem=true');
    				}
    				else
    				{
					header('location:yukle.php?islem=false');
    					//move_uploaded_file(filename, destination);
    				}
    			
						
						
    				
    			}
    }


 }