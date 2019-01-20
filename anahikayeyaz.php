<?php
include 'class.php';
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
                  <button id="buton" type="submit" class="btn btn-primary">gönder</button>
                </div>
              </form>
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
<script>
$( "#buton" ).click(function(event){
  if ($( "#textbox" ).val().length<50) {
    swal({
      title: 'Az Karakter!',
      text: 'Minimum Karakter Sayısı 50',
      icon: 'info',
      button: 'Anladım'
    })
    event.preventDefault();
}
})
</script>
      </html>
