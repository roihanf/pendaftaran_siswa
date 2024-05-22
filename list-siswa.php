<?php include("config.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Pendaftaran Siswa Baru | SMK TI BALI GLOBAL</title>

    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"  
    />
    <link rel="stylesheet" href="list-siswa.css">
    <style>
    nav {
        height: 130px;
        background: linear-gradient(90deg, blue, black);
      }
      
    tr, th, td {
        border: 1px solid #111;
        padding: 5px;
}
</style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a class="navbar-brand fs-2" href="#" style="padding: 10px"
          >Sekolah Hacking</a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
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




    

    <div class="judul text-center p-5">
        <h4>Nama siswa yang sudah mendaftar</h4>
    </div>

    <br>
 
    <div class="tabel-siswa d-flex justify-content-center">
    <table>
        <thead\>
            <tr>
                <th class="border border-black bg-black text-white p-3">nama</th>
                <th class="border border-black bg-black text-white p-3">Alamat</th>
                <th class="border border-black bg-black text-white p-3">Jenis Kelamin</th>
                <th class="border border-black bg-black text-white p-3">Agama</th>
                <th class="border border-black bg-black text-white p-3">Asal Sekolah</th>
            </tr>
        </thead>
        <tbody >

            <?php
            $sql = "SELECT * FROM calon_siswa";
            $query = mysqli_query($db, $sql);

            while($siswa = mysqli_fetch_array($query)){
                echo "<tr>";
                echo "<td class='border border-black p-3'>".$siswa['nama']."</td>";
                echo "<td class='border border-black p-3'>".$siswa['alamat']."</td>";
                echo "<td class='border border-black p-3'>".$siswa['jenis_kelamin']."</td>";
                echo "<td class='border border-black p-3'>".$siswa['agama']."</td>";
                echo "<td class='border border-black p-3'>".$siswa['sekolah_asal']."</td>";

                echo "</td>";
                

            }
            ?>

        </tbody>
    </table>
    </div>

    

    <h5 class="text-center p-5">Total : <?php echo mysqli_num_rows($query) ?></h5>


    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>

</body>
</html>