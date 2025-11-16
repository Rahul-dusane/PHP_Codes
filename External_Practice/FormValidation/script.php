<?php

    if(isset($_POST["submit"])){

        $captch = $_POST["captch"];

        session_start();
        if($_SESSION["code"] == $captch){
            $name = $_POST["name"];
            $email = $_POST["email"];
            $pass = $_POST["password"];
            $cpass = $_POST["cpass"];
            $phone = $_POST["number"];
            $state = $_POST["state"];
            $gender = $_POST["gender"];

            echo "Vallid Captch..";

            $conn = mysqli_connect("localhost","root","","test");
            if($conn){
                echo"Connect";
            }else{
                echo"not Connct";
            }

            $query = "INSERT INTO test (name,email,password,phone,state,gender) VALUES ('$name','$email',$pass,$phone,'$state','$gender')";
            $result = mysqli_query($conn,$query);
            if($result){
                echo" data inserted";
            }else{
                echo " data not inserted";
            }

            $query1 = "select * from test";
            $resutl1 = mysqli_query($conn,$query1);

            echo"<table border='1' cellspacing='1' cellpadding='8'> 
                <tr>  
                    <th>Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>phone</th>
                    <th>State</th>
                    <th>Gender</th>
                </tr>
            ";

            while($row = mysqli_fetch_assoc($resutl1)){
                echo"
                <tr>  
                    <td>".$row['name']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['password']."</td>
                    <td>".$row['phone']."</td>
                    <td>".$row['state']."</td>
                    <td>".$row['gender']."</td>
                    
                </tr>";
            }
            echo"</table>";

        }else{
            echo "Invallid Captch..";
        }
        session_abort();
    }

?>
