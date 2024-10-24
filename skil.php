<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Skills</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      background-color: #f4f4f4;
      color: #333;
      font-family: Arial, sans-serif;
    }
    .tech-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 1.2rem;
        }
        .tech-item i, .tech-item img {
            margin-right: 10px;
        }
        h1, h3 {
            font-weight: bold;
        }
        .main-container {
            padding: 50px 0;
         
        }
        .grid-2 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }
        .service {
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 10px pink;


        }

        .skills-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    margin-top: 50px;
}

.frontend, .backend {
    grid-column: span 1;
}

.tools {
    grid-column: 1 / -1; 
    margin-top: 20px;
    text-align: center;
}

    </style>

</style>
  </style>
</head>
<body>

<?php include_once "navbar.php"; ?>
<?php
    require_once 'koneksi.php';
    $sql = "SELECT id,skils, name_skill FROM Skills WHERE id IN (1, 2, 3)";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error in query: " . $conn->error;
    }
      // Menyimpan semua hasil dalam array
      $skillsData = [];
      while ($row = $result->fetch_assoc()) {
          $skillsData[] = [
            'id' => $row['id'],
              'name' => htmlspecialchars($row["name_skill"]),
              'skills' => explode(',', $row['skils'])
          ];
      }
?>
<div class="container main-container">
        <h3 class="text-center pre-title">Skills</h3>
        <h5 class="text-center section-title">My Skills</h5>
        
        <div class="skills-grid">
        <div class=" frontend">
        <?php
            // Tampilkan setiap set data skill
            foreach ($skillsData as $data) {
                if ($data['id'] == 1) {
                    echo '<div class="service">';
                    echo '<h1 class="text-center">' . $data['name'] . '</h1>';

                foreach ($data['skills'] as $skill) {
                    echo '<div class="tech-item">';

                    if ($skill == "Bootstrap") {
                        echo '<i class="fa-brands fa-bootstrap fa-xl" style="color: #563d7c;"></i> ' . $skill;
                    } elseif ($skill == "TailwindCSS") {
                        echo '<img src="image/tailwindcss.png" width="28" height="18" alt="TailwindCSS"> ' . $skill;
                    } elseif ($skill == "HTML") {
                        echo '<i class="fa-brands fa-html5 fa-xl" style="color: #ff7800;"></i> ' . $skill;
                    } elseif ($skill == "CSS") {
                        echo '<i class="fa-brands fa-css3-alt fa-xl" style="color: #1c71d8;"></i> ' . $skill;
                    } elseif ($skill == "JavaScript") {
                        echo '<i class="fa-brands fa-js fa-xl" style="color: #FFD43B;"></i> ' . $skill;
                    }

                    echo '</div>';
                }
                
                echo '</div>';
            }
        }
        ?>
        </div>

        <div class=" backend">
        <?php
            foreach ($skillsData as $data) {
                if ($data['id'] == 2) {
                    echo '<div class="service">';
                    echo '<h1 class="text-center">' . $data['name'] . '</h1>';

                    foreach ($data['skills'] as $skill) {
                        echo '<div class="tech-item">';

                        if ($skill == "Laravel") {
                            echo '<i class="fa-brands fa-laravel fa-xl" style="color: #fb503b;"></i> ' . $skill;
                        } elseif ($skill == "PHP") {
                            echo '<i class="fa-brands fa-php fa-xl" style="color: #31528c;"></i> ' . $skill;
                        } elseif ($skill == "MySQL") {
                            echo '<img src="image/mysql.png" width="28" height="18" alt="MySQL"> ' . $skill;
                        }

                        echo '</div>';
                    }
                    
                    echo '</div>';
                }
            }
        ?>
    </div>

    <div class=" tools">
        <?php
            foreach ($skillsData as $data) {
                if ($data['id'] == 3) {
                    echo '<div class="service">';
                    echo '<h1 class="text-center">' . $data['name'] . '</h1>';



                    foreach ($data['skills'] as $skill) {
                        echo '<div class="tech-item">';

                        if ($skill == "Visual Studio Code") {
                            echo '<img src="image/vscode.png" width="25" height="25" alt="">  ' . $skill;
                        } elseif ($skill == "Git") {
                            echo '<i class="fa-brands fa-git" width="28" height="18" alt="TailwindCSS"></i> ' . $skill;
                        } elseif ($skill == "Github") {
                            echo '<i class="fa-brands fa-github"></i> ' . $skill;
                        } elseif ($skill == "Figma") {
                            echo '<i class="fa-brands fa-figma"></i> ' . $skill;

                        echo '</div>';
                    }
                    
                    echo '</div>';
                }
            }
        }
        ?>
    </div>
    </div>
</div>
</div>
</div>



<?php include_once "footer.php"; ?>



<!-- SCRIPTS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/f3aa134987.js" crossorigin="anonymous"></script>
</body>
</html>
