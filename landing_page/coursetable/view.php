<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Course Details</title>
    <style>
        body {
            background-color: #e1d4e4;
        }

        .Course-details {
            background-color: #f5f5f5;
            padding: 20px;
            margin-top: 20px;
        }

        .btn-back {
            background-color: #8a2be2;
            border-color: #8a2be2;
            color: white;
        }

        .btn-back:hover {
            background-color: #6b238e;
            border-color: #6b238e;
        }

        .detail-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: bold;
            width: 150px;
        }

        .detail-value {
            margin-left: 10px;
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Course Details</h1>
            <div>
                <a href="index.php" class="btn btn-primary btn-back">Back</a>
            </div>
        </header>
        <div class="Course-details p-5 my-4">
            <?php
            include("connect.php");
            $id = $_GET['id'];
            if ($id) {
                $sql = "SELECT * FROM course WHERE id = $id";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_array($result)) {
                 ?>
                 <div class="detail-item">
                    <div class="detail-label">Course:</div>
                    <div class="detail-value"><?php echo $row["course"]; ?></div>
                 </div>
                 <div class="detail-item">
                    <div class="detail-label">Siteweb:</div>
                    <div class="detail-value"><?php echo $row["siteweb"]; ?></div>
                 </div>
                 <div class="detail-item">
                    <div class="detail-label">Category:</div>
                    <div class="detail-value"><?php echo $row["category"]; ?></div>
                 </div>
                 <div class="detail-item">
                    <div class="detail-label">Start Date:</div>
                    <div class="detail-value"><?php echo $row["date"]; ?></div>
                 </div>
                 <div class="detail-item">
                    <div class="detail-label">Level:</div>
                    <div class="detail-value"><?php echo $row["level"]; ?></div>
                 </div>
                 <?php
                }
            }
            else{
                echo "<h3>No courses found</h3>";
            }
            ?>
            
        </div>
    </div>
</body>
</html>
