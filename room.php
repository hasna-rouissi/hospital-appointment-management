<?php
require('connection.php');
session_start();

$id = $_GET['id'];

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <div class='container'>
    <div id="chat-history"></div>

<script>
function fetchChatHistory() {
  $.ajax({
    url: "fetch_chat_history.php", // Replace with your actual script path
    method: "POST",
    data: { id: "<?php echo $id; ?>" }, // Replace with your way of getting user ID
    success: function(data) {
      $("#chat-history").html(data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      console.error("Error fetching chat history:", textStatus, errorThrown);
    }
  });
}

$(document).ready(function() {
  fetchChatHistory(); // Fetch initial chat history on page load
  // You can also set up an interval to periodically fetch updates
});
</script>

    <form method='post'>
        <input type='text' style='width:80%;' name='message' class='' />
        <input type='submit' name='sub' style='width:19%;' class='' />
    </form>
</div>


    <?php
    if (isset($_POST['sub'])) {
    
        $currentDateTime = date('Y-m-d H:i:s');
        $message = $_POST['message'];
    
        
        $req = $connexion->prepare("INSERT INTO `chat`(`fromC`, `toC`, `conten`,`dateC`) VALUES ('admin', :id, :message, :currentDateTime)");
        $req->bindParam(':id', $id);
        $req->bindParam(':message', $message);
        $req->bindParam(':currentDateTime', $currentDateTime);
        $req->execute();
    
       echo "<script>window.location='https://medlinkkk.000webhostapp.com/room.php?id=$id';</script>";
       
    
        
        exit; 
    }
    ?>
    




   
  
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