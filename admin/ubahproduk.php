<h2>Ubah Produk</h2>

<?php 
    $ambil = $koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();

    echo "<prec>";
    print_r($pecah);
    echo "</prec>";
?>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Produk</label>
        <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>">
    </div>

    <div class="form-group">
        <label>Harga Rp</label>
        <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk'];?>">
    </div>

    <div class="form-group">
        <label>Berat (gr)</label>
        <input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat_produk']; ?>">
    </div>
    
    <div class="form-group">
        <img src="../foto_produk/<?php echo $pecah['foto_produk'] ?>" width="200px">
    </div>

    <div class="form-group">
        <label>Ganti Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>

    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10">
            <?php echo $pecah['deskripsi']; ?>
        </textarea>
    </div>

    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
    if (isset($_POST['ubah']))
    {
        $namafoto = $_FILES['foto']['name'];
        $lokasifoto = $_FILES['foto']['tmp_foto'];
        $id = $_GET['id'];
        $harga = $_GET['harga'];
        $deskripsi = $_GET['deskripsi'];
        
        //jika di ubah
        if (!empty($lokasifoto))
        {
           
            move_uploaded_file($lokasifoto, "../foto_produk/$namafoto");

            $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = '$_GET[harga]', berat_produk = '$_POST[berat]', foto_produk = '$namafoto', deskripsi = '$_GET[deskripsi]' WHERE id_produk = '$id'");
        }
        else 
        {
            $koneksi->query("UPDATE produk SET nama_produk = '$_POST[nama]', harga_produk = $harga, berat_produk = '$_POST[berat]', deskripsi = $deskripsi WHERE id_produk =  '$id'");
        }
        //echo "<script>alert('data produk telah di ubah');</script>";
       // echo "<script>location='index.php?halaman=produk'</script>";
    }
?>
















