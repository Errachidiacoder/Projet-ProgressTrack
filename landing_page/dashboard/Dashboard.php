<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="assets/style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
</head>
<body>
  <div class="container">
    <nav>
      <ul>
        <li><a href="#" class="logo">
          <img src="assets/image/Dashboard.png" alt="">
          <span class="nav-item">DashBoard</span>
        </a></li>
        <li><a href="../landing/index.html">
          <i class="fas fa-home"> </i>
          <span class="nav-item">Home</span>
        </a></li>
        <li><a href="../tasks/index.html">
          <i class="fas fa-tasks"></i>
          <span class="nav-item">Tasks</span>
        </a></li>
        <li><a href="http://localhost:3000/signup/index.php" class="logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="nav-item">Log out</span>
        </a></li>
      </ul>
    </nav>
    <section class="main">
      <div class="main-top">
        <h1>Skills</h1>
        <i class="fas fa-user-cog"></i>
      </div>
      <div class="main-skills">
        <div class="card">
          <i class="fas fa-laptop-code"></i>
          <h3>Web development</h3>
          <button onclick="window.location.href='../ressources/index.html';">Get started</button>
        </div>
        <div class="card">
          <i class="fab fa-wordpress"></i>
          <h3>WordPress</h3>
          <button onclick="window.location.href='../ressources/index.html';">Get Started</button>
        </div>
        <div class="card">
          <i class="fas fa-palette"></i>
          <h3>Graphic design</h3>
          <button onclick="window.location.href='../ressources/index.html';">Get Started</button>
        </div>
        <div class="card">
          <i class="fab fa-app-store-ios"></i>
          <h3>iOS dev</h3>
          <button onclick="window.location.href='../ressources/index.html';">Get Started</button>
        </div>
      </div>
      <section class="main-course">
        <h1>My courses</h1>
        <div class="course-box">
          <ul>
            <li><a href="?status=in_progress" class="<?php echo (isset($_GET['status']) && $_GET['status'] == 'in_progress') ? 'active' : ''; ?>">In progress</a></li>
            <li><a href="?status=completed" class="<?php echo (isset($_GET['status']) && $_GET['status'] == 'completed') ? 'active' : ''; ?>">Finished</a></li>
          </ul>
          <div class="course">
            <?php
              include("connect.php");

              // Retrieve courses based on status
              $status = isset($_GET['status']) ? $_GET['status'] : 'in_progress';

              if ($status === 'in_progress') {
                // Query for courses with levels other than 'completed'
                $sql = "SELECT * FROM course WHERE level != 'completed'";
              } else {
                // Query for completed courses
                $sql = "SELECT * FROM course WHERE level = 'completed'";
              }

              $result = mysqli_query($connexion, $sql);

              while ($row = mysqli_fetch_array($result)) {
                $id = $row['id'];
                $level = $row['level'];
                $siteweb = $row['siteweb'];

            ?>
            <div class="box">
              <h3><?php echo $row['course']; ?></h3>
              <p><?php echo $level; ?></p>
              <button onclick="window.open('<?php echo $siteweb; ?>', '_blank')" class="btn">Continue</button>
            </div>
            <?php
              }
            ?>
          </div>
        </div>
      </section>
    </section>
  </div>
</body>
</html>
