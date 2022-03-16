<?php
    session_start();
?>

<?php
    include 'koneksi.php';
?>
<?php
    //mendapatkan id produk dari url
    $id_produk = $_GET["id"];

    //query ambil data
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$id_produk'");
    $detail = $ambil->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Detail Produk</title>
    <link rel="stylesheet" href="admin/assets/css/bootstrap.css">;
</head>
<body>
     <!-- navbar-->
    <?php include 'menu.php'; ?>

    <section class="kontent">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="foto_produk/<?php echo $detail["foto_produk"]; ?>" class="img-responsive">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $detail["nama_produk"]; ?></h2>
                    <h4>Rp. <?php echo number_format($detail["harga_produk"]);?></h4>

                    <form method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah">
                                <div class="input-group-btn">
                                    <button class="btn btn-primary" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <?php 
                        //jika ada tombol beli
                        if(isset($_POST["beli"])) 
                        {
                            //mendapat jumlah yg diinputkan
                            $jumlah = $_POST["jumlah"];
                            // masukan di keranjang belanja
                            $_SESSION["keranjang"][$id_produk] = $jumlah;

                            
                            echo "<script>location='keranjang.php';</script>";
                        }
                    ?>

                    <p> <?php echo $detail["deskripsi"]; ?></p>
                </div>
            </div>
        </div>
    </section>
    
</body>
</html>