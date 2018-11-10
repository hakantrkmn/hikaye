<?php

include 'init.php';

$yanlisgiris =0;
if (isset($_POST['kullanici_adi'])) {
  $kullanici = $connection->prepare("SELECT * FROM kullanici where kullanici_adi=:kullanici_adi ");
  $kullanici->execute(array('kullanici_adi' => $_POST['kullanici_adi']));
  $kullanici = $kullanici->fetch(PDO::FETCH_OBJ);
  if ($kullanici) {

    echo "böyle bir kullanici zaten mevcut";



  }
  else {
    $deneme = $connection->prepare("INSERT INTO kullanici(kullanici_adi,kullanici_sifre) values(:kullanici_adi,:kullanici_sifre) ");
    $deneme->execute(array('kullanici_adi' => $_POST['kullanici_adi'],'kullanici_sifre' => $_POST['kullanici_sifre']));

    $kullanici1 = $connection->prepare("SELECT * FROM kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre");
    $kullanici1->execute(array('kullanici_adi' => $_POST['kullanici_adi'],'kullanici_sifre'=>$_POST['kullanici_sifre']));
    $kullanici1 = $kullanici1->fetch(PDO::FETCH_OBJ);


    $_SESSION['kullanici_adi']=$kullanici1->kullanici_adi;
    $_SESSION['kullanici_sifre']=$kullanici1->kullanici_sifre;
    $_SESSION['kullanici_id']=$kullanici1->kullanici_id;
    header("Location: index.php?page=1");


    }
}

include 'wiew/header.php';
include 'wiew/footer.php';







?>







 <div class="login-form">
    <form action="" method="post">
        <h2 class="text-center"> Kayıt ol</h2>
        <?php if ($yanlisgiris==1): ?>
          <?php echo "yanlis giriş yaptınız" ?>

        <?php endif; ?>
        <div class="form-group">
            <input name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="kullanici_sifre" class="form-control" placeholder="Şifre" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Kayıt ol</button>
        </div>
    </form>
    <p class="text-center"><a href="login.php">Giriş Yap</a></p>
</div>
