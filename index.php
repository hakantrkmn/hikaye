<?php

include 'init.php';
include 'functions.php';
if (!isset($_GET['page'])) {
  $page=1;
}
else {
  $page=$_GET['page'];
}

$anaHikayeler = getStory($page);
$page = getPage();




include 'wiew/header.php';
?>
    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">Hikayeler

          </h1>

          <!-- Blog Post -->
          <?php foreach ($anaHikayeler as $hikaye): ?>
            <div class="card mb-4">
              <div class="card-body">
                <h2 class="card-title"><?php echo $hikaye->hikaye_baslik ?></h2>
                <p class="card-text"><?php echo mb_substr($hikaye->hikaye_metin,0,100) ?></p>
                <a href="detay.php?hikaye_id=<?php echo $hikaye->hikaye_id ?>" class="btn btn-primary">Daha Fazla &rarr;</a>

              </div>
              <div class="card-footer text-muted">
                  <a href="profil.php?kullanici=<?php echo $hikaye->kullanici_adi ?>"><?php echo $hikaye->kullanici_adi ?></a>
                  tarafından <?php echo $hikaye->hikaye_tarih ?> tarihinde yazıldı.
                  <input type="hidden" name="kullanici_id" value="$hikaye->kullanici_id">
                <a href="like.php?hikaye_id=<?php echo $hikaye->hikaye_id ?>" class="btn btn-sm btn-default"><span class="glyphicon glyphicon-thumbs-up"></span><i class="fas fa-thumbs-up"></i> <?php echo $hikaye->hikaye_begeni ?> </a>
              </div>
            </div>

          <?php endforeach; ?>






          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <?php for ($i=0;$i<$page;$i++): ?>
              <li class="page-item">
                <a class="page-link" href="index.php?page=<?php echo $i +1 ?>"> <?php echo $i +1 ?></a>
              </li>

            <?php endfor; ?>
          </ul>

        </div>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->


          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header">Categories</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">Web Design</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a href="#">JavaScript</a>
                    </li>
                    <li>
                      <a href="#">CSS</a>
                    </li>
                    <li>
                      <a href="#">Tutorials</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Side Widget -->

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
