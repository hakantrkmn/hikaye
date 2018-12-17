<?php

include 'init.php';
include 'class.php';
$Nhikaye = new alterhikaye();
$birincialternatif = $Nhikaye->getMainVideo($_GET['seviye']-1,$_GET['id']);
$anahikaye = $Nhikaye->getRootVideo($birincialternatif->alterbir_parentid);
$tiklananhikaye = $Nhikaye->getMainVideo($_GET['seviye'],$_GET['hikaye_id']);
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
          <h2 align="center"class="card-title"><?php echo $anahikaye->hikaye_baslik ?></h2>
          <p class="card-text"><?php echo $anahikaye->hikaye_metin ?> <br> <a href="profil.php?kullanici=<?php echo $anahikaye->kullanici_adi  ?>"><?php echo $anahikaye->kullanici_adi ?></a>(<?php echo $anahikaye->hikaye_tarih ?>)
            <a href="altergör.php?hikaye_id=<?php echo $anahikaye->hikaye_id ?>&seviye=<?php echo $anahikaye->hikaye_seviye ?>">Hikayeye git &rarr;</a></p>

            <!–– TIKLANAN HİKAYENİN BİRİNCİ ALTERNATİFİ  ––>
            <p class="card-text"><?php echo $birincialternatif->alterbir_metin ?> <br> <a href="profil.php?kullanici=<?php echo $birincialternatif->kullanici_adi  ?>"><?php echo $birincialternatif->kullanici_adi ?></a>(<?php echo $birincialternatif->alterbir_tarih ?>)<a href="altergör.php?hikaye_id=<?php echo $birincialternatif->alterbir_id ?>&seviye=<?php echo $birincialternatif->alterbir_seviye ?>&id=<?php echo $birincialternatif->alterbir_parentid ?>">Hikayeye git &rarr;</a></p>

            <!–– TIKLANAN HİKAYENİN KENDİSİ ––>
            <p class="card-text"><?php echo $tiklananhikaye->alteriki_metin ?> <br> <a href="profil.php?kullanici=<?php echo $tiklananhikaye->kullanici_adi  ?>"><?php echo $tiklananhikaye->kullanici_adi ?></a>(<?php echo $tiklananhikaye->alteriki_tarih ?>)</p>
          </div>
        </div>
      </div>
    </div>
  </div>
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
