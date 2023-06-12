<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Add New Course</title>
    <style>
        body {
            background-color: #e1d4e4;
        }

        .btn-purple {
            background-color: #8a2be2;
            border-color: #8a2be2;
            color:white;
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
            <h1>Add New Course</h1>
            <div>
                <a href="index.php" class="btn btn-purple">Back</a>
            </div>
        </header>
        
        <form action="process.php" method="post">
            <div class="form-group my-4">
                <input type="text" class="form-control" name="course" placeholder="Course:">
            </div>
            <div class="form-group my-4">
                <select name="siteweb" id="siteweb" class="form-control">
                    <option value="">Select a Website:</option>
                    <option value="https://www.freecodecamp.org">https://www.freecodecamp.org</option>
                    <option value="https://www.udemy.com">https://www.udemy.com</option>
                    <option value="https://www.coursera.org">https://www.coursera.org</option>
                    <option value="https://www.codecademy.com">https://www.codecademy.com</option>
                </select>
            </div>
            <div class="form-group my-4">
                <select name="category" id="" class="form-control">
                    <option value="">Select category:</option>
                    <option value="web">web development</option>
                    <option value="wordpress">wordpress</option>
                    <option value="graphic">graphic design</option>
                    <option value="ios">iOS dev</option>
                </select>
            </div>
            <div class="form-group my-4">
                <input type="date" class="form-control" name="date" placeholder="Start Date">
            </div>
            <div class="form-group my-4">
                <label>Select your level:</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="level" value="beginner">
                    <label class="form-check-label">Beginner</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="level" value="intermediate">
                    <label class="form-check-label">Intermediate</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="level" value="advanced">
                    <label class="form-check-label">Advanced</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="level" value="completed">
                    <label class="form-check-label">Completed</label>
                </div>
            </div>
            <div class="form-group my-4">
                <input type="submit" name="create" value="Add Course" class="btn btn-purple">
            </div>
        </form>
    </div>
</body>
</html>
