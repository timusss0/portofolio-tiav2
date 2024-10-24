
<?php
    require_once 'koneksi.php';
    $sql = "SELECT img, nama,deskripsi FROM footer WHERE id = 1";
    $result = $conn->query($sql);
    if (!$result) {
        echo "Error in query: " . $conn->error;
    }
    // Cek apakah ada hasil
    if ($result->num_rows > 0) {
        // Menampilkan data
        $row = $result->fetch_assoc();
        $nama = htmlspecialchars($row["nama"]);
        $deskripsi = htmlspecialchars($row["deskripsi"]);
        $img = htmlspecialchars($row["img"]);
    } else {
        $name = "Default name";
        $deskripsi = "Default desc";
        $img = "default.jpg"; 
    }

?>

<footer class="text-white pt-4" style="background-color: #dc3545;">
    <div class="container">
      <div class="row">
        <!-- Logo & Description -->
        <div class="col-lg-4 col-md-6 mb-4">
          <h5><?php echo $nama ?></h5>
          <p><?php echo $deskripsi?></p>
        </div>

        <!-- Social Media Links -->
        <div class="col-lg-4 col-md-6 mb-4">
        
        </div>

        <!-- Contact Info -->
        <div class="col-lg-3 col-md-6 mb-4">
          <h5>Contact</h5>
          <p>Bintaro , Tangerang Selatan</p>
          <p>Email: tia.mustikaramadhani@student.upj.ac.id</p>
          <p>Phone: 085965865409</p>
        </div>
      </div>
    </div>
    
    <!-- Copyright -->
    <div class=" text-center py-3"  style="background-color: #e67782">
      <p class="mb-0">&copy; 2024 Tia Mustika Ramadhani. All rights reserved.</p>
    </div>
  </footer>