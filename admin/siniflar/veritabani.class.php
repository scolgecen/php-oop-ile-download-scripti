<?php
class Database extends PDO {

    function __construct() {
        try {
            parent::__construct("mysql:host=localhost;dbname=download;","root","");
        } catch (PDOException $hata) {
            die($hata->getMessage());
        }

        
    }

}
?>