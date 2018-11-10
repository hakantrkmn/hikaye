<?php

include 'init.php';
include 'functions.php';

$videos = $connection->prepare("SELECT * FROM anahikaye , kullanici where kullanici.kullanici_adi=:name and kullanici.kullanici_id=anahikaye.kullanici_id ORDER BY hikaye_id DESC");
$videos->execute(array('name'=>$_GET['kullanici']));

$videos=$videos->fetchAll(PDO::FETCH_OBJ);

$videos2 = $connection->prepare("SELECT * FROM alternatifbir , kullanici where kullanici.kullanici_adi=:name and kullanici.kullanici_id=alternatifbir.kullanici_id ORDER BY alterbir_id DESC");
$videos2->execute(array('name'=>$_GET['kullanici']));

$videos2=$videos2->fetchAll(PDO::FETCH_OBJ);

$videos3 = $connection->prepare("SELECT * FROM alternatifiki , kullanici where kullanici.kullanici_adi=:name and kullanici.kullanici_id=alternatifiki.kullanici_id ORDER BY alteriki_id DESC");
$videos3->execute(array('name'=>$_GET['kullanici']));

$videos3=$videos3->fetchAll(PDO::FETCH_OBJ);


include 'wiew/header.php';
?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">

      <h1 class="my-4">yazdığı ana Hikayeler
      </h1>

<?php foreach ($videos as  $value): ?>
  <div class="card mb-4">
    <div class="card-body">
      <h2 class="card-title"><?php echo $value->hikaye_baslik ?></h2>
      <p class="card-text"><?php echo $value->hikaye_metin ?></p>
      <a href="altergör.php?hikaye_id=<?php echo $value->hikaye_id ?>&seviye=<?php echo $value->hikaye_seviye ?>" class="btn btn-primary">Alternatif devamları gör &rarr;</a>
      <?php if (dolumu($value->hikaye_id)==false): ?>
        <a href="alterekle.php?parentid=<?php echo $value->hikaye_id ?>&seviye=<?php echo $value->hikaye_seviye ?>" class="btn btn-primary">Alternatif devam ekle &rarr;</a>
      <?php endif; ?>


    </div>
    <div class="card-footer text-muted">
      Posted on <?php echo $value->hikaye_tarih ?> by
      <a href="#"><?php echo $value->kullanici_adi ?></a>
      <a href="like.php?hikaye_id=<?php echo $value->hikaye_id ?>&seviye=<?php echo $value->hikaye_seviye ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> <i class="fas fa-thumbs-up"></i> <?php echo $value->hikaye_begeni ?> </a>
    </div>
  </div>
<?php endforeach; ?>
<h2 class="my-4">yazdığı 1.devam Hikayeler
</h2>

<?php foreach ($videos2 as  $value): ?>
<div class="card mb-4">
<div class="card-body">
<p class="card-text"><?php echo $value->alterbir_metin ?></p>
<a href="altergör.php?hikaye_id=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>" class="btn btn-primary">Alternatif devamları gör &rarr;</a>
<?php if (dolumu2($value->alterbir_id)==false): ?>
  <a href="alterekle.php?parentid=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>" class="btn btn-primary">Alternatif devam ekle &rarr;</a>
<?php endif; ?>


</div>
<div class="card-footer text-muted">
Posted on <?php echo $value->alterbir_tarih ?> by
<a href="#"><?php echo $value->kullanici_adi ?></a>
<a href="like.php?hikaye_id=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> <i class="fas fa-thumbs-up"></i> <?php echo $value->alterbir_begeni ?> </a>
</div>
</div>
<?php endforeach; ?>


<h3 class="my-4">yazdığı 2.devam Hikayeler
</h3>

<?php foreach ($videos3 as  $value): ?>
<div class="card mb-4">
<div class="card-body">
<p class="card-text"><?php echo $value->alteriki_metin ?></p>
</div>
<div class="card-footer text-muted">
Posted on <?php echo $value->alteriki_tarih ?> by
<a href="#"><?php echo $value->kullanici_adi ?></a>
<a href="like.php?hikaye_id=<?php echo $value->alteriki_id ?>&seviye=<?php echo $value->alteriki_seviye ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"></span> <i class="fas fa-thumbs-up"></i> <?php echo $value->alteriki_begeni ?> </a>
</div>
</div>
<?php endforeach; ?>






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
