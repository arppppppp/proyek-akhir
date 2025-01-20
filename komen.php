<?php
include "koneksi.php";  // Database connection

// Get FotoID from the URL
$fotoID = isset($_GET['FotoID']) ? mysqli_real_escape_string($con, $_GET['FotoID']) : null;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Photo Details</title>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/lightgallery.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery.min.css">
</head>
<body>

<div class="site-wrap">

    <?php include "navbar.php"; ?>

    <div class="site-section" data-aos="fade">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <?php
                    if ($fotoID) {
                        // Query to get photo details
                        $query = "SELECT JudulFoto, DeskripsiFoto, LokasiFoto FROM foto WHERE FotoID = '$fotoID'";
                        $result = mysqli_query($con, $query);

                        if (mysqli_num_rows($result) > 0) {
                            $photo = mysqli_fetch_assoc($result);
                            // Display photo details
                            echo "<div class='photo-detail'>";
                            echo "<h2 class='text-center'>{$photo['JudulFoto']}</h2>";
                            echo "<img src='uploads/{$photo['LokasiFoto']}' class='img-fluid mb-3' alt='Photo'>";
                            echo "<p>{$photo['DeskripsiFoto']}</p>";
                            echo "</div>";

                            // Query to get comments
                            $commentsQuery = "SELECT k.IsiKomentar, u.Username, k.TanggalKomentar 
                                              FROM komentarfoto k 
                                              JOIN user u ON k.UserID = u.UserID 
                                              WHERE k.FotoID = '$fotoID' 
                                              ORDER BY k.TanggalKomentar DESC";
                            $commentsResult = mysqli_query($con, $commentsQuery);

                            if (mysqli_num_rows($commentsResult) > 0) {
                                echo "<div class='comments-section'>";
                                while ($comment = mysqli_fetch_assoc($commentsResult)) {
                                    echo "<div class='comment'>";
                                    echo "<strong>{$comment['Username']}:</strong> <br>";
                                    echo "{$comment['IsiKomentar']}";
                                    echo "<p><small>Posted on: {$comment['TanggalKomentar']}</small></p>";
                                    echo "</div><hr>";
                                }
                                echo "</div>";
                            } else {
                                echo "<p>No comments yet.</p>";
                            }
                        } else {
                            echo "<p>Photo not found.</p>";
                        }
                    } else {
                        echo "<p>No photo selected.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/picturefill.min.js"></script>
<script src="js/lightgallery-all.min.js"></script>
<script src="js/jquery.mousewheel.min.js"></script>

<script src="js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/zoom/lg-zoom.min.js"></script>

</body>
</html>
