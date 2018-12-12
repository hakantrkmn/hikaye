<?php

include_once 'init.php';

function istenenHikaye($hikaye_id)
{
  global $connection;
  $story = $connection->prepare("SELECT * FROM anahikaye  NATURAL JOIN kullanici where anahikaye.hikaye_id = $hikaye_id ");

  $story->execute();

  return $story->fetchAll(PDO::FETCH_OBJ);

}

  function getStory($page)
  {
    global $connection;
    $limitPass = ($page - 1) * 5;
    $videos = $connection->prepare("SELECT * FROM anahikaye , kullanici where anahikaye.kullanici_id=kullanici.kullanici_id ORDER BY hikaye_id DESC LIMIT :pass , 5");
    $videos->bindValue(':pass', $limitPass, PDO::PARAM_INT);

    $videos->execute();

    return $videos->fetchAll(PDO::FETCH_OBJ);

  }
  function getPage()
  {
    global $connection;
    $videos = $connection->prepare("SELECT * FROM anahikaye ");
    $videos->execute();
    $videos=$videos->fetchAll(PDO::FETCH_OBJ);


    return count($videos)/5;

  }
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
