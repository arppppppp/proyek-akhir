<?php
session_start();
if (!isset($_SESSION['UserID'])) {
    header("Location: index.php");
    exit();
}
include "koneksi.php";
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Photosen &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;700&family=Roboto+Mono:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/lightgallery.min.css">    

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/swiper.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">

    </head>
    <body>

    <div class="site-wrap">

        <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
        </div>
        
        <?php
        include "navbar.php";
        ?>

        <div class="site-section"  data-aos="fade">
        <div class="container-fluid">

            <div class="row justify-content-center">

            <div class="col-md-7">
                <div class="row mb-5">
                <div class="col-12 ">
                    <h2 class="site-section-heading text-center">Home</h2>
                </div>
                </div>
            </div>

            </div>

        <?php
            $query = "SELECT 
                        foto.FotoID, 
                        foto.JudulFoto, 
                        foto.DeskripsiFoto, 
                        foto.TanggalUnggah, 
                        foto.LokasiFoto, 
                        album.NamaAlbum, 
                        user.Username, 
                        (SELECT COUNT(*) FROM likefoto WHERE likefoto.FotoID = foto.FotoID) AS JumlahLike, 
                        (SELECT COUNT(*) FROM komentarfoto WHERE komentarfoto.FotoID = foto.FotoID) AS JumlahKomentar
                    FROM foto
                    INNER JOIN album ON foto.AlbumID = album.AlbumID
                    INNER JOIN user ON foto.UserID = user.UserID";

                    $result = mysqli_query($con, $query);

                    if (!$result) {
                        die("Query Error: " . mysqli_error($con));
                    }

                    while ($row = mysqli_fetch_assoc($result)) 
                        echo "<img src='uploads/{$row['LokasiFoto']}' width='330' class='p-2'>";
                    
        ?>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<p>{$_SESSION['message']}</p>";
                unset($_SESSION['message']);
            }
        ?>
        <script>
            function confirmDelete() {
                return confirm("Apakah Anda yakin ingin menghapus foto ini?");
            }
        </script>

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
    
    <script>
        $(document).ready(function(){
        $('#lightgallery').lightGallery();
        });
    </script>

    </body>
    </html>
