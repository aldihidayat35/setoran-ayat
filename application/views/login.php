<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        position: relative;
        /* Tambahkan posisi relative */
        background-image: url('<?= base_url('assets/img/mts31.jpg'); ?>');
        /* Ganti dengan path gambar background */
        background-size: cover;
        background-position: center;
    }

    /* Tambahkan efek buram dan gelap */
    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        /* Warna gelap dengan opacity */
        backdrop-filter: blur(5px);
        /* Efek blur */
    }


    .login-container {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        /* Tambahkan efek shadow */
        padding: 40px;
        width: 400px;
        text-align: center;
        position: relative;
        z-index: 1;
    }



    .login-container img {
        width: 100px;
        margin-bottom: 20px;
    }

    .login-container h2 {
        margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        outline: none;
    }

    .login-form input[type="submit"] {
        width: 105%;
        padding: 10px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .login-form input[type="submit"]:hover {
        background-color: #45a049;
    }

    .loading {
        display: none;
        margin-top: 20px;
    }

    .loading img {
        width: 50px;
    }

    .alert {
        background-color: #f44336;
        color: white;
        padding: 10px;
        text-align: center;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .input-group {
        position: relative;
        margin-bottom: 20px;
    }

    .input-group .input-icon {
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
    }

    .input-group input {
        padding-left: 30px;
    }
    </style>
</head>

<body>
    <div class="login-container">

        <h1><b>SISTEM SETORAN HAFALAN QUR'AN</b> </h1>
        <img src="<?= base_url('assets/img/logo.png'); ?>" alt="Logo" style="width: 150px;">

        <h2>PESANTREN MODERN DAAR AL-ULUUM ASAHAN</h2>
        <h3>
            <hr> Login
        </h3>
        <?php if ($this->session->flashdata('login_error')): ?>
        <div class="alert alert-danger">
            <?= $this->session->flashdata('login_error') ?>
        </div>
        <?php endif; ?>


        <form class="login-form" method="post" action="<?= base_url('login/process_login'); ?>">
            <div class="input-group">
                <span class="input-icon">
                    <i class="fa fa-user"></i>
                </span>
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="input-group">
                <span class="input-icon">
                    <i class="fa fa-lock"></i>
                </span>
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <input type="submit" value="Login">
        </form>


        <div class="loading" id="loading">
            <img src="<?= base_url('assets/img/load.gif'); ?>" alt="Loading">
        </div>
    </div>

    <script>
    document.querySelector('.login-form').addEventListener('submit', function() {
        document.querySelector('.login-form').style.display = 'none';
        document.querySelector('#loading').style.display = 'block';
    });
    </script>
</body>

</html>