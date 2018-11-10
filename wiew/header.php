<!DOCTYPE html>
<html lang="tr">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

        <script src="ckeditor/ckeditor.js"></script>



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kendi Hikayeni Yaz</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/blog-home.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.php?page=1">Hoşgeldin <?php if (isset($_SESSION['kullanici_adi'])): ?>
          <?php echo $_SESSION['kullanici_adi'] ?>
          <?php else: ?>
            <?php echo "Merhaba hikaye yazabilmek için giriş yapmalısın" ?>
        <?php endif; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php?page=1">Ana Sayfa
                <span class="sr-only">(current)</span>
              </a>
            </li
            <li class="nav-item">
              <?php if (isset($_SESSION['kullanici_adi'])): ?>
              <a class="nav-link" href="anahikayeyaz.php">

                  Hikaye Yaz

                </a>
                <?php else: ?>
                  <a class="nav-link" href="login.php">

                      Giriş Yap

                    </a>
                <?php endif; ?>


            </li>
          </ul>
        </div>
      </div>
    </nav>
