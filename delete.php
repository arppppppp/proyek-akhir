<?php
session_start();
include "koneksi.php";

// Pastikan pengguna sudah login
if (!isset($_SESSION['Username'])) {
    header("Location: login.php");
    exit();
}

// Validasi parameter FotoID
if (isset($_GET['FotoID'])) {
    $foto_id = intval($_GET['FotoID']); // Konversi ke integer untuk mencegah SQL Injection

    // Ambil data foto untuk menghapus file fisiknya
    $query_select = "SELECT LokasiFoto FROM foto WHERE FotoID = ?";
    $stmt_select = $con->prepare($query_select);
    $stmt_select->bind_param("i", $foto_id);
    $stmt_select->execute();
    $result = $stmt_select->get_result();

    if ($result->num_rows > 0) {
        $foto = $result->fetch_assoc();
        $file_path = "uploads/" . $foto['LokasiFoto'];

        // Hapus file jika ada
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        // Hapus data dari database
        $query_delete = "DELETE FROM foto WHERE FotoID = ?";
        $stmt_delete = $con->prepare($query_delete);
        $stmt_delete->bind_param("i", $foto_id);

        if ($stmt_delete->execute()) {
            header("Location: dashboard.php?success=Foto berhasil dihapus.");
        } else {
            echo "Error: " . $stmt_delete->error;
        }

        $stmt_delete->close();
    } else {
        echo "Data tidak ditemukan.";
    }

    $stmt_select->close();
} else {
    echo "FotoID tidak valid.";
}
?>
