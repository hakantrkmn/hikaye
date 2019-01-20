<?php

include 'class.php';
$kendiProfili=0;
if (isset($_SESSION['kullanici_adi'])) {
  if ($_SESSION['kullanici_adi']==$_GET['kullanici']) {
    $kendiProfili = 1;
  }
}
$story = new user();
$rootStory = $story->userStory(0,$_GET['kullanici']);

$alterStory = $story->userStory(1,$_GET['kullanici']);

$alterStory2 = $story->userStory(2,$_GET['kullanici']);


include 'wiew/header.php';
?>
<!-- Page Content -->
<div class="container">

  <div class="row">

    <!-- Blog Entries Column -->
    <div class="col-md-12">

      <h1 class="my-4 baslik">Yazdığı Ana Hikayeler
      </h1>
<?php foreach ($rootStory as  $value): ?>



  <div class="card mb-4">
    <div class="card-body">
      <h2 align="center" class="card-title"><?php echo $value->hikaye_baslik ?></h2>
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
<h2 class="my-4 baslik">Yazdığı 1.Devam Hikayeler
</h2>

<?php foreach ($alterStory as  $value): ?>
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


<h3 class="my-4 baslik">Yazdığı 2.Devam Hikayeler
</h3>

<?php foreach ($alterStory2 as  $value): ?>
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


<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
