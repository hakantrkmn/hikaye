<?php





include 'wiew/header.php';
include 'class.php';


$yanlisgiris;






?>







 <div class="login-form">
    <form id="myform" action="" method="post">
        <h2 class="text-center">Giriş Yap</h2>
          <div id="asd"style="display: none" align="center" class="alert alert-danger">
    <strong>Bilgiler yanlış</strong></div>

        <div class="form-group">
            <input id="kadi" name="kullanici_adi" type="text" class="form-control" placeholder="Kullanıcı Adı" required="required">
        </div>
        <div class="form-group">
            <input id="ksifre" type="password" name="kullanici_sifre" class="form-control" placeholder="Şifre" required="required">
        </div>
        <div class="form-group">
            <button id="giris" type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
        </div>
    </form>
    <p class="text-center"><a class="btn btn-primary" href="kayit.php">Kayıt Ol</a></p>
</div>
<script >

$("#giris").click(function(e){


var kullanici_adi = $("#kadi").val();
var kullanici_sifre = $("#ksifre").val();
e.preventDefault();
if (document.getElementById('myform').checkValidity()==true) {
    $.ajax({
      type:'POST',
      url:'yukle.php',
      dataType: "json",
      data:{kullanici_adi:kullanici_adi,kullanici_sifre:kullanici_sifre,login:0},
      success:function(giris){

        if (giris.durum == '1')
        {
          $(location).attr('href', 'index/1');

        }
        else{
          $("#asd").css("display","block");
        }
      }
    });


}

})

</script>
<?php
include 'wiew/footer.php';
