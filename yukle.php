
<?php
include 'class.php';
if (isset($_POST['insert']) and $_POST['insert']==1) {
  $sifre = hash('sha256', $_POST['kullanici_sifre']);
    user::insertUser($_POST['kullanici_adi'],$sifre,$_POST['kullanici_mail']);
    $info['sa']=1;
    echo json_encode($info);

}
if (isset($_POST['ban']) and $_POST['ban']==1) {
    $kullanici=user::getUser();

    echo json_encode($kullanici);

}
if (isset($_POST['banla']) ) {
$_SESSION["kullanici_ban"]=1;

}
if (isset($_POST['insert']) and $_POST['insert']==0) {

    $returnObj = new user;
    $kullanici = $returnObj->connection->prepare("SELECT * FROM kullanici where kullanici_mail=:kullanici_mail or kullanici_adi=:kullanici_adi ");
    $kullanici->execute(array('kullanici_adi' => $_POST['kullanici_adi'],'kullanici_mail' => $_POST['kullanici_mail']));
    $kullanici = $kullanici->fetch(PDO::FETCH_OBJ);
    if ($kullanici) {
      $data['status'] = 'ok';
      $data['hatali'] = 1;
    }
    else{
      $data['hatali'] = 0;
    }

    echo json_encode($data);

}
if (isset($_POST['login']) and $_POST['login']==0) {
    $sifre = hash('sha256', $_POST['kullanici_sifre']);
  $var =  user::loginUser($_POST['kullanici_adi'],$sifre);

  if ($var==1) {
    $giris['durum']=1;
    echo json_encode($giris);
  }
  if ($var==0) {
    $giris['durum']=0;
    echo json_encode($giris);
  }

}


if (isset($_GET['parentid'])) {
      $parentid = $_GET['parentid'];
  if ($_GET['seviye']==1) {
    $obj = new hikaye();
    $obj2 = new alterhikaye();
    $obj2->getStory(1,$_GET['parentid']);
    $obj->getStory(0,$obj2->alterbir_parentid);
  }
  if ($_GET['seviye']==0) {
    $obj = new hikaye();
    $obj->getStory(0,$_GET['parentid']);
  }

}


//eğer getten hikaye metin geldiyse ana hikaye demektir direk yüklenir
if (isset($_POST["hikaye-metin"])) {
    hikaye::insertStory($_POST['hikaye-baslik'],$_POST['hikaye-metin'],0,$_SESSION['kullanici_id']);
}
//eğer getten alter metin ve seviye 0 gelmişse 1.alternatif tablosuna yüklenir
if (isset($_POST["alter-metin"]) and $_GET['seviye']==0){

  $obj->insertAlterStory($_POST['alter-metin'],$_SESSION['kullanici_id']);
//yüklendikten sonra alternatif hikayenin parent hikayesinin devamlarından hangisinin boş olduğuna bakılır ona göre eklenir
    $parenthikaye = $obj->connection->prepare("SELECT alterbir_id from  alternatifbir where alterbir_parentid=$parentid order by alterbir_id desc");
    $parenthikaye->execute();
    $parenthikaye = $parenthikaye->fetch(PDO::FETCH_OBJ);
    $val = $parenthikaye->alterbir_id;



if ($obj->hikaye_devambir==NULL)
{
  $hikaye2 = $obj->connection->prepare("UPDATE anahikaye set hikaye_devambir=$val where hikaye_id = $parentid ");
  $hikaye2->execute();
}
elseif ($obj->hikaye_devamiki==NULL)
{
  $hikaye2 = $obj->connection->prepare("UPDATE anahikaye set hikaye_devamiki=$val where hikaye_id = $parentid ");
  $hikaye2->execute();
}
elseif($obj->hikaye_devamuc==NULL)
{
  $hikaye2 = $obj->connection->prepare("UPDATE anahikaye set hikaye_devamuc=$val where hikaye_id = $parentid ");
  $hikaye2->execute();
}
header("Location: altergör/$parentid/0");


}

if (isset($_POST["alter-metin"]) and $_GET['seviye']==1){

  //gelen alternatif 1.seviyeyse eklenir
  $obj2->insertAlterStory($_POST["alter-metin"],$_SESSION["kullanici_id"]);

 //eklenen hikayenin kendi id si ve parent id sini alabilmek için sorgu yapılır
    $hikaye3 = $obj2->connection->prepare("SELECT alteriki_id,alteriki_parentid from  alternatifiki where alteriki_parentid=$parentid order by alteriki_id desc");
    $hikaye3->execute();
    $hikaye3 = $hikaye3->fetch(PDO::FETCH_OBJ);
    $val = $hikaye3->alteriki_id;
    $val3 = $obj2->alterbir_id;

    $val2 = $obj2->alterbir_parentid;


if ($obj2->alterbir_devambir==NULL) {
  $hikaye2 = $obj2->connection->prepare("UPDATE alternatifbir set alterbir_devambir=$val where alterbir_id = $parentid ");
  $hikaye2->execute();
}
elseif ($obj2->alterbir_devamiki==NULL) {
  $hikaye2 = $obj2->connection->prepare("UPDATE alternatifbir set alterbir_devamiki=$val where alterbir_id = $parentid ");
  $hikaye2->execute();
}
elseif($obj2->alterbir_devamuc==NULL) {
  $hikaye2 = $obj2->connection->prepare("UPDATE alternatifbir set alterbir_devamuc=$val where alterbir_id = $parentid ");
  $hikaye2->execute();
}

header("Location: altergör/$val3/1/$val2");

}
