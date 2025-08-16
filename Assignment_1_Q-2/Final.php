<?php
session_start();
if (!isset($_SESSION['Email']) || !isset($_SESSION['Phone']) || !isset($_SESSION['Address'])) {
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
    <h2>Registration Completed!</h2>
    <h3>Your Profile: </h3>
    <table border="1" cellpadding="8">
        
        <tr>
            <td>Roll Number</td>
            <td><?php echo $_SESSION["Number"];?></td>
        </tr>

        <tr>
            <td>Name</td>
            <td><?php echo $_SESSION["Name"];?></td>
        </tr>
        
        <tr>
            <td>Birth Date</td>
            <td><?php echo $_SESSION["B_date"];?></td>
        </tr>
        
        <tr>
            <td>Course</td>
            <td><?php echo $_SESSION["Course"];?></td>
        </tr>
        
        <tr>
            <td>Semester</td>
            <td><?php echo $_SESSION["Semester"];?></td>
        </tr>
        
        <tr>
            <td>Percentage</td>
            <td><?php echo $_SESSION["Percentage"];?></td>
        </tr>
        
        <tr>
            <td>Email</td>
            <td><?php echo $_SESSION["Email"];?></td>
        </tr>
        
        <tr>
            <td>Phone</td>
            <td><?php echo $_SESSION["Phone"];?></td>
        </tr>
        
        <tr>
            <td>Address</td>
            <td><?php echo $_SESSION["Address"];?></td>
        </tr>
        
    </table>
    <br>
    <a href="Login.php">Go To Login Page</a>
</body>
</html>