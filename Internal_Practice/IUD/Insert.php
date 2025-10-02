<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Student Insert</h2>

    <?php 
        include "Connection.php";
    ?>

    <form action="Insert.php" method="POST">
        <label>First Name : </label><input type="text" name="first" /><br><br>
        <label>Last Name : </label><input type="text" name="last" /><br><br>
        <label>DOB : </label><input type="date" name="dob" /><br><br>
        <label>Gender : </label><input type="radio" name="gender" value="Male"/>Male
                                <input type="radio" name="gender" value="Female"/>Female
                                <input type="radio" name="gender" value="Other"/>Other<br><br>
        <label>Email : </label><input type="email" name="email" /><br><br>
        <label>Phone : </label><input type="number" name="phone" /><br><br>
        <input type="submit" name="submit"  />
    
    </form>

    <?php 
        
        if(isset($_POST["submit"])){

            $first = $_POST["first"];
            $last = $_POST["last"];
            $dob = $_POST["dob"];
            $gender = $_POST["gender"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];

            echo $first.$last.$dob.$gender.$email.$phone;

            $query = "INSERT INTO student (first_name, last_name, dob, gender, email, phone) VALUES ('$first','$last','$dob','$gender','$email',$phone)";

            if(mysqli_query($conn,$query)){
                echo "Query Successfully Processed...";
            }

        }

    ?>



</body>
</html>