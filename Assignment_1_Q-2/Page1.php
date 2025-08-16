
<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['Name'] = $_POST['Name'];
    $_SESSION['Number'] = $_POST['Number'];
    $_SESSION['B_date'] = $_POST['B_date'];
    header("Location: Page2.php");
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
    <h2>Stuednt Info </h2>
    <form action="" method="post">
        <label for="name">Name : </label><input type="text" name="Name" id="name" /><br><br>
        <label for="roll">Rollno : </label><input type="number" name="Number" id="roll" /><br><br>
        <label for="date">Bith Date:  </label><input type="date" name="B_date" id="date" /><br><br>
        <button type=submit>Next</button>
    </form>
</body>
</html>