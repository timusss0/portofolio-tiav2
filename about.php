<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      background-color: #f4f4f4;
      color: #333;
      font-family: Arial, sans-serif;
    }

    .hero-content{
      margin-top: 200px;
    }

    .foto-profil {
   
    padding: 10px; /* Ruang di sekitar gambar */
    background-color: rgba(255, 192, 203, 0.5); /* Warna latar belakang pink dengan transparansi */
    border-radius: 10px; /* Membuat sudut gambar menjadi bulat */
    box-shadow: 0 4px 15px rgba(255, 105, 180, 0.5); /* Menambahkan bayangan untuk efek kedalaman */
}

.foto-profil img {
    border-radius: 10px; /* Membuat sudut gambar menjadi bulat */
}
</style>
  </style>
</head>
<body>

<?php include_once "navbar.php"; ?>
<?php
    require_once 'koneksi.php';
    $sql = "SELECT name, deskripsi,foto FROM about WHERE id = 1";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error in query: " . $conn->error;
    }
    // Cek apakah ada hasil
    if ($result->num_rows > 0) {
        // Menampilkan data
        $row = $result->fetch_assoc();
        $name = htmlspecialchars($row["name"]);
        $deskripsi = htmlspecialchars($row["deskripsi"]);
        $foto = htmlspecialchars($row["foto"]);
    } else {
        $name = "Default name";
        $deskripsi = "Default desc";
        $foto = "default.jpg"; 
    }

?>
<div class="container py-5 mt-5">
        <div class="row">
        <div class="col-lg-4 mb-4  mb-lg-0">
    <div class="d-flex flex-column mr-5">
        <div class="foto-profil">
            <img src="image/<?php echo $foto; ?>" alt="Foto Profil" class="img-fluid" style="max-width: 400px;">
        </div>
    </div>
</div>

            <div class="col-lg-8">
                <h2 class=" display-5 fw-bold ms-5"><?php echo $name; ?></h2>
                <?php 
                $paragraphs = explode("\n", $deskripsi);
                  foreach ($paragraphs as $paragraph) {
                    if (!empty(trim($paragraph))) {
                        echo "<p class='fs-5 mb-3 ms-5'>" . htmlspecialchars($paragraph) . "</p>";
                    }
                }
                ?>

            </div>
        </div>
    </div>



<?php include_once "footer.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
