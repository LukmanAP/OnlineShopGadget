<h2>Tambah Pelanggan</h2>

<form method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama">
    </div>
    <div class="form-group">
        <label>email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label>password</label>
        <input type="password" class="form-control" name="pass">
    </div>
    <div class="form-group">
        <label>Nomor hp</label>
        <input type="number" class="form-control" name="No">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php
    if(isset($_POST['save'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $Nohp = $_POST['No'];

        $koneksi->query("INSERT INTO pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telepon_pelanggan) 
        VALUES ('$email','$pass','$nama','$Nohp')") ;


        echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
    }
    
?>