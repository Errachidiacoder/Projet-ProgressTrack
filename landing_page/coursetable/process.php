<?php
include('connect.php');
if (isset($_POST["create"])) {
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $siteweb = mysqli_real_escape_string($conn, $_POST["siteweb"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $date=mysqli_real_escape_string($conn, $_POST["date"]);
    $level=mysqli_real_escape_string($conn, $_POST["level"]);
    $sqlInsert = "INSERT INTO course(course , siteweb , category , date,level) VALUES ('$course','$siteweb','$category', '$date','$level')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "course Added Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
if (isset($_POST["edit"])) {
    $course = mysqli_real_escape_string($conn, $_POST["course"]);
    $siteweb = mysqli_real_escape_string($conn, $_POST["siteweb"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $date = mysqli_real_escape_string($conn, $_POST["date"]);
    $level = mysqli_real_escape_string($conn, $_POST["level"]);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $sqlUpdate = "UPDATE course SET course = '$course', siteweb = '$siteweb', category = '$category', date = '$date',level='$level' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "course Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>