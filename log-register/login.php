<?php
include '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,300;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
    .login-box form input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-sizing: border-box;
    }
    </style>
</head>
<body>
    <div class="login-container">
    <?php
    session_start();
    if (isset($_SESSION['error'])) {
        echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    ?>
        <div class="login-box">
            <img src="../img/logo.png" alt="" width="150">
            <h2>เข้าสู่ระบบ</h2>
            <form action="logindata.php" method="post">
                <input type="text" name="user_email" placeholder="เบอร์โทร/อีเมล" required>
                <input type="password" name="user_password" placeholder="รหัสผ่าน" required>
                <button type="submit" name="signin">เข้าสู่ระบบ</button>
            </form>
            <a href="register.php" class="signup-link">สมัครสมาชิก</a>
            <div class="divider"><span>หรือ</span></div>
            <div class="social-login">
                <button class="facebook-btn"><i class="fab fa-facebook-f"></i> เข้าสู่ระบบด้วย Facebook</button>
                <button class="line-btn"><i class="fab fa-line"></i> เข้าสู่ระบบด้วย LINE</button>
                <button class="google-btn"><i class="fab fa-google"></i> เข้าสู่ระบบด้วย Google</button>
            </div>
        </div>
    </div>
</body>
</html>
