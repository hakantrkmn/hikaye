<?php

include 'init.php';
include 'functions.php';


if ($_GET['seviye']==0) {
  // EĞER TIKLANILAN ANA HİKAYEYSE SEVİYE = 0 SA alternatifi görülmek istenen hikayenin bilgileri
  $hikaye = $connection->prepare("SELECT * from kullanici natural JOIN anahikaye where anahikaye.hikaye_id=:hikaye_id ");
  $hikaye->execute(array('hikaye_id'=>$_GET['hikaye_id']));
  $hikaye = $hikaye->fetch(PDO::FETCH_OBJ);

  if ($hikaye->hikaye_devambir=="") {
    $birincialternatif = "NULL";
  }
  else {
    $birincialternatif = $hikaye->hikaye_devambir;
  }
  if ($hikaye->hikaye_devamiki=="") {
    $ikincialternatif = "NULL";
  }
  else {
    $ikincialternatif = $hikaye->hikaye_devamiki;
  }
  if ($hikaye->hikaye_devamuc=="") {
    $ucuncualternatif = "NULL";
  }
  else {
    $ucuncualternatif = $hikaye->hikaye_devamuc;
  }


  $hikaye_id = $_GET['hikaye_id'];

  //alternatifi görülmek istenen hikayenin alternatiflerini burda
  $alternatifler = $connection->prepare("  SELECT * from kullanici natural JOIN alternatifbir where (alterbir_id=$birincialternatif or alterbir_id=$ikincialternatif or alterbir_id=$ucuncualternatif) and alternatifbir.alterbir_parentid =$hikaye_id");
  $alternatifler->execute();
  $alternatifler = $alternatifler->fetchAll(PDO::FETCH_OBJ);

}

