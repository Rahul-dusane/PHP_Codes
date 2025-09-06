<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="verify.php" method="post">
        <div>
            Captcha : 
            <input type="text" name="cpatcha" placeholder="Enter Captcha">
            <img src="captcha.php" alt="captcha">
            <div>
                <input type="submit" value="Submit">
            </div>
        </div>
    </form>
</body>
</html>