<?php





include 'wiew/header.php';
include 'class.php';


$yanlisgiris;
if (isset($_POST['kullanici_adi'])) {
  user::loginUser($_POST['kullanici_adi'],$_POST['kullanici_sifre']);
}





?>







 <div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Giriş Yap</h2>
          <div id="asd"style="display: none" align="center" class="alert alert-danger">
    <strong>Bilgiler yanlış</strong></div>

        <div class="form-group">
            <input name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı" required="required">
        </div>
        <div class="form-group">
            <input type="password" name="kullanici_sifre" class="form-control" placeholder="Şifre" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
        </div>
    </form>
    <p class="text-center"><a class="btn btn-primary" href="kayit.php">Kayıt Ol</a></p>
</div>
<?php
include 'wiew/footer.php';
