<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Album Elegan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: black;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #fff;
        }
        .album-container {
            background: #1c1c1c;
            padding: 1.5em;
            border-radius: 10px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.7);
            width: 300px;
            text-align: center;
        }
        .album-container h3 {
            font-size: 24px;
            margin-bottom: 0.8em;
            color: #20c997;
        }
        .form-label {
            margin-bottom: 0.4em;
            display: block;
            color: #20c997;
            font-weight: 600;
        }
        .input-group {
            margin-bottom: 1em;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #1c1c1c;
            border-radius: 6px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #333;
            color: #fff;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        .form-control:focus {
            border-color: #fff;
            outline: none;
            box-shadow: 0 0 0 0.1rem #20c997;
        }
        .btn {
            background-color: #20c997;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.3s;
        }
        .btn:hover {
            background-color: #8bc34a;
            transform: translateY(-2px);
        }
        .mt-3 {
            margin-top: 0.8em;
            font-size: 12px;
        }
        .mt-3 a {
            color: #20c997;
            text-decoration: none;
            font-weight: 600;
        }
        .mt-3 a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="album-container">
        <h3>Tambah Album</h3>
        <hr>
        <form action="album.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label for="NamaAlbum" class="form-label">Nama Album</label>
                <input type="text" name="NamaAlbum" id="NamaAlbum" class="form-control" placeholder="Masukkan nama album" required>
            </div>
            <div class="input-group">
                <label for="Deskripsi" class="form-label">Deskripsi</label>
                <textarea name="Deskripsi" id="Deskripsi" class="form-control" rows="3" placeholder="Tuliskan deskripsi album" required></textarea>
            </div>
            <div class="input-group">
                <label for="TanggalDibuat" class="form-label">Tanggal Dibuat</label>
                <input type="date" name="TanggalDibuat" id="TanggalDibuat" class="form-control" required>
            </div>
            <button type="submit" class="btn">Submit</button>
        </form>
        <p class="mt-3"><a href="dashboard.php">Kembali ke Dashboard</a></p>
    </div>
</body>
</html>
