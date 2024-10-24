<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $sql_insert = "INSERT INTO contact (name, email, message, created_at) VALUES ('$name', '$email', '$message', NOW())";

    if ($conn->query($sql_insert) === TRUE) {
        echo "<script>alert('Message sent successfully!');</script>";
    } else {
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

$sql = "SELECT id, name, email, message, created_at FROM contact ORDER BY created_at DESC LIMIT 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
      background-color: #f4f4f4;
      color: #333;
      font-family: Arial, sans-serif;
    }

    .contact-section {
            padding: 50px 0;
        }
        .contact-text h1 {
            font-weight: bold;
        }
        .social-icons i {
            font-size: 1.5rem;
            color: #495057;
            transition: color 0.3s ease;
        }
        .social-icons i:hover {
            color: #007bff;
        }
        .contact-image img {
            max-width: 100%;
            border-radius: 10px;
        }
        .contact-content {
            display: flex;
            justify-content: space-between;
        }
        .column {
            flex: 1; /* Use flexbox for responsive layout */
            margin: 10px; /* Add margin for spacing */
        }
        .left, .right {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .icons .row {
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        .icons .info {
            margin-left: 10px;
        }
        .icons .head {
            font-weight: bold;
        }
        .icons .sub-title {
            color: #555;
        }
        hr {
            margin: 10px 0;
        }
</style>
  </style>
</head>
<body>

<?php include_once "navbar.php"; ?>
<!-- Contact Section -->
<section class="contact" id="contact">
    <div class="container">
        <h2 class="title pt-5 text-center m-5 display-5">Kontak saya</h2>
        <div class="contact-content">
          
            <div class="column right">
                <div class="text">Submitted Messages</div>
                <p>Here is the latest message submitted via the contact form:</p>
                <div class="icons">
                    <?php
                    // Memeriksa apakah ada data yang ditemukan
                    if ($result->num_rows > 0) {
                        // Menampilkan data terbaru
                        $row = $result->fetch_assoc();
                        echo '<div class="row">';
                        echo '<i class="fas fa-user"></i>';
                        echo '<div class="info">';
                        echo '<div class="head">Name</div>';
                        echo '<div class="sub-title">' . htmlspecialchars($row["name"]) . '</div>'; // Use htmlspecialchars for security
                        echo '</div>';
                        echo '</div>';
                        
                        echo '<div class="row">';
                        echo '<i class="fas fa-envelope"></i>';
                        echo '<div class="info">';
                        echo '<div class="head">Email</div>';
                        echo '<div class="sub-title">' . htmlspecialchars($row["email"]) . '</div>';
                        echo '</div>';
                        echo '</div>';

                        echo '<div class="row">';
                        echo '<i class="fas fa-comment"></i>';
                        echo '<div class="info">';
                        echo '<div class="head">Message</div>';
                        echo '<div class="sub-title">' . htmlspecialchars($row["message"]) . '</div>';
                        echo '</div>';
                        echo '</div>';


                        echo '<div class="row">';
                        echo '<i class="fas fa-calendar-alt"></i>';
                        echo '<div class="info">';
                        echo '<div class="head">Date</div>';
                        echo '<div class="sub-title">' . htmlspecialchars($row["created_at"]) . '</div>';
                        echo '</div>';
                        echo '</div>';

                    } else {
                        echo "<p>No messages found.</p>";
                    }
                    ?>
                </div>
            </div>
            
          
            <div class="column left">
                <div class="text">Message me</div>
                <form action="" method="POST">
                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Name" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                  </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="Message.." required></textarea>
                    </div>
                    <div class="text-end">
                        <button type="submit" class="btn btn-success">Send</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
$conn->close();
?>

<!-- SCRIPTS -->
<script src="https://kit.fontawesome.com/f3aa134987.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
