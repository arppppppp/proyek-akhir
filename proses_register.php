<?php
// Mulai sesi
session_start();

// Menyertakan koneksi ke database
include "koneksi.php";

// Proses saat tombol "register" ditekan
if (isset($_POST['register'])) {
    // Mengambil data dari form
    $NamaLengkap = mysqli_real_escape_string($con, $_POST['NamaLengkap']);
    $Username = mysqli_real_escape_string($con, $_POST['Username']);
    $Email = mysqli_real_escape_string($con, $_POST['Email']);
    $Password = !empty($_POST["Password"]) ? md5($_POST["Password"]) : null;
    $Alamat = mysqli_real_escape_string($con, $_POST['Alamat']);

    // Validasi password
    if ($Password === null) {
        die("Password tidak boleh kosong!");
    }

    // Query untuk memasukkan data ke database
    $sql = "INSERT INTO user (NamaLengkap, Username, Email, Password, Alamat) 
            VALUES ('$NamaLengkap', '$Username', '$Email', '$Password', '$Alamat')";

    // Menjalankan query
    if (mysqli_query($con, $sql)) {
        $_SESSION['message'] = "Akun berhasil dibuat!";
        header("Location: index.php"); // Redirect ke halaman login setelah sukses
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($con);
    }
}
?>
