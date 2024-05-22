<?php

include("config.php");

// kalau tidak ada id di query string
if( !isset($_GET['id'])){
    header('Location: list-siswa.php');
}

// ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM calon_siswa WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Edit Siswa SMK N 1 Ngawi</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"  
    />
    <style>
    nav {
        height: 130px;
        background: linear-gradient(90deg, blue, black);
      }
      
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
  <div class="container">
    <a class="navbar-brand fs-2" href="#" style="padding: 10px;">Sekolah Hacking</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item fs-5">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <form action="proses-edit.php" method="POST" class="d-flex justify-content-center p-5 fs-5">
        <fieldset>
            <input type="hidden" name="id" value="<?php echo $siswa['id']
            ?>">
            <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap"
                value="<?php echo $siswa['nama'] ?>">
            </p>
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"><?php echo $siswa['alamat']
                ?></textarea>
            </p>
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $siswa['jenis_kelamin'];?>
                <label>
                    <input type="radio" name="jenis_kelamin" value="laki-laki"
                    <?php echo ($jk == 'laki-laki') ? "checked": "" ?>>Laki-laki</label>
                    <label>
                        <input type="radio" name="jenis_kelamin" value="perempuan"
                        <?php echo ($jk == 'perempuan') ? "checked": "" ?>>Perempuan</label>
            </p>
            <p>
                <label for="agama">Agama: </label>
                <?php $agama = $siswa['agama']; ?>
                <select name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected": ""?>>Islam</option>
                    <option <?php echo ($agama == 'kristen') ? "selected": ""?>>Kristen</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected": ""?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected": ""?>>Budha</option>
                    <option <?php echo ($agama == 'Atheis') ? "selected": ""?>>Atheis</option>
                </select>
            </p>
            <p>
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" name="sekolah_asal" placeholder="nama sekolah"
                value="<?php echo $siswa['sekolah_asal'] ?>">
            </p>
            <p>
                <input type="submit" value="Simpan"name="simpan">
            </p>
        </fieldset>
    </form>
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
</body>
</html>