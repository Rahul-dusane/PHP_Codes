
<?php

    $date = [
        "India" => ["Maharashtra" => ["Mumbai","Pune","Nashik"], "Gujarat"=>["Ahemdabad","Surat","Vdodara"]],
        "Japan" => ["Tokyo"=>["Shinjuku","Shibuya","Akihabara"], "Osaka"=>["Namba","Umeda"]],
        "Briten" => ["Englend"=>["London","Manchester","Liverpool"], "Scotland"=>["Edinbutgh","Glasgow"]]
    ];

    if(isset($_POST['country']) && !isset($_POST['state']) && !isset($_POST['submit'])){
    $country = $_POST['country'];
    if(isset($date[$country])){
        echo '<option value="">Select State</option>';
        foreach($date[$country] as $stateName => $cities){
            echo "<option value='$stateName'>$stateName</option>";
        }
    }
    exit;
}

if(isset($_POST['country']) && isset($_POST['state']) && !isset($_POST['submit'])){
    $country = $_POST['country'];
    $state = $_POST['state'];
    if(isset($date[$country][$state])){
        echo '<option value="">Select City</option>';
        foreach($date[$country][$state] as $city){
            echo "<option value='$city'>$city</option>";
        }
    }
    exit;
}

    
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];  
    $con_pass = $_POST["con_password"];
    $phone = $_POST["phone"];
    $country = $_POST["country"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $captcha = $_POST["captcha"];

    session_start();

    echo "Form submitted!<br>";
    echo "Country: $country, State: $state, City: $city";

    if($_SESSION["code"] == $captcha){
        echo "Captcha Validate...";
    }else{
        echo "Captch Is Not Validate...";
    }

    session_abort();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Form Validation</h2>

    <form action="Form.php" method="post">
        <label>User Name :</label><input type="text" name="username" /><br><br>
        
        <label>Email :</label><input type="email" name="email" /><br><br>
        
        <label>Password:</label><input type="password" name="password" /><br><br>
        
        <label>confirm Password :</label><input type="password" name="con_password" /><br><br>
        
        <label>Phone :</label><input type="number" name="phone" /><br><br>
        
        <label>Country :</label><select name="country" id="country"><br><br>
            <option value="">Select Country </option>   
            <?php 
                foreach($date as $countryName => $states){
                    echo "<option value='$countryName'>$countryName</option>";
                }
            ?>
        </select><br><br>
        
        <label>State :</label><select name="state" id="state">
            <option value="">Select State </option>
        </select><br><br>
        
        <label>City :</label><select name="city" id="city">
            <option value="">Select City </option>            
        </select><br><br>
        
        Captcha <img src="../Captch/Captch.php" /><br><br>
        <label>Captcha :</label><input type="text" name="captcha" /><br><br>

        <input type="submit" name="submit" value="Submit" /><br><br>
        
    </form>

    <script>
        $(document).ready(function () {
            
            $("#country").change(function (){
                var country = $(this).val();
                $("#state").html('<option value="">Loading..</option>');
                $("#city").html('<option value="">Select City</option>');
                
                if(country != ""){
                    $.ajax({
                        url:"Form.php",
                        type:"POST",
                        data:{country:country},
                        success: function(response){
                            $("#state").html(response);
                        }
                    });
                }else{
                    $("#state").html('<option value="">Select State</option>');
                }
            });

            $("#state").change(function (){
                var country = $("#country").val();
                var state = $(this).val();
                $("#city").html('<option value="">Loading..</option>');

                if(state != ""){
                    $.ajax({
                        url:"Form.php",
                        type:"POST",
                        data:{country:country,state:state},
                        success: function(response){
                            $("#city").html(response);
                        }
                    });
                }else{
                    $("#city").html('<option value="">Select City</option>');
                }
            });
        });
    </script>

</body>
</html> 