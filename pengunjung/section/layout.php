<?php
/**
 * Code by Reyzeal
 * Jumat, 19 Juli 2019
 *
 * module LAYOUT VIEW MASTER
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>BKSDA YOGYAKARTA</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="img/favicon.png" rel="icon">
    <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/calendar.css" rel="stylesheet">
    <link href="lib/toastr/toastr.min.css" rel="stylesheet">

    <!-- =======================================================
      Theme Name: Avilon
      Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body>

<!--==========================
  Header
============================-->
<header id="header">
    <div class="container">

        <div id="logo" class="pull-left">
            <h1><a href="#intro" class="scrollto"> <b style="font-family:rockwell;font-size:48px"> BKSDA YOGYAKARTA</b> </a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="#intro"><img src="img/logo.png" alt="" title=""></a> -->
        </div>

        <nav id="nav-menu-container">
            <ul class="nav-menu d-flex">
                <li class="menu-active"><a href="#intro" style="font-size:16px">Home</a></li>
                <li><a href="#about" style="font-size:16px">About Us</a></li>
                <li><a href="#agenda" style="font-size:16px">Agenda</a></li>
                <li><a href="#news" style="font-size:16px">News</a></li>
                <li><a href="#contact" style="font-size:16px">Contact Us</a></li>
                <?php
                    if($AUTH->get()){
                        echo "<li><button onclick='window.open(\"../admin\")' class=\"btn btn-warning\" href='/admin' style=\"color:white;font-size:16px\"></span>&nbsp ADMIN  &nbsp</button></li>";
                    }else{
                        echo "<li><button class=\"btn btn-warning\" data-toggle=\"modal\" data-target=\"#modal-form-login\" style=\"color:white;font-size:16px\"></span>&nbsp LOGIN  &nbsp</button></li>";
                    };
                ?>

            </ul>
        </nav><!-- #nav-menu-container -->
    </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro">

    <div class="intro-text mt-5">
        <h2>WELCOME TO BKSDA YOGYAKARTA</h2>
        <p>"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."
            "There is no one who loves pain itself, who seeks after it and wants to have it, simply because it is pain..."</p>
        <a href="#about" class="btn-get-started scrollto">Yukkk Liat Lebih Banyak Tentang BKSDA</a>
    </div>

    <div class="product-screens">

        <div class="product-screen-1 wow fadeInUp" data-wow-delay="0.4s" data-wow-duration="0.6s">
            <img src="img/product-screen-0.png" style="border-radius: 50%;border: 1px solid #ff675b;"  alt="">
        </div>

        <div class="product-screen-2 wow fadeInUp" data-wow-delay="0.2s" data-wow-duration="0.6s">
            <img src="img/product-screen-0.png" style="border-radius: 50%;border: 1px solid #ff675b;" alt="">
        </div>

        <div class="product-screen-3 wow fadeInUp" data-wow-duration="0.6s">
            <img src="img/product-screen-0.png" style="border-radius: 50%;border: 1px solid #ff675b;" alt="">
        </div>

    </div>

</section><!-- #intro -->

<main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
        <div class="container-fluid">
            <div class="section-header">
                <h3 class="section-title">About Us</h3>
                <span class="section-divider"></span>
                <p class="section-description px-5">
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.
                </p>
            </div>

            <div class="row">
                <div class="col-lg-6 about-img wow fadeInLeft">
                    <img src="img/about-img.jpg" alt="">
                </div>

                <div class="col-lg-6 content wow fadeInRight">
                    <h2>BKSDA adalah {{ blablabla ...}}</h2>
                    <h3>{{ Blablabla ... }}</h3>
                    <p>
                        {{ Blablabla ...  }}
                    </p>

                    <ul>
                        <li><i class="ion-android-checkmark-circle"></i> {{ Blablabla ...  }}</li>
                        <li><i class="ion-android-checkmark-circle"></i> {{ Blablabla ...  }}</li>
                        <li><i class="ion-android-checkmark-circle"></i> {{ Blablabla ...  }}</li>
                    </ul>

                    <p>
                        {{ Blablabla ...  }}
                </div>
            </div>

        </div>
    </section><!-- #about -->

    <!--==========================
      Product Advanced Featuress Section
    ============================-->
    <section id="advanced-features">
        <?php require 'section/agenda.php';?>
        <?php require 'section/fauna_news.php';?>
    </section><!-- #advanced-features -->
    <?php require 'section/footer.php';?>

    <!-- Modal -->
    <div class="modal fade" id="modal-form-login" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="top:30%;left:1%">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">LOGIN</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" method="POST" action="proses/login.php">
                    <div class="modal-body" >
                        <div class="form-group">
                            <label>USERNAME</label>
                            <input class="form-control" name="username" type="text" required="">
                        </div>
                        <div class="form-group">
                            <label>PASSWORD</label>
                            <input class="form-control" name="password" type="password" required="">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="login" id="button_submit">Login</button>
                        </div>
                </form>


            </div>
        </div>
    </div>
    </div>
</main>

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="lib/jquery/jquery.min.js"></script>
<script src="lib/jquery/jquery-migrate.min.js"></script>
<script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/superfish/hoverIntent.js"></script>
<script src="lib/superfish/superfish.min.js"></script>
<script src="lib/magnific-popup/magnific-popup.min.js"></script>
<script src="lib/toastr/toastr.min.js"></script>

<!-- Contact Form JavaScript File -->
<script src="contactform/contactform.js"></script>

<!-- Template Main Javascript File -->
<script src="js/main.js"></script>
<?php
    if(isset($_SESSION['message']) && $_SESSION['message']){
        $type = $_SESSION['message']['type'];
        $msg = $_SESSION['message']['message'];
        echo "
            <script>
              toastr.$type('$msg')  ;
            </script>
        ";
        unset($_SESSION['message']);
    }
;?>

</body>
</html>
