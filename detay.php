<?php

include 'init.php';
include 'functions.php';


//sadece detayı istenen hikayeyi alıyorum

$tiklananHikaye = $connection->prepare("SELECT * FROM anahikaye  NATURAL JOIN kullanici where anahikaye.hikaye_id = :hikaye_id ");
$tiklananHikaye->execute(array('hikaye_id'=>$_GET['hikaye_id']));
$tiklananHikaye = $tiklananHikaye->fetch(PDO::FETCH_OBJ);


//tıklanan hikayenin alteratiflerini alıyorum
//eğer anahikayenin alternatifi varsa beğeni sayısı en yüksek olanı alıyorum
if ($tiklananHikaye->hikaye_devambir!=0 or $tiklananHikaye->hikaye_devamiki!=0 or$tiklananHikaye->hikaye_devamuc!=0 )
{

  $birincialternatif = $connection->prepare("SELECT * from anahikaye as ak,alternatifbir as a1 where ak.hikaye_id=:hikaye_id and ak.hikaye_id=a1.alterbir_parentid order by  a1.alterbir_begeni desc");
  $birincialternatif->execute(array('hikaye_id'=>$_GET['hikaye_id']));
  $birincialternatif = $birincialternatif->fetch(PDO::FETCH_OBJ);
  $birincialternatif = $birincialternatif->alterbir_id;
  //birinci alternatifin idsini alıp ekrana yazdırıyorum
  $alternatifler = $connection->prepare("SELECT * from kullanici natural JOIN alternatifbir where alternatifbir.alterbir_id=$birincialternatif");
  $alternatifler->execute();
  $alternatifler = $alternatifler->fetch(PDO::FETCH_OBJ);
  $alterbirid = $alternatifler->alterbir_id;
  //eğer 1.alternatifin alternatifi varsa beğeni sayısı en yüksek olanı alıyorum
        if ($alternatifler->alterbir_devambir !=0 or $alternatifler->alterbir_devamiki !=0 or $alternatifler->alterbir_devamuc !=0)
          {
            $ikincialternatif=$connection->prepare("SELECT * from alternatifbir as ak,alternatifiki as a1 where ak.alterbir_parentid=:hikaye_id and ak.alterbir_id=a1.alteriki_parentid and alteriki_parentid=$alterbirid order by  a1.alteriki_begeni desc ");
            $ikincialternatif->execute(array('hikaye_id'=>$_GET['hikaye_id']));
            $ikincialternatif = $ikincialternatif->fetch(PDO::FETCH_OBJ);
            $ikincialternatif = $ikincialternatif->alteriki_id;
            //ikinci alternatifi alıp ekrana yazırıyorum
            $alternatifler2 = $connection->prepare("SELECT * from kullanici natural JOIN alternatifiki where alternatifiki.alteriki_id=$ikincialternatif");
            $alternatifler2->execute();
            $alternatifler2 = $alternatifler2->fetch(PDO::FETCH_OBJ);
            }



}
include 'wiew/header.php';
?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">

      <h1 class="my-4">En beğenilen alternatifler
      </h1>


      <div class="card mb-4">
        <div class="card-body">
          <h2 class="card-title"><?php echo $tiklananHikaye->hikaye_baslik ?></h2>
          <p class="card-text"><?php echo $tiklananHikaye->hikaye_metin ?></p>
          <a href="altergör.php?hikaye_id=<?php echo $tiklananHikaye->hikaye_id ?>&seviye=<?php echo $tiklananHikaye->hikaye_seviye ?>" class="btn btn-primary">Alternatif devamları gör &rarr;</a>
          <?php if (dolumu($_GET['hikaye_id'])==false): ?>
            <a href="alterekle.php?parentid=<?php echo $tiklananHikaye->hikaye_id ?>&seviye=<?php echo $tiklananHikaye->hikaye_seviye ?>" class="btn btn-primary">Alternatif devam ekle &rarr;</a>
          <?php endif; ?>
        </div>
        <div class="card-footer text-muted">
          Posted on <?php echo $tiklananHikaye->hikaye_tarih ?> by
          <a href="#"><?php echo $tiklananHikaye->kullanici_adi ?></a>
          <a href="like.php?hikaye_id=<?php echo $tiklananHikaye->hikaye_id ?>&seviye=<?php echo $tiklananHikaye->hikaye_seviye ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> <i class="fas fa-thumbs-up"></i> <?php echo $tiklananHikaye->hikaye_begeni ?> </a>
        </div>
      </div>



      <?php if ($tiklananHikaye->hikaye_devambir!=0): ?>
        <div class="card mb-4">
          <div class="card-body">
            <p class="card-text"><?php echo $alternatifler->alterbir_metin ?></p>
            <a href="altergör.php?hikaye_id=<?php echo $alternatifler->alterbir_id ?>&seviye=<?php echo $alternatifler->alterbir_seviye ?>&id=<?php echo $alternatifler->alterbir_parentid ?>" class="btn btn-primary">Alternatif devamları gör &rarr;</a>
            <?php if (dolumu2($alternatifler->alterbir_id)==false): ?>
              <a href="alterekle.php?parentid=<?php echo $alternatifler->alterbir_id ?>&seviye=<?php echo $alternatifler->alterbir_seviye ?>" class="btn btn-primary">Alternatif devam ekle &rarr;</a>
            <?php endif; ?>


          </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $alternatifler->alterbir_tarih ?> by
            <a href="#"><?php echo $alternatifler->kullanici_adi ?></a>
            <a href="like.php?hikaye_id=<?php echo $alternatifler->alterbir_id ?>&seviye=<?php echo $alternatifler->alterbir_seviye ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"></span><i class="fas fa-thumbs-up"></i> <?php echo $alternatifler->alterbir_begeni ?> </a>
          </div>
        </div>
      <?php endif; ?>
      <?php if (isset($alternatifler)): ?>
        <?php if ($alternatifler->alterbir_devambir!=0): ?>
          <div class="card mb-4">
            <div class="card-body">
              <p class="card-text"><?php echo $alternatifler2->alteriki_metin ?></p>
              <a href="hikayeoku.php?hikaye_id=<?php echo $alternatifler2->alteriki_id ?>&seviye=<?php echo $alternatifler2->alteriki_seviye ?>&id=<?php echo $alternatifler2->alteriki_parentid ?>" class="btn btn-primary">Hikayeyi Oku&rarr;</a>



            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $alternatifler2->alteriki_tarih ?> by
              <a href="#"><?php echo $alternatifler2->kullanici_adi ?></a>
              <a href="like.php?hikaye_id=<?php echo $alternatifler2->alteriki_id ?>&seviye=<?php echo $alternatifler2->alteriki_seviye ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"><i class="fas fa-thumbs-up"></i> </span><?php echo $alternatifler2->alteriki_begeni ?> </a>
            </div>
          </div>
        <?php endif; ?>
      <?php else: ?>
        <div class="card mb-4">
          <div class="card-body">
            <p class="card-text"><?php echo "BU HİKAYE DEVAM ETTİRİLLMEMİŞ GİBİ DURUYOR DEVAM ETTİRMEK İSTER MİSİN ?" ?></p>
            <a href="alterekle.php?parentid=<?php echo $tiklananHikaye->hikaye_id ?>&seviye=<?php echo $tiklananHikaye->hikaye_seviye ?>" class="btn btn-primary">alternatif ekle &rarr;</a>

          </div>
        </div>


      <?php endif; ?>

    </div>
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
