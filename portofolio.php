<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portofolio</title>
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

    .custom-shadow {
    box-shadow: 0 20px 20px rgba(255, 182, 193, 0.6) !important;
  }

</style>
  </style>
</head>
<body>

<?php include_once "navbar.php"; ?>
<?php
    require_once 'koneksi.php';
    $sql = "SELECT id,project_name, tech , description, image_url  FROM  portfolio WHERE id IN (1, 2, 3)";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error in query: " . $conn->error;
    }
      // Menyimpan semua hasil dalam array
      $skillsData = [];
      while ($row = $result->fetch_assoc()) {
          $skillsData[] = [
            'id' => $row['id'],
              'project_name' => htmlspecialchars($row["project_name"]),
              'tech' => explode(',', $row['tech']),
              'description' => htmlspecialchars($row["description"]),
              'image_url' => htmlspecialchars($row["image_url"])
          ];
      }
?>
<!-- portofolio -->
<section id="portfolios">
  <div class="container">
    <h3 class="text-center text-muted mt-5 mb-5 display-6">My Portfolio</h3>
    <div class="row">
      <?php foreach ($skillsData as $project) { ?>
        <div class="col-lg-4 col-md-6">
          <div class="card mb-5 rounded custom-shadow">
            <img src="<?php echo $project['image_url']; ?>" class="card-img-top" alt="Portfolio Image"/>
            <div class="card-body">
              <h4 class="card-title"><?php echo $project['project_name']; ?></h4>
              <div class="mb-3">
                <?php foreach ($project['tech'] as $tech) { ?>
                  <span class="badge bg-secondary fs-5 me-2 mt-2"><?php echo htmlspecialchars($tech); ?></span>
                <?php } ?>
              </div>
              <p class="card-text fs-5">
                <?php echo $project['description']; ?>
              </p>
            </div>
          </div>
        </div>
        
      <?php } ?>
    </div>
  </div>
</section>


<!-- AKHIR portofolio -->

<?php include_once "footer.php"; ?>
<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
