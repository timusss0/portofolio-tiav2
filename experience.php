<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Experience</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      background-color: #f4f4f4;
      color: #333;
      font-family: Arial, sans-serif;
    }
    .timeline-wrapper {
  position: relative;
  padding-left: 40px;
}

.timeline-wrapper::before {
  content: '';
  position: absolute;
  top: 0;
  left: 20px;
  width: 2px;
  height: 100%; 
  background-color: #6c757d;
}

.timeline {
  position: relative;
  margin-bottom: 3rem;
}

.timeline-point {
      position: absolute;
      left: -25px;
      top: 0;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background-color: black;
    }

</style>
  </style>
</head>
<body>

<?php include_once "navbar.php"; ?>
<section id="Experience">
  <div class="container mt-5">
    <h3 class="pre-title display-4 text-center mb-5">My Experience</h3>
    
    <?php
      require_once 'koneksi.php';
      $sql = "SELECT id, job_title, company_name, start_date, end_date, description, location FROM experience WHERE id IN (1, 2)";
      $result = $conn->query($sql);
      if (!$result) {
          echo "Error in query: " . $conn->error;
      }

      
      $experienceData = [];
      while ($row = $result->fetch_assoc()) {
          $experienceData[] = [
              'id' => $row['id'],
              'job_title' => htmlspecialchars($row["job_title"]),
              'company_name' => htmlspecialchars($row["company_name"]),
              'start_date' => date("F Y", strtotime($row["start_date"])),
              'end_date' => date("F Y", strtotime($row["end_date"])),
              'description' => htmlspecialchars($row["description"])
          ];
      }

      echo '<div class="timeline-wrapper">';
      foreach ($experienceData as $data) {
          echo '<div class="timeline">';
          echo '<div class="timeline-point"></div>';
          echo '<h5 class="fw-bold">' . $data['start_date'] . ' – ' . $data['end_date'] . '</h5>';
          echo '<h6 class="fw-bold fs-3">' . $data['company_name'] . '</h6>';
          echo '<p class="text-muted mb-2 fs-4">' . $data['job_title'] . '</p>';
        
          $descriptionList = explode('.', $data['description']);
          echo '<ul class="fs-4"> ';
          foreach ($descriptionList as $desc) {
              if (trim($desc)) {
                  echo '<li>' . trim($desc) . '.</li>'; 
              }
          }
          echo '</ul>';
          echo '</div>';
      }
      echo '</div>'; // Closing timeline-wrapper
      
    ?>
  </div>
</section>


<?php include_once "footer.php"; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
