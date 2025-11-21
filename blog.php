
<?php
// Vérifie si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

    $servername = "localhost"; 
    $username = "id21921909_root"; 
    $password = "12345678@Mar"; 
    $dbname = "id21921909_santeo"; 

 
    $conn = new mysqli($servername, $username, $password, $dbname);

 $titre = $_POST['titre'];
 $date = $_POST['date'];
 $contenu = $_POST['contenu'];

 $sql = "INSERT INTO blog (titre, date, contenu) VALUES ('$titre', '$date', '$contenu')";

if ($conn->query($sql) === TRUE) {
    echo "Le blog a été créé avec succès.";
    header('location:admin.php');
} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MedLink</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 150px;
        }
        input[type="submit"] {
            background-color: #1E90FF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
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
<div class="container-fluid sticky-top bg-white shadow-sm mb-5">
<div class="container-fluid sticky-top bg-white shadow-sm mb-5">
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
    </div>
    </div>
    <div class="container">
        <h2>Create Blog</h2>
        <form action="" method="POST">
            <label for="titre">Titre :</label><br>
            <input type="text" id="titre" name="titre" required><br>
            
            <label for="date">Date :</label><br>
            <input type="date" id="date" name="date" required><br>
            
            <label for="contenu">Contenu :</label><br>
            <textarea id="contenu" name="contenu" required></textarea><br>
            
            <input type="submit" value="Enregistrer" name="sub">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

</body>
</html>