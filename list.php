<?php
require( 'connection.php' );
session_start();
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
    <style>
    .card {
        width: 100%;
        max-width: 290px;
        height: 70px;
        background: #353535;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: left;
        backdrop-filter: blur(10px);
        transition: 0.5s ease-in-out;
    }

    .card:hover {
        cursor: pointer;
        transform: scale(1.05);
    }

    .img {
        width: 50px;
        height: 50px;
        margin-left: 10px;
        border-radius: 10px;
        background: linear-gradient(#d7cfcf, #9198e5);
    }

    .card:hover>.img {
        transition: 0.5s ease-in-out;
        background: linear-gradient(#9198e5, #712020);
    }

    .textBox {
        width: calc(100% - 90px);
     
        color: white;
        font-family: 'Poppins'sans-serif;
    }

    .textContent {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .span {
        font-size: 10px;
    }

    .h1 {
        font-size: 16px;
        font-weight: bold;
    }

    .p {
        font-size: 12px;
        font-weight: lighter;
    }
    </style>
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
                       
                       
                        <a href="admin.php" class="nav-item nav-link">Admin panel</a>
                        <a href="blog.php" class="nav-item nav-link">Create Blogs</a>
                        <a href="list.php" class="nav-item nav-link">Send Messages</a>
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
                            <div class='row g-3 '>
                                <h1 class='text-center'>Users</h1>
                                <?php
                            
                              $req=$connexion->prepare("select * from patient ");
                              $req->execute();
                              $res=$req->fetchAll();
                              foreach ($res as $v) {?>
                                <div class="card">
                               
                                    <div class="textBox">
                                        
                                        <div class="textContent">
                                            <a href='room.php?id=<?php echo $v['idP'] ?>' class="h1 text-light"><?php echo $v['prenomP']." ".$v['nomP'] ?></a>
                                      
                                        </div>
                                        <p class="p"><?php echo $v['emailP'] ?></p>
                                        <div>
                                       
                                        </div>
                                    </div>
                                </div>



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