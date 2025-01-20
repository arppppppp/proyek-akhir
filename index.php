<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form Elegan</title>
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
        .login-container {
            background: #1c1c1c;
            padding: 2.5em;
            border-radius: 15px; /* Sisi melengkung lebih lembut */
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.8); /* Bayangan lebih dramatis */
            width: 400px;
            text-align: center;
        }
        .login-container h2 {
            font-size: 28px; /* Ukuran teks header lebih besar */
            margin-bottom: 1em;
            color: #20c997;
        }
        .form-label {
            margin-bottom: 0.5em;
            display: block;
            color: #20c997;
            font-weight: 600; /* Teks label tebal */
        }
        .input-group {
            margin-bottom: 1.5em; /* Jarak lebih besar untuk elemen input */
        }
        .form-control {
            width: 100%;
            padding: 12px; /* Jarak padding */
            border: 1px solid #1c1c1c;
            border-radius: 8px; /* Sisi melengkung lebih lembut */
            box-sizing: border-box;
            font-size: 16px;
            background-color: #333; /* Latar belakang input gelap */
            color: #fff; /* Teks putih */
            transition: border-color 0.3s, box-shadow 0.3s; /* Transisi sensitif */
        }
        .form-control:focus {
            border-color: #fff;
            outline: none; /* Menghilangkan garisan luar standar */
            box-shadow: 0 0 0 0.2rem #20c997; /* Bayangan lembut saat fokus */
        }
        .btn {
            background-color: #20c997;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px; /* Sisi melengkung lebih lembut */
            cursor: pointer;
            width: 100%;
            font-size: 18px; /* Ukuran teks tombol lebih besar */
            transition: background-color 0.3s, transform 0.3s; /* Transisi gesit */
        }
        .btn:hover {
            background-color: #8bc34a;
            transform: translateY(-2px); /* Efek angkat saat hover */
        }
        .mt-3 {
            margin-top: 1em;
            font-size: 14px; /* Ukuran teks lebih kecil untuk footer */
        }
        .mt-3 a {
            color: #20c997;; /* Ungu muda untuk tautan */
            text-decoration: none;
            font-weight: 600; /* Teks tebal */
        }
        .mt-3 a:hover {
            text-decoration: underline; /* Garis bawah saat hover */
        }
        /* Efek dekoratif */
        .confetti {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('https://cdn.pixabay.com/photo/2017/09/25/18/20/confetti-2771598_1280.png'); /* Pola confetti */
            background-repeat: no-repeat;
            background-size: cover; /* Mengisi seluruh layar */
            opacity: 0.1; /* Transparansi confetti lebih lembut */
            z-index: -1; /* Di belakang konten */
            pointer-events: none; /* Tidak mengganggu interaksi */
        }
    </style>
</head>
<body>
    <div class="confetti"></div> <!-- Efek confetti sebagai latar belakang -->
    <div class="login-container">
        <h2>Selamat Datang Di Riptures!</h2>
        <form action="Ceklogin.php" method="POST">
            <div class="input-group">
                <label for="Username" class="form-label">Username</label>
                <input type="text" name="Username" class="form-control" id="Username" placeholder="Masukkan username" required>
            </div>
            <div class="input-group">
                <label for="Password" class="form-label">Password</label>
                <input type="password" name="Password" class="form-control" id="Password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn">Login</button>
        </form>
        <p class="mt-3">Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </div>
</body>
</html>
