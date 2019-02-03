<?php

include 'class.php';

if ($_GET['seviye']==1) {
  $Nhikaye = new alterhikaye();
}
if ($_GET['seviye']==0) {
  $Nhikaye = new hikaye();
}


if ($_GET['seviye']==1) {
  $Nhikaye->getStory($_GET['seviye'],$_GET['hikaye_id']);

  $asilHikaye = $Nhikaye->getRootStory();
  $alternatifler = $Nhikaye->getAlterStory($_GET['seviye']);
}
if ($_GET['seviye']==0) {
  $Nhikaye->getStory($_GET['seviye'],$_GET['hikaye_id']);
  $alternatifler = $Nhikaye->getAlterStory($_GET['seviye']);

}
include 'wiew/header.php';
?>
<div class="container sd">
  <div class="row">

    <!-- Blog Entries Column -->
    <div  class="col-md-12">




      <h1 class="my-4">Alternatif Devamlar
      </h1>

      <!-- Blog Post -->
      <!–– EĞER TIKLANILAN HİKAYE ANA HİKAYEYSE O GÖSTERİLİR ––>

      <?php if ($_GET['seviye']==0): ?>
        <div class="card mb-4">
          <div class="card-body">
            <h2 align="center"class="card-title"><?php echo $Nhikaye->hikaye_baslik ?></h2>
            <p class="card-text"><?php echo $Nhikaye->hikaye_metin ?><br> <a href="profil/<?php echo $Nhikaye->kullanici_adi  ?>"><?php echo $Nhikaye->kullanici_adi ?></a>(<?php echo $Nhikaye->hikaye_tarih ?>)</p>
            <?php if (hikaye::dolumu($_GET['hikaye_id'],$_GET['seviye'])==false): ?>

                <?php if (isset($_SESSION['kullanici_adi'])): ?>
                  <?php if ($_SESSION['kullanici_adi']==$Nhikaye->kullanici_adi): ?>
                  <?php elseif (hikaye::izin($Nhikaye,$Nhikaye->hikaye_seviye)):?>
                  <?php elseif ($_SESSION['kullanici_ban']==1): ?>
                  <?php else: ?>
                    <form class="" action="alterekle.php" method="post">
                      <input type="hidden" name="parentid" value="<?php echo $Nhikaye->hikaye_id ?>">
                      <input type="hidden" name="seviye" value="<?php echo $Nhikaye->hikaye_seviye ?>">
                    <button class="btn btn-primary btn-sm"type="submit">devam ettir &rarr;</button>

                  <?php endif; ?>

                <?php endif; ?>

              </form>
            <?php endif; ?>

          </div>

        </div>

      <?php endif; ?>
      <!–– EĞER TIKLANILAN HİKAYE 1.SEVİYEYSE O GÖSTERİLİR ––>

      <?php if ($_GET['seviye']==1): ?>
        <div class="card mb-4">
          <div class="card-body">
            <h2 align="center"class="card-title"><?php echo $asilHikaye->hikaye_baslik ?></h2>
            <p class="card-text"><?php echo $asilHikaye->hikaye_metin ?><br> <a href="profil/<?php echo $asilHikaye->kullanici_adi  ?>"><?php echo $asilHikaye->kullanici_adi ?></a>(<?php echo $asilHikaye->hikaye_tarih ?>)<a  href="altergör/<?php echo $asilHikaye->hikaye_id ?>/<?php echo $asilHikaye->hikaye_seviye?>" class=" btn-link  btn-sm">Hikayeye git <i class="fas fa-book-open"></i></a>
            </p>

            <p class="card-text"><?php echo $Nhikaye->alterbir_metin ?> <br> <a href="profil/<?php echo $Nhikaye->kullanici_adi  ?>"><?php echo $Nhikaye->kullanici_adi ?></a>(<?php echo $Nhikaye->alterbir_tarih ?>)</p>
            <?php if (hikaye::dolumu($_GET['hikaye_id'],$_GET['seviye'])==false): ?>


                <?php if (isset($_SESSION['kullanici_adi'])): ?>
                  <?php if ($_SESSION['kullanici_adi']==$Nhikaye->kullanici_adi): ?>

                  <?php elseif ($_SESSION['kullanici_adi']==$asilHikaye->kullanici_adi):?>
                  <?php elseif (hikaye::izin($Nhikaye,$Nhikaye->alterbir_seviye)):?>
                  <?php elseif ($_SESSION['kullanici_ban']==1): ?>
                  <?php else: ?>
                    <form class="" action="alterekle" method="post">
                      <input type="hidden" name="parentid" value="<?php echo $Nhikaye->alterbir_id ?>">
                      <input type="hidden" name="seviye" value="<?php echo $Nhikaye->alterbir_seviye ?>">

                    <button class="btn btn-primary btn-sm"type="submit">devam ettir &rarr;</button>

