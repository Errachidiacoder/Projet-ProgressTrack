<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Course List</title>
    <style>
        body {
            background-color: #e1d4e4;
        }
        
        table {
            text-align: center;
            border-radius: 10px;
            background-color: #e1d4e4;
            overflow-x: auto;
        }

        table th {
            vertical-align: middle;
            color: white;
        }

        table td,
        table th {
            padding: 10px;
            color: black;
        }

        .btn-primary,
        .btn-info,
        .btn-warning,
        .btn-danger {
            background-color: #8a2be2;
            border-color: #8a2be2;
            color: white;
            margin-right: 10px;
        }

        .btn-primary:hover,
        .btn-info:hover,
        .btn-warning:hover,
        .btn-danger:hover {
            background-color: #6b238e;
            border-color: #6b238e;
        }
        .table-bordered {
            border-color: purple;
            border: 3px solid purple;
            border-collapse: collapse;
        }

        .table-bordered th,
        .table-bordered td {
            border-color: purple;
            border: 2px solid purple;
            border-collapse: collapse; 
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <header class="d-flex justify-content-between my-4">
            <h1>Course List</h1>
            <div>
                <a href="create.php" class="btn btn-primary">Add New Course</a>
            </div>
        </header>
        <?php
        session_start();
        if (isset($_SESSION["create"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["create"];
            ?>
        </div>
        <?php
        unset($_SESSION["create"]);
        }
        ?>
        <?php
        if (isset($_SESSION["update"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["update"];
            ?>
        </div>
        <?php
        unset($_SESSION["update"]);
        }
        ?>
        <?php
        if (isset($_SESSION["delete"])) {
        ?>
        <div class="alert alert-success">
            <?php 
            echo $_SESSION["delete"];
            ?>
        </div>
        <?php
        unset($_SESSION["delete"]);
        }
        ?>
        
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course</th>
                        <th>siteweb</th>
                        <th>category</th>
                        <th>date</th>
                        <th>level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('connect.php');
                $sqlSelect = "SELECT * FROM course";
                $result = mysqli_query($conn, $sqlSelect);
                while ($data = mysqli_fetch_array($result)) {
                ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['course']; ?></td>
                        <td><?php echo $data['siteweb']; ?></td>
                        <td><?php echo $data['category']; ?></td>
                        <td><?php echo $data['date']; ?></td>
                        <td><?php echo $data['level']; ?></td>
                        <td>
                            <div class="btn-group">
                                <a href="view.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Learn More</a>
                                <a href="edit.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                            </div>
                        </td>
                    </tr>
                <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
