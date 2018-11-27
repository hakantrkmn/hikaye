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
        <div class="col-md-10">

          <h1 class="my-4">Hikayeler

          </h1>

          <!-- Blog Post -->
          <?php foreach ($anaHikayeler as $hikaye): ?>
            <div class="card mb-4">
              <div class="card-body">
                <h2 class="card-title" align="center"><?php echo $hikaye->hikaye_baslik ?></h2>
                <p class="card-text"><?php echo mb_substr($hikaye->hikaye_metin,0,200) ?></p>
                <a href="altergör.php?hikaye_id=<?php echo $hikaye->hikaye_id ?>&seviye=<?php echo $hikaye->hikaye_seviye ?>" >Devamı &rarr;</a>

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
