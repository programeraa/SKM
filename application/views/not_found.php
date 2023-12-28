<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Page Not Found</title>
    <style type="text/css">
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 100px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #d9534f;
        }

        p {
            font-size: 18px;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5bc0de;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
            font-weight: bold;
        }

        .sad-emoji {
            font-size: 48px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="sad-emoji">&#128557;</div>
        <h1>404 - Page Not Found</h1>
        <p>Oops! Halaman yang Anda cari tidak ditemukan.</p>
        <a href="<?= base_url('komisi'); ?>" class="button">Kembali ke Dashboard</a>
    </div>
</body>
</html>
