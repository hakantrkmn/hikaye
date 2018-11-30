<?php

include 'init.php';

  global $connection;

if ($_POST['seviye']==0) {
  $videos = $connection->prepare("DELETE FROM anahikaye where anahikaye.hikaye_id=:hikaye_id");
  $videos->execute(array('hikaye_id'=>$_POST['hikaye_id']));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if ($_POST['seviye']==1) {
  $videos = $connection->prepare("DELETE FROM alternatifbir  where alterbir_id=:hikaye_id");
  $videos->execute(array('hikaye_id'=>$_POST['hikaye_id']));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
if ($_POST['seviye']==2) {
  $videos = $connection->prepare("SELECT * FROM anahikaye , kullanici where kullanici.kullanici_adi=:name and kullanici.kullanici_id=anahikaye.kullanici_id ORDER BY hikaye_id DESC");
  $videos->execute(array('name'=>$_POST['kullanici']));
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}














 ?>
