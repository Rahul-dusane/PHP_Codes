<?php
session_start();
if (!isset($_SESSION['Course']) || !isset($_SESSION['Semester']) || !isset($_SESSION['Percentage'])) {
    header("Location: Page2.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['Email'] = $_POST['Email'];
    $_SESSION['Phone'] = $_POST['Phone'];
    $_SESSION['Address'] = $_POST['Address'];
    header("Location: Final.php");
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
    <h2>Contect Info</h2>
    <form method="post" action="">
        <label for="email">Email : </label><input type="email" name="Email" id="email" /><br><br>
        <label for="phone">Phone Number : </label><input type="number" name="Phone" id="phone" /><br><br>
        <label for="address">Address : </label><textarea name="Address" id="address"></textarea><br><br>

        <button type="submit">Finish</button>

    </form>    
</body>
</html>