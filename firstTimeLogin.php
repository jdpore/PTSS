<?php
$username = $_GET['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    <title>Login Page - PTSS</title>
</head>

<body>
    <div class="center">
        <img class="logo" src="img/new.png" alt="ubix">
        <div class="title">Project Tracking System</div>
        <div class="title" style="padding-bottom: 0;">Change Password</div>
        <form name="form" action="php/login.php" onsubmit="return isvalid()" method="POST">
            <div class="txt_field">
                <input type="text" id="user" name="user" value="<?php echo $username ?>">
                <span></span>
                <label>Username</label>
            </div>
            <div name="password" type="VARCHAR" class="txt_field">
                <input type="password" id="pass" name="pass" required>
                <span></span>
                <label>Password</label>
            </div>
            <input type="submit" id="btn" value="Login" name="newLogin">
        </form>
    </div>
</body>

</html>