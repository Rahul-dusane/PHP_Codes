<?php 
    session_start();

    $username_cookie = "";
    $password_cookie = ""; 

    if()
?>


<body>
    <form action="Registration.php" method="post">
        <label>UserName : </label><input type="text" name="username" required />
        <label>Password : </label><input type="password" name="password" required />
        <label>Confirm Password : </label><input type="password" name="confirm_password" required />
        <label>email : </label><input type="email" name="email" required />
        <label>Role : </label><select name="role" id="">
            <option value="User">User</option>
            <option value="Admin">Admin</option>
        </select>
        <button type="submit">Register</button>
    </form>
</body>
</html>