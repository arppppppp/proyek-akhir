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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #121212;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #1c1c1c;
            padding: 1em;
            border-radius: 10px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.6);
            text-align: center;
        }
        h2, h3 { color: #20c997; margin: 0.5em 0; font-size: 18px; }
        .form-group { margin-bottom: 0.8em; text-align: left; }
        label { font-weight: bold; color: #20c997; margin-bottom: 0.3em; display: inline-block; font-size: 12px; }
        input, select, textarea {
            width: 100%; padding: 8px; border: 1px solid #333;
            border-radius: 6px; background-color: #333; color: white; font-size: 12px;
        }
        textarea { resize: vertical; }
        button {
            background-color: #20c997; color: white; padding: 10px; border-radius: 6px;
            border: none; font-size: 14px; cursor: pointer; width: 100%;
            transition: background-color 0.2s, transform 0.2s;
        }
        button:hover { background-color: #8bc34a; transform: translateY(-2px); }
        .logout-link {
            color: #20c997; font-size: 12px; font-weight: bold; text-decoration: none; margin-top: 0.5em;
        }
        .logout-link:hover { text-decoration: underline; }
    </style>
</head>
<body>
    <div class="container">
        <h3>Unggah Foto Baru</h3>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="judul">Judul Foto:</label>
                <input type="text" id="judul" name="judul" placeholder="Masukkan judul foto" required>
            </div>
            <div class="form-group">
                <label for="deskripsi">Deskripsi Foto:</label>
                <textarea id="deskripsi" name="deskripsi" rows="3" placeholder="Masukkan deskripsi foto" required></textarea>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Unggah:</label>
                <input type="date" id="tanggal" name="tanggal" required>
            </div>
            <div class="form-group">
                <label for="foto">Upload Foto:</label>
                <input type="file" id="foto" name="foto" required>
            </div>
            <div class="form-group">
                <label for="album">Album:</label>
                <select name="album" id="album" required>
                    <?php
                    $query = "SELECT * FROM album";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='{$row['AlbumID']}'>{$row['NamaAlbum']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button type="submit">Submit</button>
            <a href="logout.php" class="logout-link">Logout</a>
        </form>
    </div>
</body>
</html>
