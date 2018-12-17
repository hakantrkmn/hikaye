<?php

include 'init.php';
include 'functions.php';
include 'class.php';

//kullanici varsa ekleyebilir yoksa önceki sayfaya yönlendirilir
if (kullanicivarmi()) {

  if ($_POST['seviye']==1) {
    $Nhikaye = new alterhikaye();
  }
  if ($_POST['seviye']==0) {
    $Nhikaye = new hikaye();
  }

  //eğer alternatif eklenmek istenen hikaye 1. seviyeyse ona göre sorgu
  if ($_POST['seviye']==1) {
    //alternatifi istenen hikaye
    $hikaye = $Nhikaye->getMainVideo($_POST['seviye'],$_POST['parentid']);

      //alternatif eklenmek istenen hikayenin parent hikayesi

      $parenthikaye = $Nhikaye->getRootVideo($hikaye->alterbir_parentid);
      }
      if ($_POST['seviye']==0) {
        $parenthikaye =  $Nhikaye->getMainVideo($_POST['seviye'],$_POST['parentid']);
        }





include 'wiew/header.php';
        ?>


            <!-- Page Content -->
            <div class="container">

              <div class="row">

                <!-- Blog Entries Column -->
                <div class="col-md-12">

                  <h1 class="my-4">Alternatif Ekle

                  </h1>

                  <!-- Blog Post -->
                  <?php if ($_POST['seviye']==0): ?>
                    <div class="card mb-4">
                      <div class="card-body">
                        <h2 align="center" class="card-title"><?php echo $parenthikaye->hikaye_baslik ?></h2>
                        <p class="card-text"><?php echo $parenthikaye->hikaye_metin ?> <br> <a href="#"><?php echo $parenthikaye->kullanici_adi ?></a>(<?php echo $parenthikaye->hikaye_tarih ?>)</p>
                      </div>

                    </div>
                  <?php endif; ?>



                  <?php if ($_POST['seviye']==1): ?>
                    <div class="card mb-4">
                      <div class="card-body">
                        <h2 align="center"class="card-title"><?php echo $parenthikaye->hikaye_baslik ?></h2>
                        <p class="card-text"><?php echo $parenthikaye->hikaye_metin ?> <br> <a href="profil.php?kullanici=<?php echo $parenthikaye->kullanici_adi  ?>"><?php echo $parenthikaye->kullanici_adi ?></a>(<?php echo $parenthikaye->hikaye_tarih ?>)</p>
                        <p class="card-text"><?php echo $hikaye->alterbir_metin ?> <br> <a href="profil.php?kullanici=<?php echo $hikaye->kullanici_adi  ?>"><?php echo $hikaye->kullanici_adi ?></a>(<?php echo $hikaye->alterbir_tarih ?>)</p>
                      </div>

                    </div>

                  <?php endif; ?>


                  <div class="card mb-4">
                    <form method="post" action="yukle.php?parentid=<?php echo $_POST['parentid'] ; ?>&seviye=<?php echo $_POST['seviye'] ?>">
                      <textarea  name="alter-metin" onkeyup="charcountupdate(this.value)" id="textbox"> </textarea>
                      <div class="buton">
                        <strong><span id="charcount"></span> karakter</strong>
                        <button type="submit" class="btn btn-primary">gönder</button>
                      </div>
                    </form>
                  </div>
                </div>
                <!-- /.row -->
              </div>
              </div>
              <!-- /.container -->

              <!-- Footer -->
              <footer class="py-5 bg-dark as">
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
            <?php


          }

          else {

            header('Location: ' . $_SERVER['HTTP_REFERER']);



          }
