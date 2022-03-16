<?php
    session_start();
    include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Info Pelanggan</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">
</head>
<body>

    <!-- navbar-->
    <?php include 'menu.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login Pelanggan</h3>
                    </div>
                    <div class="panel-body">
                        <form method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                            <button class="btn btn-primary" name="login">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php 
    
    //jika ada tombil simpan (maka tombol di tekan)
    if (isset($_POST['login']))
    {
        $email = $_POST["email"];
        $password = $_POST["password"];
        //lakukan kueri ngecek akun di table pelanggan db
        $ambil = $koneksi->query("SELECT * FROM pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan='$password'");

        //ngitung akun yang terambil
        $akunyangcocok = $ambil->num_rows;

        //jika akun 1 yang cocok maka di loginkan
        if ($akunyangcocok==1)
        {
            //anda sukses login
            //mendapat akun dalam bentuk array
            $akun = $ambil->fetch_assoc();
            //simpan di sesion pelanggan
            $_SESSION["pelanggan"] = $akun;
            echo "<script>alert('anda Sukses untuk login');</script>";
            echo "<script>location='checkout.php';</script>";
        }
        else
        {
            //anda gagal login
            echo "<script>alert('anda gagal login dan mohon periksa akun anda kembali');</script>";
            echo "<script>location='login.php';</script>";
        }
    }
    ?>

</body>
</html>