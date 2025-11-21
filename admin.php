<?php
require('connection.php');
session_start();

/* if (isset($_POST["sub"])) {
    if (empty($_POST["date"]) ) {
    
    } else {
        
        $date = $_POST["date"];
       
        $req = $connexion->prepare("select prenomP,nomP,teleP,dateR from patient inner join randez where patient.idP=randez.idP and dateR='$date' ORDER by dateR desc");
        $req->execute();
        $res = $req->fetchAll();
        
        if (count($res) >= 1) {
            foreach($res as $v){
               
            }
            
            
          
        } else {
        
        }
    }
} */
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MedLink</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
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
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">

                <h1 class="display-4">Admin</h1>
                <h2>List rendez-vous</h2>
            </div>
            <div class="">
                <div class="col-12" style="height: 100px;">

                </div>
            </div>
            <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <form action="adminF.php" method="get">
                            <div class="row g-3">
                                <input type="date" name="date" />
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary" name="sub">
                                        Search by date
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>

                </div>

                <div class="table-responsive-sm">
                    <form method='post'>
                        <select name='hospit'>
                            <?php
$req=$connexion->prepare('select * from hospital'); 
$req->execute();
$res=$req->fetchAll();
foreach($res as $v){?>
                            <option value='<?php echo $v['idH'] ?>'><?php echo $v['nomH'] ?></option>
                            <?php
}
?>
                        </select>
                        <button type="submit" class="btn btn-primary" name="sss">
                            Search by Hospital
                        </button>
                    </form>
                    <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Phone number</th>
                                <th>specialite</th>
                                <th>Date</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody class="table-group-divider">

                            <?php
                            if (isset($_POST['sss'])) {
                               
                            $hospit=$_POST['hospit'];
$req = $connexion->prepare("SELECT patient.prenomP, patient.nomP, patient.teleP, randez.dateR,randez.idR, specialite.nomS 
FROM patient 
INNER JOIN randez ON patient.idP = randez.idP 
INNER JOIN specialite ON specialite.idS = randez.idS where randez.idH='$hospit'  ORDER by dateR desc");
$req->execute();
$res = $req->fetchAll();

if (count($res) >= 1) {
    foreach($res as $v){
        ?>
                            <tr class="table-primary">
                                <td scope="row"><?php echo $v['prenomP'] ?></td>
                                <td><?php echo $v['nomP'] ?></td>
                                <td><?php echo $v['teleP'] ?></td>
                                <td><?php echo $v['nomS'] ?></td>
                                <td><?php echo $v['dateR'] ?></td>
                                <td>
                                <button class='btn btn-success'>  <a href="accept.php?idR=<?php echo $v['idR'] ?>" class='text-light'>Accepter</a> </button>
                                   <button class='btn btn-danger'> <a href="refuse.php?id=<?php echo $v["idR"];?>" class='text-light'>Supprimer</a> </button>
                                </td>
                            </tr>
                            <?php
    }
    
    
    exit;
} else {
    echo "<h1>No data found</h1>";
}
}

                                            ?>

                        </tbody>

                    </table>
                </div>



            </div>
            </form>
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Contact End -->


    <!-- Footer Start -->

    <div class="container-fluid bg-dark text-light border-top border-secondary py-4">
        <div class="container">
            <div class="row g-5">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-md-0">&copy; <a class="text-primary" href="#"></a>. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <p class="mb-0">Designed by <a class="text-primary" href="https://htmlcodex.com">Santéo</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>



    <script src="js/main.js"></script>
</body>

</html>