<?php

include 'init.php';
include 'functions.php';
$kendiProfili=0;
if (isset($_SESSION['kullanici_adi'])) {
  if ($_SESSION['kullanici_adi']==$_GET['kullanici']) {
    $kendiProfili = 1;
  }
}

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
      <a href="altergör.php?hikaye_id=<?php echo $value->hikaye_id ?>&seviye=<?php echo $value->hikaye_seviye ?>" class="btn btn-primary">Hikayeye Git &rarr;</a>
      <?php if ($kendiProfili==1): ?>
        <form style="display:inline-block;"class="" action="hikayesil.php" method="post">
          <button type="submit"class="btn btn-danger">Hikayeyi Sil!</button>
          <input type="hidden" name="hikaye_id" value="<?php echo $value->hikaye_id ?>">
          <input type="hidden" name="seviye" value="<?php echo $value->hikaye_seviye ?>">
        </form>
<?php endif; ?>

    </div>
  </div>
<?php endforeach; ?>
<h2 class="my-4">yazdığı 1.devam Hikayeler
</h2>

<?php foreach ($videos2 as  $value): ?>
<div class="card mb-4">
<div class="card-body">
<p class="card-text"><?php echo $value->alterbir_metin ?></p>
<a href="altergör.php?hikaye_id=<?php echo $value->alterbir_id ?>&seviye=<?php echo $value->alterbir_seviye ?>" class="btn btn-primary">Hikayeye Git &rarr;</a>
<?php if ($kendiProfili==1): ?>
  <form style="display:inline-block;"class="" action="hikayesil.php" method="post">
    <button type="submit"class="btn btn-danger" name="button">Hikayeyi Sil!</button>
    <input type="hidden" name="hikaye_id" value="<?php echo $value->alterbir_id ?>">
    <input type="hidden" name="seviye" value="<?php echo $value->alterbir_seviye ?>">
  </form>

<?php endif; ?>



</div>
</div>
<?php endforeach; ?>


<h3 class="my-4">yazdığı 2.devam Hikayeler
</h3>

<?php foreach ($videos3 as  $value): ?>
<div class="card mb-4">
<div class="card-body">
<p class="card-text"><?php echo $value->alteriki_metin ?></p>
<a href="hikayeoku.php?hikaye_id=<?php echo $value->alteriki_id ?>&seviye=<?php echo $value->alteriki_seviye ?>&id=<?php echo $value->alteriki_parentid ?>" class="btn btn-primary">Hikayeyi Oku&rarr;</a>
<?php if ($kendiProfili==1): ?>
  <form style="display:inline-block;"class="" action="hikayesil.php" method="post">
    <button type="submit"class="btn btn-danger">Hikayeyi Sil!</button>
    <input type="hidden" name="hikaye_id" value="<?php echo $value->alteriki_id ?>">
    <input type="hidden" name="seviye" value="<?php echo $value->alteriki_seviye ?>">
  </form>
<?php endif; ?>
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
