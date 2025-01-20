<?php
session_start();
include "koneksi.php";

if (isset($_POST['FotoID']) && isset($_POST['Komentar']) && isset($_SESSION['UserID'])) {
    $fotoID = $_POST['FotoID'];
    $komentar = mysqli_real_escape_string($con, $_POST['Komentar']);
    $userID = $_SESSION['UserID'];

    // Menambahkan komentar ke database
    $insertKomentarQuery = "INSERT INTO komentarfoto (FotoID, UserID, IsiKomentar) VALUES ('$fotoID', '$userID', '$komentar')";
    mysqli_query($con, $insertKomentarQuery);
}

// Redirect kembali ke halaman sebelumnya
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>
