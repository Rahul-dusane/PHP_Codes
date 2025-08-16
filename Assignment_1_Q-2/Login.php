<?php
    session_start();

    $roll_cookie = '';
    $name_cookie = '';

    if(isset($_COOKIE['Number'])){
        $roll_cookie = $_COOKIE['Number'];
    }

    if(isset($_COOKIE['Name'])){
        $name_cookie = $_COOKIE['Name'];
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $roll = $_POST['Number'];
        $name = $_POST['Name'];
        if($roll == $_SESSION['Number'] && $name == $_SESSION['Name']){
            if(isset($_POST['Remember'])){
                setcookie("Number", $roll,time() + 86400);
                setcookie("Name", $name,time() + 86400);
            }
            echo "Login successful! <a href='Deshbord.php'>Go to Dashboard</a>";
        }else{
            $error = "Invalid Roll Number or Name!";
        }
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
    <h2>Login</h2>
    <?php 
        if(!empty($error)){
            echo '<p style="color:red;">'.$error.'</p>';
        }
    ?>

    <form method="post">
        <label for="name">Roll Number : </label><input type="text" name="Number" id="name" value="<?php echo$roll_cookie; ?>"/><br><br>
        <label for="name">Name : </label><input type="text" name="Name" id="name"  value="<?php echo $name_cookie; ?>" /><br><br>
        <label><input type="checkbox" name="Remember">Remember Me</label><br><br>

        <button type=submit>Login</button>
    </form>
</body>
</html>