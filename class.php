<?php

class hikaye
{
  public $connection;
  public  $hikaye_id;
  public  $hikaye_baslik;
  public  $hikaye_metin;
  public  $hikaye_devambir;
  public  $hikaye_devamiki;
  public  $hikaye_devamuc;
  public  $hikaye_tarih;
  public  $hikaye_seviye;
  public  $hikaye_begeni;
  public  $kullanici_id;
  public  $kullanici_adi;

  function __construct()
  {
    $this->connection = new PDO("mysql:host=localhost;dbname=hikaye;charset=utf8;", "adminer", "adminer");

  }

  public static function getAllVideos($page)
  {
    $returnObj = new self;
    $limitPass = ($page - 1) * 5;
    $videos = $returnObj->connection->prepare("SELECT * FROM anahikaye , kullanici where anahikaye.kullanici_id=kullanici.kullanici_id ORDER BY hikaye_id DESC LIMIT :pass , 5");
    $videos->bindValue(':pass', $limitPass, PDO::PARAM_INT);

    $videos->execute();

    return $videos->fetchAll(PDO::FETCH_OBJ);
  }
  public static function getPage()
  {
    $returnObj = new self;
    $videos = $returnObj->connection->prepare("SELECT * FROM anahikaye ");
    $videos->execute();
    $videos=$videos->fetchAll(PDO::FETCH_OBJ);


    return count($videos)/5;

  }
  public function getMainVideo($seviye,$hikaye_id)
  {
    if ($seviye==0) {
      $hikaye = $this->connection->prepare("SELECT * from kullanici natural JOIN anahikaye where anahikaye.hikaye_id=:hikaye_id ");
      $hikaye->execute(array('hikaye_id'=>$hikaye_id));
      $hikaye = $hikaye->fetch(PDO::FETCH_OBJ);
      /*
      $this->hikaye_id = $hikaye->hikaye_id;
      $this->hikaye_baslik = $hikaye->hikaye_baslik;
      $this->hikaye_metin = $hikaye->hikaye_metin;
      $this->hikaye_devambir = $hikaye->hikaye_devambir;
      $this->hikaye_devamiki = $hikaye->hikaye_devamiki;
      $this->hikaye_devamuc = $hikaye->hikaye_devamuc;
      $this->hikaye_tarih = $hikaye->hikaye_tarih;
      $this->hikaye_seviye = $hikaye->hikaye_seviye;
      $this->hikaye_begeni = $hikaye->hikaye_begeni;
      $this->kullanici_id = $hikaye->kullanici_id;
      $this->kullanici_adi = $hikaye->kullanici_adi;
*/
      return $hikaye;
    }
  }
  public function getVideos($seviye,$hikaye_id,$birincialternatif,$ikincialternatif,$ucuncualternatif)
  {
    if ($seviye==0) {
      if ($birincialternatif=="") {
        $birincialternatif = "NULL";
      }
      if ($ikincialternatif=="") {
        $ikincialternatif = "NULL";
      }
      if ($ucuncualternatif=="") {
        $ucuncualternatif = "NULL";
      }
      $alternatifler = $this->connection->prepare("  SELECT * from kullanici natural JOIN alternatifbir where (alterbir_id=$birincialternatif or alterbir_id=$ikincialternatif or alterbir_id=$ucuncualternatif) and alternatifbir.alterbir_parentid =$hikaye_id");
      $alternatifler->execute();
      return $alternatifler = $alternatifler->fetchAll(PDO::FETCH_OBJ);

    }
  }

}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class alterhikaye
{
  public $connection;
  public  $alterbir_id;
  public  $alterbir_baslik;
  public  $alterbir_metin;
  public  $alterbir_devambir;
  public  $alterbir_devamiki;
  public  $alterbir_devamuc;
  public  $alterbir_tarih;
  public  $alterbir_seviye;
  public  $alterbir_begeni;
  public  $kullanici_id;
  public  $kullanici_idasd;

  function __construct()
  {
    $this->connection = new PDO("mysql:host=localhost;dbname=hikaye;charset=utf8;", "adminer", "adminer");

  }
  public function getMainVideo($seviye,$hikaye_id)
  {
    if ($seviye==1) {
      //alternatifi görülmek istenen hikayenin bilgileri
      $hikaye = $this->connection->prepare("SELECT * from kullanici natural JOIN alternatifbir where alternatifbir.alterbir_id=:hikaye_id");
      $hikaye->execute(array('hikaye_id'=>$hikaye_id));
      $hikaye = $hikaye->fetch(PDO::FETCH_OBJ);
      return $hikaye;
    }


      if ($seviye==2) {
        $tiklananhikaye = $this->connection->prepare("SELECT *
          from alternatifiki
          natural JOIN kullanici
          where alternatifiki.alteriki_id=:hikaye_id and alternatifiki.kullanici_id=kullanici.kullanici_id");
          $tiklananhikaye->execute(array('hikaye_id'=>$hikaye_id));

          return $tiklananhikaye = $tiklananhikaye->fetch(PDO::FETCH_OBJ);

      }

  }
  public function getVideos($seviye,$hikaye_id,$birincialternatif,$ikincialternatif,$ucuncualternatif)
  {
    if ($seviye==1) {
      if ($birincialternatif=="") {
        $birincialternatif = "NULL";
      }
      if ($ikincialternatif=="") {
        $ikincialternatif = "NULL";
      }
      if ($ucuncualternatif=="") {
        $ucuncualternatif = "NULL";
      }
      $returnObj = new self;
      $alternatifler = $returnObj->connection->prepare("SELECT * from kullanici natural JOIN alternatifiki where (alternatifiki.alteriki_id=$birincialternatif or alternatifiki.alteriki_id=$ikincialternatif or alternatifiki.alteriki_id=$ucuncualternatif) and alternatifiki.alteriki_parentid =$hikaye_id");
      $alternatifler->execute();
      return $alternatifler = $alternatifler->fetchAll(PDO::FETCH_OBJ);

    }

  }

  public function getRootVideo($rootid)
  {
        $returnObj = new self;
      $asilHikaye = $returnObj->connection->prepare("SELECT * from kullanici natural JOIN anahikaye where hikaye_id=$rootid");
      $asilHikaye->execute();
      return $asilHikaye = $asilHikaye->fetch(PDO::FETCH_OBJ);

  }


}

















 ?>
