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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/css/lightgallery.min.css">
</head>
<body>
    <?php
    include "navbar.php";
    ?>
<div class="site-wrap">
    <div class="site-section" data-aos="fade">
        <div class="container-fluid">

            <!-- Header -->
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="row mb-5">
                        <div class="col-12">
                            <h2 class="site-section-heading text-center">Gallery</h2>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search and Category Navigation -->
            <div class="row mb-4">
                <div class="col-md-10 offset-md-1">
                    <form method="GET" class="d-flex mb-3">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search by title or description" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    <div class="d-flex justify-content-center">
                        <a href="gallery.php" class="btn btn-outline-secondary me-2">All</a>
                        <a href="?category=Alam" class="btn btn-outline-success me-2">Alam</a>
                        <a href="?category=Animals" class="btn btn-outline-info me-2">Animals</a>
                        <a href="?category=Sports" class="btn btn-outline-danger">Sports</a>
                    </div>
                </div>
            </div>

            <!-- Gallery -->
            <div class="row" id="lightgallery">
                <?php
                // Base query
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

                // Retrieve search and category filters
                $search = isset($_GET['search']) ? mysqli_real_escape_string($con, $_GET['search']) : '';
                $category = isset($_GET['category']) ? mysqli_real_escape_string($con, $_GET['category']) : '';

                // Add conditions
                $conditions = [];
                if (!empty($search)) {
                    $conditions[] = "(foto.JudulFoto LIKE '%$search%' OR foto.DeskripsiFoto LIKE '%$search%')";
                }
                if (!empty($category)) {
                    $conditions[] = "album.NamaAlbum = '$category'";
                }

                if (count($conditions) > 0) {
                    $query .= " WHERE " . implode(" AND ", $conditions);
                }

                $result = mysqli_query($con, $query);

                if (!$result) {
                    die("Query Error: " . mysqli_error($con));
                }

                // Mengecek apakah ada data foto yang ditemukan
                if (mysqli_num_rows($result) > 0) {
                    // Menampilkan foto-foto yang ditemukan
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='col-lg-3 mb-4'>";
                        echo "<a href='uploads/{$row['LokasiFoto']}' class='gallery-item' data-lg-size='1400-900'>"; // Link untuk LightGallery
                        echo "<img src='uploads/{$row['LokasiFoto']}' class='p-2 img-fluid' style='max-width:100%; max-height:300px;' alt='{$row['JudulFoto']}'>";
                        echo "</a>";
                        echo "<p>{$row['JudulFoto']}</p>";
                        echo "{$row['DeskripsiFoto']}";
                        echo "<p><strong>Oleh:</strong> {$row['Username']} | <strong>Tanggal:</strong> {$row['TanggalUnggah']}</p>";

                        // Tombol Like
                        $fotoID = $row['FotoID'];
                        echo "<form method='POST' action='like_foto.php'>";
                        echo "<input type='hidden' name='FotoID' value='$fotoID'>";
                        echo "<button type='submit' class='btn btn-outline-danger btn-sm'>Like</button>";
                        echo "</form>";

                        // Menampilkan jumlah Like
                        echo "<p><strong>Jumlah Like:</strong> {$row['JumlahLike']}</p>";

                        // Formulir komentar
                        echo "<form method='POST' action='komentar_foto.php'>";
                        echo "<input type='hidden' name='FotoID' value='$fotoID'>";
                        echo "<textarea name='Komentar' class='form-control' placeholder='Add a comment'></textarea>";
                        echo "<button type='submit' class='btn btn-primary btn-sm mt-2'>Comment</button>";
                        echo "</form>";

                        // View comments button
                        echo "<a href='komen.php?FotoID={$fotoID}' class='btn btn-outline-info btn-sm mt-2'>View Comments</a>";


                        // Menampilkan jumlah komentar
                        echo "<p><strong>Jumlah Komentar:</strong> {$row['JumlahKomentar']}</p>";
                        echo "</div>";

                        
                    }
                } else {
                    // Jika tidak ada foto yang ditemukan
                    echo "<p class='text-center' style='text-align: center;'>No photos found.</p>";
                }
                ?>
            </div>
        </div>
    </div>
</div>

<?php
if (isset($_SESSION['message'])) {
    echo "<p>{$_SESSION['message']}</p>";
    unset($_SESSION['message']);
}
?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const galleryItems = document.querySelectorAll(".gallery-item");
        if (galleryItems.length > 0) {
            lightGallery(document.querySelector('#lightgallery'), {
                selector: '.gallery-item',
                plugins: [lgZoom],
                zoom: true,
            });
        }
    });
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/lightgallery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.7.0/plugins/zoom/lg-zoom.min.js"></script>

</body>
</html>
