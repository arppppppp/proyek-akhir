<?php
session_start();
include "koneksi.php";

if (isset($_POST['FotoID']) && isset($_SESSION['UserID'])) {
    $fotoID = $_POST['FotoID'];
    $userID = $_SESSION['UserID'];

    // Cek jika pengguna sudah memberi like
    $checkLikeQuery = "SELECT * FROM likefoto WHERE FotoID = '$fotoID' AND UserID = '$userID'";
    $checkResult = mysqli_query($con, $checkLikeQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // Jika belum ada, tambahkan like
        $insertLikeQuery = "INSERT INTO likefoto (FotoID, UserID) VALUES ('$fotoID', '$userID')";
        mysqli_query($con, $insertLikeQuery);
    }

    // Redirect kembali ke halaman sebelumnya
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
