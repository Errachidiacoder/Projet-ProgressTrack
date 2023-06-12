<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Edit Course</title>
    <style>
        body {
            background-color: #e1d4e4;
        }

        .btn-purple {
            background-color: #8a2be2;
            border-color: #8a2be2;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        h1 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .form-elemnt {
            margin-bottom: 15px;
        }
        .purple-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #7d2ae8;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }

        .purple-btn:hover {
            background-color: #5b13b9;
            color:#fff;
        }
        
        .radio-container {
            display: inline-block;
            margin-right: 10px;
          }
    </style>
</head>
<body>
    <div class="container my-5">
        <header class="d-flex justify-content-between my-4">
            <h1>Edit Course</h1>
            <div>
                <a href="index.php" class="btn btn-purple">Back</a>
            </div>
        </header>
        
        <form action="process.php" method="post">
            <?php 
            
            if (isset($_GET['id'])) {
                include("connect.php");
                $id = $_GET['id'];
                $sql = "SELECT * FROM course WHERE id=$id";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_array($result);
                ?>
                <div class="form-elemnt my-4">
                    <input type="text" class="form-control" name="course" placeholder="course:" value="<?php echo $row["course"]; ?>">
                </div>
                <div class="form-elemnt my-4">
                    <select name="siteweb" id="" class="form-control">
                        <option value="">Select course link:</option>
                        <option value="https://www.freecodecamp.org" <?php if($row["siteweb"]=="https://www.freecodecamp.org"){echo "selected";} ?>>https://www.freecodecamp.org</option>
                        <option value="https://www.udemy.com" <?php if($row["siteweb"]=="https://www.udemy.com"){echo "selected";} ?>>https://www.udemy.com</option>
                        <option value="https://www.coursera.org" <?php if($row["siteweb"]=="https://www.coursera.org"){echo "selected";} ?>>https://www.coursera.org</option>
                        <option value="https://www.codecademy.com" <?php if($row["siteweb"]=="https://www.codecademy.com"){echo "selected";} ?>>https://www.codecademy.com</option>
                    </select>
                </div>
                <div class="form-elemnt my-4">
                    <select name="category" id="" class="form-control">
                        <option value="">Select Course Type:</option>
                        <option value="web development" <?php if($row["category"]=="web development"){echo "selected";} ?>>web development</option>
                        <option value="wordpress" <?php if($row["category"]=="wordpress"){echo "selected";} ?>>wordpress</option>
                        <option value="graphic design" <?php if($row["category"]=="graphic design"){echo "selected";} ?>>graphic design</option>
                        <option value="ios dev" <?php if($row["category"]=="ios dev"){echo "selected";} ?>>ios dev</option>
                    </select>
                </div>
                <div class="form-element my-4">
                    <input type="date" name="date" id="" class="form-control" placeholder="Course start date:" value="<?php echo $row["date"]; ?>">
                </div>
                <div class="form-element my-4">
                    <label> select your level:</label><br>
                    <label class="radio-container">
                        <input type="radio" name="level" value="beginner" <?php if($row["level"]=="beginner"){echo "checked";} ?>>
                        Beginner
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="level" value="intermediate" <?php if($row["level"]=="intermediate"){echo "checked";} ?>>
                        Intermediate
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="level" value="advanced" <?php if($row["level"]=="advanced"){echo "checked";} ?>>
                        Advanced
                    </label>
                    <label class="radio-container">
                        <input type="radio" name="level" value="completed" <?php if($row["level"]=="completed"){echo "checked";} ?>>
                        Completed
                    </label>
                </div>
                <input type="hidden" value="<?php echo $id; ?>" name="id">
                <div class="form-element my-4">
                    <input type="submit" name="edit" value="Edit Course" class="btn btn-purple">
                </div>
                <?php
            } else {
                echo "<h3>Course Does Not Exist</h3>";
            }
            ?>
        </form>
    </div>
</body>
</html>
