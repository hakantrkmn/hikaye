<?php


include 'wiew/header.php';
include 'wiew/footer.php';



include 'init.php';
$yanlisgiris =0;
if (isset($_POST['kullanici_adi'])) {
  $kullanici = $connection->prepare("SELECT * FROM kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre");
  $kullanici->execute(array('kullanici_adi' => $_POST['kullanici_adi'],'kullanici_sifre'=>$_POST['kullanici_sifre']));
  $kullanici = $kullanici->fetch(PDO::FETCH_OBJ);
  if ($kullanici) {
    $_SESSION['kullanici_adi']=$kullanici->kullanici_adi;
    $_SESSION['kullanici_sifre']=$kullanici->kullanici_sifre;
    $_SESSION['kullanici_id']=$kullanici->kullanici_id;

    header("Location: index.php");

  }
  else {
    $yanlisgiris = 1;
  }
}





?>







 <div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Log in</h2>
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
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>
    </form>
    <p class="text-center"><a href="kayit.php">Kayıt Ol</a></p>
</div>
