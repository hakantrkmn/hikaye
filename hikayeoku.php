<?php

include 'init.php';
//tıklanan hikayenin üst hikayesinin bilglileri
$birincialternatif = $connection->prepare("SELECT *
  from alternatifbir
  natural JOIN kullanici
  where alternatifbir.alterbir_id=:hikaye_id and alternatifbir.kullanici_id=kullanici.kullanici_id");
  $birincialternatif->execute(array('hikaye_id'=>$_GET['id']));
  $birincialternatif = $birincialternatif->fetch(PDO::FETCH_OBJ);

$anahikayeid = $birincialternatif->alterbir_parentid;

//tıklanan hikayenin ana hikayesinin bilglileri

$anahikaye = $connection->prepare("SELECT *
from anahikaye
natural JOIN kullanici
where anahikaye.hikaye_id=$anahikayeid and anahikaye.kullanici_id=kullanici.kullanici_id");
$anahikaye->execute();
$anahikaye = $anahikaye->fetch(PDO::FETCH_OBJ);




//tıklanan hikayenin kendisini alıyorum

$tiklananhikaye = $connection->prepare("SELECT *
from alternatifiki
natural JOIN kullanici
where alternatifiki.alteriki_id=:hikaye_id and alternatifiki.kullanici_id=kullanici.kullanici_id");
$tiklananhikaye->execute(array('hikaye_id'=>$_GET['hikaye_id']));
$tiklananhikaye = $tiklananhikaye->fetch(PDO::FETCH_OBJ);







include 'wiew/header.php';
 ?>


    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <h1 class="my-4">Tüm Hikaye
          </h1>

          <!–– TIKLANAN HİKAYENİN ANA HİKAYESİ ––>

            <div class="card mb-4">
              <div class="card-body">
                <h2 class="card-title"><?php echo $anahikaye->hikaye_baslik ?></h2>
                <p class="card-text"><?php echo $anahikaye->hikaye_metin ?></p>
                <a href="altergör.php?hikaye_id=<?php echo $anahikaye->hikaye_id ?>&seviye=<?php echo $anahikaye->hikaye_seviye ?>" class="btn btn-primary">alternatifleri gör &rarr;</a>
                <a href="alterekle.php?parentid=<?php echo $anahikaye->hikaye_id ?>&seviye=<?php echo $anahikaye->hikaye_seviye ?>" class="btn btn-primary">alternatif ekle &rarr;</a>
              </div>
              <div class="card-footer text-muted">
                Posted on <?php echo $anahikaye->hikaye_tarih ?> by
                <a href="#"><?php echo $anahikaye->kullanici_adi ?></a>
              </div>
              </div>

              <!–– TIKLANAN HİKAYENİN BİRİNCİ ALTERNATİFİ  ––>

                <div class="card mb-4">
                <div class="card-body">
                  <p class="card-text"><?php echo $birincialternatif->alterbir_metin ?></p>
                  <a href="altergör.php?hikaye_id=<?php echo $birincialternatif->alterbir_id ?>&seviye=<?php echo $birincialternatif->alterbir_seviye ?>&id=<?php echo $birincialternatif->alterbir_parentid ?>" class="btn btn-primary">alternatifleri gör &rarr;</a>
                  <a href="alterekle.php?parentid=<?php echo $birincialternatif->alterbir_id ?>&seviye=<?php echo $birincialternatif->alterbir_seviye ?>&id=<?php echo $birincialternatif->alterbir_parentid ?>" class="btn btn-primary">alternatif ekle &rarr;</a>

                </div>
                <div class="card-footer text-muted">
                  Posted on <?php echo $birincialternatif->alterbir_tarih ?> by
                  <a href="#"><?php echo $birincialternatif->kullanici_adi ?></a>
                </div>
                  </div>

                <!–– TIKLANAN HİKAYENİN KENDİSİ ––>
                <div class="card mb-4">
                <div class="card-body">
                  <p class="card-text"><?php echo $tiklananhikaye->alteriki_metin ?></p>
                  <a href="hikayeoku.php?hikaye_id=<?php echo $tiklananhikaye->alteriki_id ?>&seviye=<?php echo $tiklananhikaye->alteriki_seviye ?>&id=<?php echo $tiklananhikaye->alteriki_parentid ?>" class="btn btn-primary">Hikayeyi Oku&rarr;</a>

                </div>
                <div class="card-footer text-muted">
                  Posted on <?php echo $tiklananhikaye->alteriki_tarih ?> by
                  <a href="#"><?php echo $tiklananhikaye->kullanici_adi ?></a>
                </div>


            </div>
              </div>







          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>


      <!-- /.row -->

    </div>
    <!-- /.container -->

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
