<?php

include_once 'init.php';

  function dolumu($hikayeid)
  {
    global $connection;
    $videos = $connection->prepare("SELECT hikaye_devambir,hikaye_devamiki,hikaye_devamuc FROM anahikaye where hikaye_id=$hikayeid");
    $videos->execute();
    $videos=$videos->fetch(PDO::FETCH_OBJ);
      if ($videos->hikaye_devambir == 0 or $videos->hikaye_devamiki == 0 or $videos->hikaye_devamuc == 0 ) {
        return false;
      }
      else {
        return true;
      }
  }
  function dolumu2($hikayeid)
  {
    global $connection;
    $videos = $connection->prepare("SELECT alterbir_devambir,alterbir_devamiki,alterbir_devamuc FROM alternatifbir where alterbir_id=$hikayeid");
    $videos->execute();
    $videos=$videos->fetch(PDO::FETCH_OBJ);
      if ($videos->alterbir_devambir == 0 or $videos->alterbir_devamiki == 0 or $videos->alterbir_devamuc == 0 ) {
        return false;
      }
      else {
        return true;
      }
  }
  function kullanicivarmi()
  {
      if (isset($_SESSION['kullanici_adi'])) {
        return true;
      }
      else {
        return false;
      }
  }










 ?>
