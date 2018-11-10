
<?php
include 'init.php';
if (isset($_GET['parentid'])) {
  $parentid = $_GET['parentid'];

$anahikaye = $connection->prepare("SELECT * from  anahikaye where hikaye_id=$parentid ");
$anahikaye->execute();
$anahikaye = $anahikaye->fetch(PDO::FETCH_OBJ);

$alterBir = $connection->prepare("SELECT * from  alternatifbir where alterbir_id=$parentid ");
$alterBir->execute();
$alterBir = $alterBir->fetch(PDO::FETCH_OBJ);
}


//eğer getten hikaye metin geldiyse ana hikaye demektir direk yüklenir
if (isset($_POST["hikaye-metin"])) {

  $hikaye = $connection->prepare("INSERT INTO anahikaye(hikaye_baslik,hikaye_metin,hikaye_seviye,kullanici_id) VALUES (:hikaye_baslik,:hikaye_metin,:hikaye_seviye,:kullanici_id)");
  $hikaye->execute(
    array(
      'hikaye_baslik' => $_POST['hikaye-baslik'],
      'hikaye_metin' => $_POST['hikaye-metin'],
      'hikaye_seviye' => 0,
      'kullanici_id' => $_SESSION['kullanici_id'],
    ));
    header("Location: index.php?page=1");

}
//eğer getten alter metin ve seviye 0 gelmişse 1.alternatif tablosuna yüklenir
if (isset($_POST["alter-metin"]) and $_GET['seviye']==0){

  $hikaye = $connection->prepare("INSERT INTO alternatifbir(alterbir_metin,kullanici_id,alterbir_parentid) VALUES(:hikaye_metin,:kullanici_id,:parid)");
  $hikaye->execute(
    array(
      'hikaye_metin' => $_POST['alter-metin'],
      'parid' => $_GET['parentid'],
      'kullanici_id' => $_SESSION['kullanici_id']
    ));

//yüklendikten sonra alternatif hikayenin parent hikayesinin devamlarından hangisinin boş olduğuna bakılır ona göre eklenir
    $parenthikaye = $connection->prepare("SELECT alterbir_id from  alternatifbir where alterbir_parentid=$parentid order by alterbir_id desc");
    $parenthikaye->execute();
    $parenthikaye = $parenthikaye->fetch(PDO::FETCH_OBJ);
    $val = $parenthikaye->alterbir_id;



if ($anahikaye->hikaye_devambir==0)
{
  $hikaye2 = $connection->prepare("UPDATE anahikaye set hikaye_devambir=$val where hikaye_id = $parentid ");
  $hikaye2->execute();
}
elseif ($anahikaye->hikaye_devamiki==0)
{
  $hikaye2 = $connection->prepare("UPDATE anahikaye set hikaye_devamiki=$val where hikaye_id = $parentid ");
  $hikaye2->execute();
}
elseif($anahikaye->hikaye_devamuc==0)
{
  $hikaye2 = $connection->prepare("UPDATE anahikaye set hikaye_devamuc=$val where hikaye_id = $parentid ");
  $hikaye2->execute();
}
$deneme=$_GET['parentid'];

header("Location: altergör.php?hikaye_id=$deneme&seviye=0");

}

if (isset($_POST["alter-metin"]) and $_GET['seviye']==1){

  //gelen alternatif 1.seviyeyse eklenir
  $hikaye = $connection->prepare("INSERT INTO alternatifiki(alteriki_metin,kullanici_id,alteriki_parentid) VALUES(:hikaye_metin,:kullanici_id,:parid)");
  $hikaye->execute(
    array(
      'hikaye_metin' => $_POST['alter-metin'],
      'kullanici_id' => $_SESSION['kullanici_id'],
      'parid' => $_GET['parentid']
    ));

 //eklenen hikayenin kendi id si ve parent id sini alabilmek için sorgu yapılır
    $hikaye3 = $connection->prepare("SELECT alteriki_id,alteriki_parentid from  alternatifiki where alteriki_parentid=$parentid order by alteriki_id desc");
    $hikaye3->execute();
    $hikaye3 = $hikaye3->fetch(PDO::FETCH_OBJ);
    $val = $hikaye3->alteriki_id;
    $val3 = $hikaye3->alteriki_parentid;
      //
    $hikaye4 = $connection->prepare("SELECT alterbir_parentid from  alternatifbir where alterbir_id=$parentid ");
    $hikaye4->execute();
    $hikaye4 = $hikaye4->fetch(PDO::FETCH_OBJ);
    $val2 = $hikaye4->alterbir_parentid;


if ($alterBir->alterbir_devambir==0) {
  $hikaye2 = $connection->prepare("UPDATE alternatifbir set alterbir_devambir=$val where alterbir_id = $parentid ");
  $hikaye2->execute();
}
elseif ($alterBir->alterbir_devamiki==0) {
  $hikaye2 = $connection->prepare("UPDATE alternatifbir set alterbir_devamiki=$val where alterbir_id = $parentid ");
  $hikaye2->execute();
}
elseif($alterBir->alterbir_devamuc==0) {
  $hikaye2 = $connection->prepare("UPDATE alternatifbir set alterbir_devamuc=$val where alterbir_id = $parentid ");
  $hikaye2->execute();
}
else {
  echo "boş yer yok ";
}

header("Location: altergör.php?hikaye_id=$val3&seviye=1&id=$val2");
}
