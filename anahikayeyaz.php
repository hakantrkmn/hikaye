<?php

include 'init.php';


include 'wiew/header.php';
  ?>


      <!-- Page Content -->
      <div class="container">

        <div class="row">

          <!-- Blog Entries Column -->
          <div class="col-md-12">

            <h1 class="my-4">Hikaye </h1>

            <!-- Blog Post -->

            <div class="card mb-4">
              <form method="post" action="yukle.php">
                <div class="form-group">
                  <input name="hikaye-baslik"  type="text" class="form-control" placeholder="Hikaye Başlığı" required="required">
                </div>
                <textarea name="hikaye-metin" onkeyup="charcountupdate(this.value)" id="textbox"> </textarea>
                <div class="buton">
                  <strong><span id="charcount"></span> karakter</strong>
                  <button type="submit" class="btn btn-primary">gönder</button>
                </div>
              </form>
            </div>


          </div>


          <!-- /.row -->

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