if ($_GET['seviye']==1) {
  //alternatifi görülmek istenen hikayenin bilgileri
  $hikaye = $connection->prepare("SELECT * from kullanici natural JOIN alternatifbir where alternatifbir.alterbir_id=:hikaye_id");
  $hikaye->execute(array('hikaye_id'=>$_GET['hikaye_id']));
  $hikaye = $hikaye->fetch(PDO::FETCH_OBJ);

  if ($hikaye->alterbir_devambir=="") {
    $birincialternatif = "NULL";
  }
  else {
    $birincialternatif = $hikaye->alterbir_devambir;
  }
  if ($hikaye->alterbir_devamiki=="") {
    $ikincialternatif = "NULL";
  }
  else {
    $ikincialternatif = $hikaye->alterbir_devamiki;
  }
  if ($hikaye->alterbir_devamuc=="") {
    $ucuncualternatif = "NULL";
  }
  else {
    $ucuncualternatif = $hikaye->alterbir_devamuc;
  }

  $asilHikayeId = $hikaye->alterbir_parentid;

  $asilHikaye = $connection->prepare("SELECT * from kullanici natural JOIN anahikaye where hikaye_id=$asilHikayeId");
  $asilHikaye->execute();
  $asilHikaye = $asilHikaye->fetch(PDO::FETCH_OBJ);

  $hikaye_id = $_GET['hikaye_id'];

  //alternatifi görülmek istenen hikayenin alternatiflerini burda
  $alternatifler = $connection->prepare("SELECT * from kullanici natural JOIN alternatifiki where (alternatifiki.alteriki_id=$birincialternatif or alternatifiki.alteriki_id=$ikincialternatif or alternatifiki.alteriki_id=$ucuncualternatif) and alternatifiki.alteriki_parentid =$hikaye_id");
  $alternatifler->execute();
  $alternatifler = $alternatifler->fetchAll(PDO::FETCH_OBJ);

}
include 'wiew/header.php';
?>
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div  class="col-md-12">




      <h1 class="my-4">Alternatif devamlar
      </h1>

      <!-- Blog Post -->
      <!–– EĞER TIKLANILAN HİKAYE ANA HİKAYEYSE O GÖSTERİLİR ––>

      <?php if ($_GET['seviye']==0): ?>
        <div class="card mb-4">
          <div class="card-body">
            <h2 align="center"class="card-title"><?php echo $hikaye->hikaye_baslik ?></h2>
            <p class="card-text"><?php echo $hikaye->hikaye_metin ?><br> <a href="profil.php?kullanici=<?php echo $hikaye->kullanici_adi  ?>"><?php echo $hikaye->kullanici_adi ?></a>(<?php echo $hikaye->hikaye_tarih ?>)</p>
            <?php if (dolumu($_GET['hikaye_id'])==false): ?>
              <form class="" action="alterekle.php" method="post">
                <input type="hidden" name="parentid" value="<?php echo $hikaye->hikaye_id ?>">
                <input type="hidden" name="seviye" value="<?php echo $hikaye->hikaye_seviye ?>">
                <?php if (isset($_SESSION['kullanici_adi'])): ?>
                  <?php if ($_SESSION['kullanici_adi']==$hikaye->kullanici_adi): ?>
                    <?php else: ?>
                      <button class="btn btn-primary"type="submit">devam ettir &rarr;</button>

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

            <p class="card-text"><?php echo $asilHikaye->hikaye_metin ?><br> <a href="profil.php?kullanici=<?php echo $asilHikaye->kullanici_adi  ?>"><?php echo $asilHikaye->kullanici_adi ?></a>(<?php echo $asilHikaye->hikaye_tarih ?>)<a  href="altergör.php?hikaye_id=<?php echo $asilHikaye->hikaye_id ?>&seviye=<?php echo $asilHikaye->hikaye_seviye ?>" class="btn btn-link">Hikayeye git &rarr;</a>
            </p>

              <p class="card-text"><?php echo $hikaye->alterbir_metin ?> <br> <a href="profil.php?kullanici=<?php echo $hikaye->kullanici_adi  ?>"><?php echo $hikaye->kullanici_adi ?></a>(<?php echo $hikaye->alterbir_tarih ?>)</p>
              <?php if (dolumu2($hikaye->alterbir_id)==false): ?>
                <form class="" action="alterekle.php" method="post">
                  <input type="hidden" name="parentid" value="<?php echo $hikaye->alterbir_id ?>">
                  <input type="hidden" name="seviye" value="<?php echo $hikaye->alterbir_seviye ?>">

                  <?php if (isset($_SESSION['kullanici_adi'])): ?>
                    <?php if ($_SESSION['kullanici_adi']==$hikaye->kullanici_adi): ?>

                    <?php elseif ($_SESSION['kullanici_adi']==$asilHikaye->kullanici_adi):?>
                    <?php else: ?>

                        <button class="btn btn-primary"type="submit">devam ettir &rarr;</button>

                    <?php endif; ?>

                  <?php endif; ?>
                </form>
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
                <p id="metin"class="card-text qw"><?php echo $value->alterbir_metin?> <br> <a href="profil.php?kullanici=<?php echo $value->kullanici_adi  ?>"><?php echo $value->kullanici_adi ?></a>(<?php echo $value->alterbir_tarih ?>)</p>
                <a href="altergör.php?hikaye_id=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>&id=<?php echo $value->alterbir_parentid ?>" class="btn btn-primary">alternatifleri gör &rarr;</a>
                <?php if (count($alternatifler)>1): ?>
                  <a id="silme" class="btn btn-primary">Oku</a>
                <?php endif; ?>


              </div>
            </div>
          </div>
        <?php endforeach; ?>

      <?php endif; ?>
      <!–– EĞER TIKLANILAN HİKAYE 1.SEVİYEYSE ONA GÖRE ALTERNATİFLER GÖSTERİLİR ––>


      <?php if ($_GET['seviye']==1): ?>
        <?php foreach ($alternatifler as $value): ?>

          <div class="col-md-<?php echo ceil($deneme) ?> ">

            <div class="card mb-4">
              <div class="card-body">
                <p id="metin"class="card-text qw"><?php echo $value->alteriki_metin ?> <br> <a href="profil.php?kullanici=<?php echo $value->kullanici_adi  ?>"><?php echo $value->kullanici_adi ?></a>(<?php echo $value->alteriki_tarih ?>)</p>
                <a href="hikayeoku.php?hikaye_id=<?php echo $value->alteriki_id ?>&seviye=<?php echo $value->alteriki_seviye ?>&id=<?php echo $value->alteriki_parentid ?>" class="btn btn-primary">Hikayeyi Oku&rarr;</a>


              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>



      <!-- Pagination -->






      <!-- /.row -->

    </div>
    <!-- /.container -->
  </div>


  <!-- Footer -->


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
