<?php

include 'init.php';

//eğer alternatif eklenmek istenen hikaye 1. seviyeyse ona göre sorgu
if ($_GET['seviye']==1) {
  //alternatifi istenen hikaye
  $hikaye = $connection->prepare("SELECT *
  FROM alternatifbir
  INNER JOIN kullanici
  where kullanici.kullanici_id = alternatifbir.kullanici_id and alternatifbir.alterbir_id =:hikaye_id");
  $hikaye->execute(array('hikaye_id'=>$_GET['parentid']));
  $hikaye = $hikaye->fetch(PDO::FETCH_OBJ);

  $id = $hikaye->alterbir_parentid;

//alternatif eklenmek istenen hikayenin parent hikayesi

  $parenthikaye = $connection->prepare("SELECT *
  FROM anahikaye
  INNER JOIN kullanici
  where kullanici.kullanici_id = anahikaye.kullanici_id and anahikaye.hikaye_id =$id");
  $parenthikaye->execute();
  $parenthikaye = $parenthikaye->fetch(PDO::FETCH_OBJ);
}
//eğer tıklanan hikaye 0.seviyeyse ona göre sorgu
if ($_GET['seviye']==0) {
  //alternatifi istenen hikaye
  $parenthikaye = $connection->prepare("SELECT *
  FROM anahikaye
  INNER JOIN kullanici
  where kullanici.kullanici_id = anahikaye.kullanici_id and anahikaye.hikaye_id =:id");
  $parenthikaye->execute(array('id'=> $_GET['parentid']));
  $parenthikaye = $parenthikaye->fetch(PDO::FETCH_OBJ);
}






  ?>

  <!DOCTYPE html>
  <html lang="tr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content>

    <script src="ckeditor/ckeditor.js"></script>

    <title>Blog Home - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link rel="stylesheet" type="text/css" href="style.css" />

    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php">Hoşgeldin <?php echo $_SESSION['kullanici_adi'] ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Ana Sayfa
                <span class="sr-only">(current)</span>
              </a>
              </li
              <li class="nav-item">
                <a class="nav-link" href="anahikayeyaz.php">Hikaye yaz</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-12">

            <h1 class="my-4">Alternatif Ekle

            </h1>

            <!-- Blog Post -->
         <?php if ($_GET['seviye']==0): ?>
              <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $parenthikaye->hikaye_baslik ?></h2>
                  <p class="card-text"><?php echo $parenthikaye->hikaye_metin ?></p>
                </div>
                <div class="card-footer text-muted">
                  <a href="#"><?php echo $parenthikaye->kullanici_adi ?></a>
                  tarafından <?php echo $parenthikaye->hikaye_tarih ?> tarihinde yazıldı
                </div>
              </div>
           <?php endif; ?>



            <?php if ($_GET['seviye']==1): ?>
              <div class="card mb-4">
                <div class="card-body">
                  <h2 class="card-title"><?php echo $parenthikaye->hikaye_baslik ?></h2>
                  <p class="card-text"><?php echo $parenthikaye->hikaye_metin ?></p>
                </div>
                <div class="card-footer text-muted">
                  <a href="#"><?php echo $parenthikaye->kullanici_adi ?></a>
                  tarafından <?php echo $parenthikaye->hikaye_tarih ?> tarihinde yazıldı
                </div>
                <div class="card mb-4">

                <div class="card-body">
                  <p class="card-text"><?php echo $hikaye->alterbir_metin ?></p>
                </div>
                <div class="card-footer text-muted">
                  <a href="#"><?php echo $hikaye->kullanici_adi ?></a>
                  tarafından <?php echo $hikaye->alterbir_tarih ?> tarihinde yazıldı.
                </div>
              </div>
                  </div>

            <?php endif; ?>


            <div class="card mb-4">
              <form method="post" action="yukle.php?parentid=<?php echo $_GET['parentid'] ; ?>&seviye=<?php echo $_GET['seviye'] ?>">
                <textarea  name="alter-metin" onkeyup="countChar(this)" id="field" rows="10" cols="80">

                </textarea>
                <script>

                CKEDITOR.replace( 'field' );
                </script>
                <div class="buton">
                  <button type="submit" class="btn btn-primary">gönder</button>
                </div>
                <div id="charNum"></div>
              </form>
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
        <script src="javadeneme.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>

      </html>
