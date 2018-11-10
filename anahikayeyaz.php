<?php

include 'init.php';

$anaHikaye = $connection->prepare("SELECT *
  FROM anahikaye
  INNER JOIN kullanici
  where kullanici.kullanici_id = anahikaye.kullanici_id");
  $anaHikaye->execute();
  $anaHikayeler = $anaHikaye->fetchAll(PDO::FETCH_OBJ);



include 'wiew/header.php';
  ?>


      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-10">

            <h1 class="my-4">Page Heading
              <small>Secondary Text</small>
            </h1>

            <!-- Blog Post -->

            <div class="card mb-4">
              <form method="post" action="yukle.php">
                <div class="form-group">
                  <input name="hikaye-baslik" type="text" class="form-control" placeholder="Hikaye Başlığı" required="required">
                </div>
                <textarea name="hikaye-metin" id="editor1" rows="10" cols="80">

                </textarea>
                <script>

                CKEDITOR.replace( 'hikaye-metin' );
                </script>
                <div class="buton">
                  <button type="submit" class="btn btn-primary">gönder</button>
                </div>
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
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

      </body>

      </html>
