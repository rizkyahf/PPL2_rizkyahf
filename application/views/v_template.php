<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?=base_url();?>assets/img/icon_main.png">

    <title>UTS - A Souvenir Shop</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>assets/css/custom.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>assets/bootstrap/js/jquery-3.3.1.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.js"></script>
  </head>

  <body>

    <div class="container-fluid title-shop">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                    <div class="col-md-2">
                        <img class="img-responsive" src="<?=base_url();?>assets/img/icon_main.png">
                    </div>
                    <div class="col-md-10 title-container">
                        <p class="title-big"> Souvenir Shop </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid custom-navbar">
        <div class="row">
            <div class="col-md-12">
                <div class="container">
                        <div class="col-md-3 menu-button"><a href="<?=base_url();?>">Home</a></div>
                        <div class="col-md-3 menu-button"><a href="<?=base_url();?>index.php/c_souvenir/display">Souvenir</a></div>
                        <div class="col-md-3 menu-button"><a href="<?=base_url();?>index.php/c_cart/display">My Cart</a></div>
                        <div class="col-md-3 menu-button"><a href="<?=base_url();?>index.php/c_transaksi/display_all">Daftar Transaksi (admin)</a></div>
                        <!-- <?php if(isset($_SESSION['username'])): ?>
                        <div class="col-md-3 menu-button"><a href="template.php?page=admin">Admin Page</a></div>
                        <div class="col-md-3 menu-button"><a href="logout.php">Logout</a></div>
                        <?php endif; ?> -->
                </div>
            </div>
        </div>
    </div>

    <div class="container body-section">

      <?php echo $content_div; ?>

    </div><!-- /.container -->

    <footer class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <p>All Rights Reserved &copy; 2019 - UTS PPL by RizkyAHF_</p>
            </div>
        </div>
    </footer>

  </body>
</html>
