<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul;  ?></title>
    <style>
        body {
            font: 15px Arial, sans-serif;
            background-color: lightgrey;
        }
        .form-login {
            height: 20rem;
            width: 40%;
            border: 2px solid navy;
            margin: 2rem auto;
            box-shadow: 5px 7px blue;
            background-color: white;
        }

        button {
            height: 2rem;
            width: 4rem;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="form-login">
    <h2 align="center"><?= $judul;  ?></h2>
    <?php if (!empty(session()->getFlashdata('error'))) { ?>
    <div align="left" class="error">
        <?= session()->getFlashdata('error'); ?>
    </h4>
    <?php } ?>
    <form action="/daftar" method="post">
    <?= csrf_field(); ?>
        <table border="0" align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password_new"></td>
            </tr>
            <tr>
                <td>Ulangi Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Register</button> 
                    <button type="reset">Reset</button> 
                </td>
            </tr>
        </table>
    </form>
    <p align="center"><a href="/login">Login jika sudah punya Akun</a></p>
    </div>
    
</body>
</html>