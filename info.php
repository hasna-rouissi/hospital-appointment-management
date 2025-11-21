<?php
require( 'connection.php' );
session_start();

if ( isset( $_POST[ 'sub' ] ) ) {
    if ( empty( $_POST[ 'email' ] ) or empty( $_POST[ 'pass' ] ) ) {

    } else {

        $log = $_POST[ 'email' ];
        $mot = $_POST[ 'pass' ];
        $req = $connexion->prepare( 'SELECT * FROM patient WHERE emailP=? AND passwordP=?' );
        $req->execute( [ $log, $mot ] );
        $res = $req->fetchAll();

        if ( count( $res ) >= 1 ) {
            foreach ( $res as $v ) {
                $_SESSION[ 'login' ] = $v[ 'prenomP' ].' '.$v[ 'nomP' ];
                $_SESSION[ 'id' ] = $v[ 'idP' ];
            }

            exit;
        } else {
            echo 'erreur de login/mot de passe';
        }
    }
}
?>

<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8'>
    <title>MedLink </title>
    <meta content='width=device-width, initial-scale=1.0' name='viewport'>
    <meta content='Free HTML Templates' name='keywords'>
    <meta content='Free HTML Templates' name='description'>

    <!-- Favicon -->
    <link href='img/favicon.ico' rel='icon'>

    <!-- Google Web Fonts -->
    <link rel='preconnect' href='https://fonts.gstatic.com'>
    <link
        href='https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap'
        rel='stylesheet'>

    <!-- Icon Font Stylesheet -->
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css' rel='stylesheet'>

    <!-- Libraries Stylesheet -->
    <link href='lib/owlcarousel/assets/owl.carousel.min.css' rel='stylesheet'>
    <link href='lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css' rel='stylesheet' />

    <!-- Customized Bootstrap Stylesheet -->
    <link href='css/bootstrap.min.css' rel='stylesheet'>

    <!-- Template Stylesheet -->
    <link href='css/style.css' rel='stylesheet'>
</head>

<body>

    <!-- Navbar Start -->
    <div class="container-fluid sticky-top bg-white shadow-sm mb-5">
        <div class="container">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
                <a href="index.php" class="navbar-brand">
                    <h2 class="m-0 text-uppercase text-dark"><img src='img/1.png' width='60px'></i>MedLink</h2>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0">
                        <a href="index.php" class="nav-item nav-link">Home</a>
                        <a href="rendez-vous.php" class="nav-item nav-link">Appointment</a>
                        <a href="order.php" class="nav-item nav-link">Order tracking</a>
                        <a href="blogS.php" class="nav-item nav-link">Blog</a>
                        <a href="roomP.php" class="nav-item nav-link">Message</a>
                        <?php
                        if (empty($_SESSION['login'])) {
                            ?>
                          
                            <a href="login.php" class="nav-item nav-link">Login</a>
                        <a href="register.php" class="nav-item nav-link">Register</a>
                        <?php
                        }
                        else{
                            ?>
                        
                            <p class="nav-link">Hello <?php echo $_SESSION['login'] ?></p>
                        
                        <?php
                        }
                        
                        ?>
                        
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->

    <!-- Contact Start -->
    <div class='container-fluid pt-5'>
        <div class='container'>
            <div class='text-center mx-auto mb-5' style='max-width: 500px;'>

            </div>
            <div class=''>
              
            </div>
            <div class='row justify-content-center position-relative' style='margin-top: -200px; z-index: 1;'>
                <div class='col-lg-8'>
                    <div class='bg-white rounded p-5 m-5 mb-0'>
                        <form action='' method='post'>
                            <div class='row g-3'>
                            <button class='btn btn-primary w-50 ' onclick='print()'>print</button>
                            <h3 class='text-center'>Verification Code :</h3>
                             <p class='text-center'>   <?php echo isset( $_SESSION[ 'infos' ][ 'randomCode' ] ) ? $_SESSION[ 'infos' ][ 'randomCode' ] : '';
?></p>
 <h4>Date :</h4>
                                 <p><?php echo $_SESSION[ 'infos' ][ 'date' ]; ?><P>
                                <?php
                                $id=$_SESSION[ 'infos' ][ 'id' ];
                              $req=$connexion->prepare("select nomP,prenomP,emailP,teleP from patient where idP='$id'");
                              $req->execute();
                              $res=$req->fetchAll();
                              foreach ($res as $v) {?>
                                 <h4>First name : </h2>
                                 <p> <?php echo $v['nomP'] ?></p>
                                 <h4>Last name :</h4>
                                 <p><?php echo $v['prenomP'] ?><P>
                                 <h4>Telephone :</h4>
                                 <p><?php echo $v['teleP'] ?><P>
                                <?php
                              }
                              $hosp=$_SESSION[ 'infos' ][ 'hospital' ];
                              $req=$connexion->prepare("select nomH,adresseH from hospital where idH='$hosp'");
                              $req->execute();
                              $res=$req->fetchAll();
                              foreach ($res as $v) {?>
                                 <h4>Hospital : </h2>
                                 <p> <?php echo $v['nomH'] ?></p>
                              
                       <?php
                              }

?>
                               
                       
                            
                            
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->

    <!-- Footer Start -->

    <div class='container-fluid bg-dark text-light border-top border-secondary py-4'>
        <div class='container'>
            <div class='row g-5'>
                <div class='col-md-6 text-center text-md-start'>
                    <p class='mb-md-0'>&copy;
                        <a class='text-primary' href='#'></a>. All Rights Reserved.
                    </p>
                </div>
                <div class='col-md-6 text-center text-md-end'>
                    <p class='mb-0'>Designed by <a class='text-primary' href='https://htmlcodex.com'>Santéo</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href='#' class='btn btn-lg btn-primary btn-lg-square back-to-top'><i class='bi bi-arrow-up'></i></a>
    <script src='https://code.jquery.com/jquery-3.4.1.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js'></script>
    <script src='lib/easing/easing.min.js'></script>
    <script src='lib/waypoints/waypoints.min.js'></script>
    <script src='lib/owlcarousel/owl.carousel.min.js'></script>
    <script src='lib/tempusdominus/js/moment.min.js'></script>
    <script src='lib/tempusdominus/js/moment-timezone.min.js'></script>
    <script src='lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js'></script>

    <script src='js/main.js'></script>
</body>

</html>