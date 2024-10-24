<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio</title>
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

    .junior {
    color: #688de8;
}

.web-developer {
    color: #e86875;
}

.subtitle {
    letter-spacing: 3px; 
    text-transform: uppercase; 
}
</style>
  </style>
</head>
<body>

<?php include_once "navbar.php"; ?>

<!-- HERO -->
<?php
    require_once 'koneksi.php';
    $sql = "SELECT title, subtitle, description FROM HOME WHERE id = 1";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error in query: " . $conn->error;
    }
    // Cek apakah ada hasil
    if ($result->num_rows > 0) {
        // Menampilkan data
        $row = $result->fetch_assoc();
        $title = htmlspecialchars($row["title"]);
        $subtitle = htmlspecialchars($row["subtitle"]);
        $description = htmlspecialchars($row["description"]);
    } else {
        $title = "Default Title";
        $subtitle = "Default Subtitle";
        $description = "Default description goes here.";
    }

    $title_parts = explode(' ', $title);
    $title_html = '<span class="junior">' . $title_parts[0] . '</span> <span class="web-developer">' . $title_parts[1] . ' ' . $title_parts[2] . '</span>';
?>
<!-- HERO -->
<section class="hero py-5 mt-lg-5 ">
    <div class="container d-flex flex-column-reverse flex-md-row align-items-center justify-content-between">
        <div class="hero-content text-center text-md-start col-xl-7 col-md-7 col-sm-7 mt-md-5">
            <h5 class="text-muted mb-3 subtitle"><?php echo $subtitle; ?></h5>
            <h1 class="display-3 fw-bold"><?php echo $title_html; ?></h1>
            <p class="text-muted"><?php echo $description; ?></p>
            <a href="CV.pdf" class="btn btn-dark me-2" style="background:#e86875;">Download CV</a>
            <a href="kontak.php" class="btn btn-outline-dark" style="background:#7fb2f5;">Contact Me</a>
        </div>
        <div class="hero-image mb-3 mt-5 col-xl-5 col-md-7 col-sm-5" id="profileImage">
            <img src="image/me.png" class="img-fluid rounded-circle" alt="Profile Image">
        </div>
    </div>
</section>
<!-- AKHIR HERO -->

<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
