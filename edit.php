<?php
session_start();

// Pastikan pengguna sudah login
if (!isset($_SESSION['Username']) || !isset($_SESSION['UserID'])) {
    header("Location: login.php");
    exit();
}

include "koneksi.php"; // Koneksi database

// Pastikan parameter 'id' ada di URL
if (!isset($_GET['id'])) {
    echo "ID foto tidak valid.";
    exit();
}

$foto_id = $_GET['id'];

// Ambil data foto berdasarkan FotoID
$query = mysqli_query($con, "SELECT * FROM foto WHERE FotoID = '$foto_id' AND UserID = '{$_SESSION['UserID']}'");
if (mysqli_num_rows($query) > 0) {
    $foto = mysqli_fetch_assoc($query);
} else {
    echo "Foto tidak ditemukan atau Anda tidak memiliki izin untuk mengedit foto ini.";
    exit();
}

// Proses form jika disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $judul_foto = mysqli_real_escape_string($con, $_POST['JudulFoto']);
    $deskripsi_foto = mysqli_real_escape_string($con, $_POST['DeskripsiFoto']);
    $tanggal_unggah = mysqli_real_escape_string($con, $_POST['TanggalUnggah']);
    $album_id = $_POST['album'];

    // Jika ada file foto yang di-upload, proses uploadnya
    if ($_FILES['foto']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["foto"]["name"]);

        // Cek apakah file berhasil di-upload
        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
            $lokasi_foto = basename($_FILES["foto"]["name"]);

            // Hapus foto lama dari folder jika ada file baru yang di-upload
            if (file_exists("uploads/" . $foto['LokasiFoto'])) {
                unlink("uploads/" . $foto['LokasiFoto']);
            }
        } else {
            echo "Terjadi kesalahan saat meng-upload foto.";
            exit();
        }
    } else {
        // Jika tidak ada foto yang di-upload, gunakan foto yang lama
        $lokasi_foto = $foto['LokasiFoto'];
    }

    // Update data foto ke database
    $updateQuery = mysqli_query($con, "UPDATE foto SET 
                                        JudulFoto = '$judul_foto', 
                                        DeskripsiFoto = '$deskripsi_foto', 
                                        TanggalUnggah = '$tanggal_unggah', 
                                        AlbumID = '$album_id', 
                                        LokasiFoto = '$lokasi_foto' 
                                        WHERE FotoID = '$foto_id'");

    if ($updateQuery) {
        // Redirect ke dashboard setelah update berhasil
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Terjadi kesalahan saat memperbarui data foto.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Foto</title>
</head>
<body>

    <h3>Edit Foto</h3>
    <p>Selamat Datang <?php echo htmlspecialchars($_SESSION['Username']); ?> | <a href="logout.php">Logout</a></p>
    <hr>

    <form action="edit.php?id=<?php echo $foto_id; ?>" method="POST" enctype="multipart/form-data">
        
        <label for="JudulFoto">Judul Foto:</label><br>
        <input type="text" id="JudulFoto" name="JudulFoto" value="<?php echo htmlspecialchars($foto['JudulFoto']); ?>" required><br><br>

        <label for="DeskripsiFoto">Deskripsi Foto:</label><br>
        <textarea id="DeskripsiFoto" name="DeskripsiFoto" rows="4" required><?php echo htmlspecialchars($foto['DeskripsiFoto']); ?></textarea><br><br>

        <label for="TanggalUnggah">Tanggal Unggah:</label><br>
        <input type="date" id="TanggalUnggah" name="TanggalUnggah" value="<?php echo $foto['TanggalUnggah']; ?>" required><br><br>

        <label for="foto">Foto Sebelumnya:</label><br>
        <!-- Menampilkan foto yang sudah ada -->
        <img src="uploads/<?php echo htmlspecialchars($foto['LokasiFoto']); ?>" width="100" alt="Foto Sebelumnya"><br><br>
        <label for="foto">Upload Foto Baru:</label><br>
        <input type="file" id="foto" name="foto"><br><br>

        <label for="album">Album:</label><br>
        <select name="album" id="album" required>
            <?php
            // Ambil semua album untuk pilihan
            $queryAlbum = "SELECT * FROM album";
            $resultAlbum = mysqli_query($con, $queryAlbum);
            while ($album = mysqli_fetch_assoc($resultAlbum)) {
                $selected = $foto['AlbumID'] == $album['AlbumID'] ? "selected" : "";
                echo "<option value='{$album['AlbumID']}' $selected>{$album['NamaAlbum']}</option>";
            }
            ?>
        </select><br><br>

        <button type="submit">Update Foto</button>
    </form>

</body>
</html>
