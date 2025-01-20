<?php
session_start();
include 'koneksi.php';

// Mendapatkan UserID dari sesi login
$Username = $_SESSION['Username'];
$query_user = "SELECT UserID FROM user WHERE username='$Username'";
$result_user = $con->query($query_user);
$user = $result_user->fetch_assoc();
$user_id = $user['UserID'];

// Data dari form
$nama_album = $_POST['NamaAlbum'];
$deskripsi_album = $_POST['Deskripsi'];
$tanggal_dibuat = $_POST['TanggalDibuat'];

// Simpan data ke tabel album
$query_album = "INSERT INTO album (NamaAlbum, Deskripsi, TanggalDibuat, UserID) 
VALUES ('$nama_album', '$deskripsi_album', '$tanggal_dibuat', '$user_id')";
if ($con->query($query_album) === TRUE) {
    // Redirect ke dashboard jika berhasil
    header("Location: dashboard.php");
    exit();
} else {
    echo "Error: " . $query_album . "<br>" . $con->error;
    echo "<br><a href='dashboard.php'>Kembali ke dashboard</a>";
}
?>
