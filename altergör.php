<?php

include 'init.php';
include 'functions.php';


if ($_GET['seviye']==0) {
  // EĞER TIKLANILAN ANA HİKAYEYSE SEVİYE = 0 SA alternatifi görülmek istenen hikayenin bilgileri
  $hikaye = $connection->prepare("SELECT * from kullanici natural JOIN anahikaye where anahikaye.hikaye_id=:hikaye_id ");
  $hikaye->execute(array('hikaye_id'=>$_GET['hikaye_id']));
  $hikaye = $hikaye->fetch(PDO::FETCH_OBJ);

  $birincialternatif = $hikaye->hikaye_devambir;
  $ikincialternatif = $hikaye->hikaye_devamiki;
  $ucuncualternatif = $hikaye->hikaye_devamuc;

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

  $birincialternatif = $hikaye->alterbir_devambir;
  $ikincialternatif = $hikaye->alterbir_devamiki;
  $ucuncualternatif = $hikaye->alterbir_devamuc;

  $asilHikaye = $connection->prepare("SELECT * from kullanici natural JOIN anahikaye where hikaye_id=:hikaye_id");
  $asilHikaye->execute(array('hikaye_id'=>$_GET['id']));
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
                    <p class="card-text"><?php echo $hikaye->hikaye_metin ?><a href="#"><?php echo $hikaye->kullanici_adi ?></a>(<?php echo $hikaye->hikaye_tarih ?>)</p>
                    <?php if (dolumu($_GET['hikaye_id'])==false): ?>
                      <a href="alterekle.php?parentid=<?php echo $hikaye->hikaye_id ?>&seviye=<?php echo $hikaye->hikaye_seviye ?>" class="btn btn-primary">alternatif ekle &rarr;</a>
                    <?php endif; ?>

                  </div>

                </div>

              <?php endif; ?>
              <!–– EĞER TIKLANILAN HİKAYE 1.SEVİYEYSE O GÖSTERİLİR ––>

              <?php if ($_GET['seviye']==1): ?>
                <div class="card mb-4">
                  <div class="card-body">

                    <p class="card-text"><?php echo $asilHikaye->hikaye_metin ?><a href="#"><?php echo $asilHikaye->kullanici_adi ?></a>(<?php echo $asilHikaye->hikaye_tarih ?>)</p>
                    <a href="altergör.php?hikaye_id=<?php echo $asilHikaye->hikaye_id ?>&seviye=<?php echo $asilHikaye->hikaye_seviye ?>" class="btn btn-primary">alternatifleri gör &rarr;</a>
                    <?php if (dolumu($asilHikaye->hikaye_id)==false): ?>
                      <a href="alterekle.php?parentid=<?php echo $asilHikaye->hikaye_id ?>&seviye=<?php echo $asilHikaye->hikaye_seviye ?>" class="btn btn-primary">alternatif ekle &rarr;</a>
                    <?php endif; ?>

                  </div>

                </div>
                <div class="card mb-4">
                  <div class="card-body">

                      <p class="card-text"><?php echo $hikaye->alterbir_metin ?><a href="#"><?php echo $hikaye->kullanici_adi ?></a>(<?php echo $hikaye->alterbir_tarih ?>)</p>
                    <?php if (dolumu2($hikaye->alterbir_id)==false): ?>
                      <a href="alterekle.php?parentid=<?php echo $hikaye->alterbir_id ?>&seviye=<?php echo $hikaye->alterbir_seviye ?>" class="btn btn-primary">alternatif ekle &rarr;</a>
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

                     <div class="card mb-4">
                       <div class="card-body">
                           <p class="card-text"><?php echo mb_substr($value->alterbir_metin,0,200) ?> <br> <a href="#"><?php echo $value->kullanici_adi ?></a>(<?php echo $value->alterbir_tarih ?>)</p>
                         <a href="altergör.php?hikaye_id=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>&id=<?php echo $value->alterbir_parentid ?>" class="btn btn-primary">alternatifleri gör &rarr;</a>
                         <?php if (dolumu2($value->alterbir_id)==false): ?>
                           <a href="alterekle.php?parentid=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>" class="btn btn-primary">alternatif ekle &rarr;</a>
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
                         <p class="card-text"><?php echo mb_substr($value->alteriki_metin,0,200) ?> <a href="#"><?php echo $value->kullanici_adi ?></a>(<?php echo $value->alteriki_tarih ?>)</p>
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
          <footer class="py-5 bg-dark">
            <div class="container">
              <p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
            </div>
            <!-- /.container -->
          </footer>

          <!-- Bootstrap core JavaScript -->
          <script src="vendor/jquery/jquery.min.js"></script>
          <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        </body>

        </html>
