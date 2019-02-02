<?php

  include 'class.php';
if (!isset($_GET['page'])) {
  $page=1;
}
else {
  $page=$_GET['page'];
}

//$anaHikayeler = getStory($page);
//$page = getPage();
$anaHikayeler = hikaye::getAllVideos($page);
$page = hikaye::getPage();




include 'wiew/header.php';
?>
    <!-- Page Content -->
    <div class="container sd">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

          <h1 class="my-4 ">Hikayeler

          </h1>

          <!-- Blog Post -->
          <?php foreach ($anaHikayeler as $hikaye): ?>
            <div onclick="location.href='altergör/<?php echo $hikaye->hikaye_id ?>/<?php echo $hikaye->hikaye_seviye ?>';"class="card mb-4">
              <div class="card-body">
                <h2 class="card-title" align="center"><?php echo $hikaye->hikaye_baslik ?></h2>
                <p class="card-text"><?php echo mb_substr($hikaye->hikaye_metin,0,200) ?></p>

              </div>

            </div>

          <?php endforeach; ?>






          <!-- Pagination -->
          <ul class="pagination justify-content-center pg-blue pagination-lg">
            <?php for ($i=0;$i<$page;$i++): ?>
              <li class="page-item">
                <a class="page-link" href="index/<?php echo $i +1 ?>"> <?php echo $i +1 ?></a>
              </li>

            <?php endfor; ?>
          </ul>

        </div>



      </div>
      <!-- /.row -->

    </div>
    
    <!-- Footer -->

    <!-- Bootstrap core JavaScript -->

<?php
include 'wiew/footer.php';
  ?>
