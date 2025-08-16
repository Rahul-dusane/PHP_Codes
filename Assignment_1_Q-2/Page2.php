<?php
session_start();
if (!isset($_SESSION['Name']) || !isset($_SESSION['Number']) || !isset($_SESSION['B_date'])) {
    header("Location: Page1.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['Course'] = $_POST['Course'];
    $_SESSION['Semester'] = $_POST['Semester'];
    $_SESSION['Percentage'] = $_POST['Percentage'];
    header("Location: Page3.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Acedemic Info </h2>
    <form action="" method="post">
        <label for="course">Course : </label><input type="text" name="Course" id="course" /><br><br>
        <label for="sem">Semester : </label><input type="number" name="Semester" id="sem" /><br><br>
        <label for="per">Percentage : </label><input type="number" name="Percentage" id="per" /><br><br>
        
        <a href="page1.php" style="text-decoration:none;">
            <button type="button">Previous</button>
        </a>

        <button type="submit">Next</button>
    </form>
    
</body>
</html>