</form>
                  <?php endif; ?>

                <?php endif; ?>

            <?php endif; ?>

          </div>

        </div>


      <?php endif; ?>


    </div>



    <?php

    if (count($alternatifler) !=0) {
      $deneme = 12/count($alternatifler);
    }


    ?>
    <!–– EĞER TIKLANILAN HİKAYE ANA HİKAYEYSE ONA GÖRE ALTERNATİFLER GÖSTERİLİR ––>

    <?php if ($_GET['seviye']==0): ?>
      <?php foreach ($alternatifler as $value): ?>

        <div class="col-md-<?php echo ceil($deneme) ?>">

          <div id="qwe"class="card mb-4">
            <div class="card-body">
              <p id="metin"class="card-text qw"><?php echo $value->alterbir_metin?> <br> <a href="profil/<?php echo $value->kullanici_adi  ?>"><?php echo $value->kullanici_adi ?></a>(<?php echo $value->alterbir_tarih ?>)</p>
              <a href="altergör/<?php echo $value->alterbir_id ?>/<?php echo $value->alterbir_seviye ?>/<?php echo $value->alterbir_parentid ?>" class="btn btn-primary btn-sm">Alternatif Devamlar &rarr;</a>
              <?php if (count($alternatifler)>1): ?>
                <button type="button" class="btn btn-primary silme btn-sm" name="button">Oku</button>
                <?php else: ?>
                <button type="button" onclick="oku()" class="btn btn-primary  btn-sm" >Oku</button>

              <?php endif; ?>


            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php if (count($alternatifler)==0): ?>
        <div class="col-md-12">
          <div id="uyari" class="card">
    <div class="card-body text-center">
      Bu hikayeye henüz alternatif bir devam eklenmemiş gibi gözüküyor.
    </div>
  </div>
        </div>



        <?php endif; ?>

    <?php endif; ?>
    <!–– EĞER TIKLANILAN HİKAYE 1.SEVİYEYSE ONA GÖRE ALTERNATİFLER GÖSTERİLİR ––>


    <?php if ($_GET['seviye']==1): ?>
      <?php foreach ($alternatifler as $value): ?>

        <div class="col-md-<?php echo ceil($deneme) ?> ">

          <div class="card mb-4">
            <div class="card-body">
              <p id="metin"class="card-text qw"><?php echo $value->alteriki_metin ?> <br> <a href="profil/<?php echo $value->kullanici_adi  ?>"><?php echo $value->kullanici_adi ?></a>(<?php echo $value->alteriki_tarih ?>)</p>
              <a href="hikayeoku/<?php echo $value->alteriki_id ?>/<?php echo $value->alteriki_seviye ?>/<?php echo $value->alteriki_parentid ?>" class="btn btn-primary btn-sm">Hikayeyi Oku&rarr;</a>


            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php if (count($alternatifler)==0): ?>
        <div class="col-md-12">
          <div class="card">
    <div class="card-body text-center">
      Bu hikayeye henüz alternatif bir son eklenmemiş gibi gözüküyor.
    </div>
  </div>
        </div>



        <?php endif; ?>
    <?php endif; ?>



    <!-- Pagination -->






    <!-- /.row -->

  </div>
  <!-- /.container -->
</div>
<script>
setTimeout(function() {
        $("#uyari").fadeOut();
    }, 5000);

</script>

<?php             include 'wiew/footer.php';
 ?>
