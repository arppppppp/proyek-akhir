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
$judul_foto = $_POST['judul'];
$deskripsi_foto = $_POST['deskripsi'];
$tanggal_unggah = $_POST['tanggal'];
$album_id = $_POST['album'];

$lokasi_foto = $_FILES['foto'];
$foto_name = time() . "_" . $lokasi_foto['name'];
$foto_tmp = $lokasi_foto['tmp_name'];

// Pindahkan file ke folder uploads
if (move_uploaded_file($foto_tmp, "uploads/$foto_name")) {
    echo "File uploaded successfully!";
    // Simpan data ke tabel foto
    $query_foto = "INSERT INTO foto (JudulFoto, DeskripsiFoto, TanggalUnggah, LokasiFoto, AlbumID, UserID) 
    VALUES ('$judul_foto', '$deskripsi_foto', '$tanggal_unggah', '$foto_name', '$album_id', '$user_id')";
    $con->query($query_foto);

    // Redirect ke dashboard
    header("Location: dashboard.php");
} else {
    echo "Upload failed. <a href='dashboard.php'>Try again</a>";
}
?>