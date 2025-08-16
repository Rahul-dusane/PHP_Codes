<?php
session_start();
if (!isset($_SESSION['Name']) || !isset($_SESSION['Number'])) {
    header("Location: Login.php");
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
    <h2>Welcome, <?php echo $_SESSION["Name"]; ?></h2>
    <p>Your Roll Number : <?php echo $_SESSION['Number']; ?></p>

    <h3>User info:</h3>
    <ul>
        <li>Course: <?php echo $_SESSION['Course']; ?></li>
        <li>Semester: <?php echo $_SESSION['Semester']; ?></li>
        <li>Email: <?php echo $_SESSION['Email']; ?></li>
    </ul>
</body>
</html>