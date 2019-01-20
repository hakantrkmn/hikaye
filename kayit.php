<?php

include 'class.php';
$kullanicidurum;
$yanlisgiris =0;

include 'wiew/header.php';
?>







 <div class="login-form">
    <form id="myform" action="" method="post">
        <h2 class="text-center"> Kayıt ol</h2>
        <div id="asd"style="display: none;" align="center" class="alert alert-danger">
  <strong>Kullanıcı mevcut</strong></div>

        <?php if ($yanlisgiris==1): ?>
          <?php echo "yanlis giriş yaptınız" ?>

        <?php endif; ?>
        <div class="form-group">
            <input id="kadi" name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı" required="required">
        </div>
        <div class="form-group">
            <input id="kmail" name="kullanici_mail" type="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input id="ksifre" type="password" name="kullanici_sifre" class="form-control" placeholder="Şifre" required="required">
        </div>
        <div class="form-group">
            <button id="kayit" type="submit" class="btn btn-primary btn-block">Kayıt ol</button>
        </div>
    </form>
    <p class="text-center"><a  class="btn btn-primary" href="login.php">Giriş Yap</a></p>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous"></script>
  <script >

$("#kayit").click(function(e){


 var kullanici_adi = $("#kadi").val();
 var kullanici_mail = $("#kmail").val();
 var kullanici_sifre = $("#ksifre").val();
 e.preventDefault();
 if (document.getElementById('myform').checkValidity()==true) {

      $.ajax({
        type:'POST',
        url:'yukle.php',
        dataType: "json",
        data:{kullanici_adi:kullanici_adi,kullanici_mail:kullanici_mail,insert:0},
        success:function(data){
          if (data.hatali == '1')
          {
            document.getElementById('asd').style.display = 'block';

          }
          else{
            $.ajax({
              type:'POST',
              url:'yukle.php',
              dataType: "json",
              data:{kullanici_adi:kullanici_adi,kullanici_mail:kullanici_mail,kullanici_sifre:kullanici_sifre,insert:1},
              success:function(info){
                $(location).attr('href', 'mail.php');


              }
            });


          }
        }
      });


 }

})

</script>
<?php include 'wiew/footer.php'; ?>
