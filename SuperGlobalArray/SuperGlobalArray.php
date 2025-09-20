    <?php
        $GLOBALS['a'] = 5;  
   ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

        <form method="post" >
            b : <input type="Number" name="num" id="num" /><br><br>

            Name : <input type="text" name="name" id="name"><br><br>
            value : <input type="text" name="value" id="value">  <br><br>

            <button type="submit">Submit</button>
        </form>
        
    </body>
    </html>

    <?php

        //Globals

        function sum(){
            
            $b = $_POST["num"];
            
            $c = $GLOBALS['a'] + $b;

            return "Sum = ".$c;

        }

        //Server

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            echo sum()."<br>";

            echo "It is the current script location : ".$_SERVER['PHP_SELF']."<br>";

            echo "It is the current server address : ".$_SERVER['SERVER_ADDR']."<br>";

            echo "It is the current server name : ".$_SERVER['SERVER_NAME']."<br>";

            echo "It is the information about protocol : ".$_SERVER['SERVER_PROTOCOL']."<br>";

        }

        // Cookies

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $cookie_name = $_POST["name"];
            $cookie_value = $_POST["value"];

            setcookie($cookie_name,$cookie_value,time()+(86400*30),"/");
        }

        if(isset($_COOKIE[$cookie_name])){
            echo "The name : " . $_COOKIE[$cookie_name] . "<br>";
            echo "The value : " . $_COOKIE[$cookie_value] . "<br>";
        }else{
            echo "Data Is Not Set In The Cookies ...!";
        }

    ?>