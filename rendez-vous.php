<?php
require('connection.php');
session_start();
if (empty($_SESSION['login'])) {
    header('location:login.php');
}
if (isset($_POST["sub"])) {
    if (empty($_POST["ville"]) or empty($_POST["hoss"]) or empty($_POST["date"]) or empty($_POST["specialite"])) {
    
    } else {
        $id=$_SESSION['id'];
        $ville = $_POST["ville"];
        $hospital = $_POST["hoss"];
        $date = $_POST["date"];
        $specialite = $_POST["specialite"];
        $req = $connexion->prepare("SELECT * FROM randez WHERE dateR=? and idH=?");
        $req->execute([$date,$hospital]);
        $res = $req->fetchAll();
        
        if (count($res) > 20) {
            echo "<h1 class='text-danger text-center'>Full of</h1>";
        } else {
       


// Your function definition
function generateRandomCode($length = 8) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';
    $max = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[mt_rand(0, $max)];
    }
    return $code;
}



// Generate a random code
$randomCode = generateRandomCode(10);

// Assuming your SQL query is correct and you're executing it properly
$ff = "INSERT INTO randez (idP, idH, dateR, idS, code) VALUES ('$id', '$hospital', '$date', '$specialite', '$randomCode')";
$fr = $connexion->exec($ff);

// Store relevant info in session
$_SESSION['infos'] = array('id' => $id, 'hospital' => $hospital, 'randomCode' => $randomCode,'date' => $date);

// Redirect to info.php
header('Location: info.php');
exit(); // Ensure script stops executing after redirection


    }
    }
}
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
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">  

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
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
       
                <h1 class="display-4">Rendez-vous</h1>
            </div>    
            <div class="">
                <div class="col-12" style="height: 100px;">
                   
                </div>
            </div>
            <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 1;">
                <div class="col-lg-8">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <form method='post'>
                             <div class="row g-3">
                                <div class="col-12 col-sm-12">
                                    <div class="mx-auto" style="width: 100%; max-width: 600px;">
                                        <div class="input-group">
                                    
<select id="villeSelect" name='ville' class="form-select border-primary w-50" style="height: 60px;">
    <option value="" selected>Ville</option>
    <?php
    $req = $connexion->prepare("SELECT * FROM cities");
    $req->execute();
    $res = $req->fetchAll(PDO::FETCH_ASSOC);

    if (count($res) >= 1) {
        foreach($res as $v) {
            ?>
            <option value="<?php echo $v['idC']; ?>"><?php echo $v['nameC']; ?></option>
            <?php
        }
    }
    ?>
</select>


<select id="hospitalSelect" name='hoss' class="form-select border-primary w-50" style="height: 60px;">
    <option value="" selected>Hospital</option>
</select>

<script>
document.getElementById('villeSelect').addEventListener('change', function() {
    var villeId = this.value;
    var hospitalSelect = document.getElementById('hospitalSelect');
    fetch('get_hospitals.php?city_id=' + villeId)
        .then(response => response.json())
        .then(data => {
            hospitalSelect.innerHTML = ''; 
            if (data.length > 0) {
                data.forEach(function(hospital) {
                    var option = document.createElement('option');
                    option.value = hospital.idH;
                    option.textContent = hospital.nomH;
                    hospitalSelect.appendChild(option);
                });
            } else {
                hospitalSelect.innerHTML = '<option value="">No hospitals available</option>';
            }
        })
        .catch(error => {
            console.error('Error fetching hospitals:', error);
            hospitalSelect.innerHTML = '<option value="">Error fetching hospitals</option>';
        });
});
</script>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    
                                <select  name='specialite' class="form-select border-primary w-100" style="height: 60px;">

    <option value="" selected>specialité</option>
    <?php
    $req = $connexion->prepare("SELECT * FROM specialite");
    $req->execute();
    $res = $req->fetchAll(PDO::FETCH_ASSOC);

    if (count($res) >= 1) {
        foreach($res as $v) {
            ?>
            <option value="<?php echo $v['idS']; ?>"><?php echo $v['nomS']; ?></option>
            <?php
        }
    }
    ?>
</select>
                                <div class="col-12">
                                    <input type="date" name='date' class="form-control bg-light border-0" placeholder="date" style="height: 55px;">
                                </div>
                
                                </div>
                                <div class="col-12">
                                <input type='submit' name='sub' class="btn btn-primary w-100 py-3" value="Enregistrer">
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