<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Elegan</title>
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
        .register-container {
            background: #1c1c1c;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.8);
            width: 380px;
            text-align: center;
            position: relative;
        }
        .register-container h2 {
            font-size: 24px;
            margin-bottom: 1em;
            color: #20c997;
        }
        .form-label {
            margin-bottom: 0.4em;
            display: block;
            color: #20c997;
            font-weight: 600;
        }
        .input-group {
            margin-bottom: 1.2em;
        }
        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px black;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 14px;
            background-color: #333;
            color: #fff;
        }
        .btn {
            background-color: #20c997;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 10px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #8bc34a;
        }
        .mt-3 {
            margin-top: 1em;
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
        .confetti {
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('https://cdn.pixabay.com/photo/2017/09/25/18/20/confetti-2771598_1280.png');
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.1;
            z-index: -1;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="confetti"></div>
    <div class="register-container">
        <h2>Form Pendaftaran</h2>
        <form action="proses_register.php" method="POST">
            <div class="input-group">
                <label for="NamaLengkap" class="form-label">Nama Lengkap</label>
                <input type="text" id="NamaLengkap" name="NamaLengkap" class="form-control" required>
            </div>
            <div class="input-group">
                <label for="Username" class="form-label">Username</label>
                <input type="text" id="Username" name="Username" class="form-control" required>
            </div>
            <div class="input-group">
                <label for="Email" class="form-label">Email</label>
                <input type="email" id="Email" name="Email" class="form-control" required>
            </div>
            <div class="input-group">
                <label for="Password" class="form-label">Password</label>
                <input type="password" id="Password" name="Password" class="form-control" required>
            </div>
            <div class="input-group">
                <label for="Alamat" class="form-label">Alamat</label>
                <textarea name="Alamat" id="Alamat" class="form-control" required></textarea>
            </div>
            <button type="submit" class="btn" name="register">Daftar</button>
        </form>
        <p class="mt-3">Sudah memiliki akun? <a href="index.php">Login di sini</a></p>
    </div>
</body>
</html>
