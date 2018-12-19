<?php

include 'class.php';
$kullanicidurum;
$yanlisgiris =0;
if (isset($_POST['kullanici_adi'])) {
  user::insertUser($_POST['kullanici_adi'],$_POST['kullanici_sifre']);
}

include 'wiew/header.php';
?>







 <div class="login-form">
    <form action="" method="post">
        <h2 class="text-center"> Kayıt ol</h2>
        <div id="asd"style="display: none;" align="center" class="alert alert-danger">
  <strong>Kullanıcı mevcut</strong></div>

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
    <p class="text-center"><a  class="btn btn-primary" href="login.php">Giriş Yap</a></p>
</div>

<?php include 'wiew/footer.php'; ?>
