<?php
session_start(); // เริ่มการใช้งาน session
include '../config/db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/nav.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100..900&family=Roboto+Condensed:wght@500&display=swap" rel="stylesheet">
</head>
<body>
    <nav>
        <div class="nav_con">
            <div class="logo">
                <img src="../img/logo.png" alt="Logo">
            </div>
            <ul class="nav_menu">
                <li><a href="../index.php">หน้าแรก</a></li>
                <li><a href="../shop.php">ร้านอาหารและเครื่องดื่ม</a></li>
                <li><a href="../post/post.php">กระทู้พูดคุย</a></li>
                <li><a href="../form/form.php">ทดสอบการประเมินADL</a></li>
            </ul>
            <div class="login_page">
                <a href="../log-register/login.php" aria-label="User Login">
                    <div class="icon_login">
                        <i class="fa-regular fa-user"></i>
                    </div>
                    <span>
                        <?php if (isset($_SESSION['user_name'])): ?>
                            <?php echo htmlspecialchars($_SESSION['user_name']); ?>
                            <a href="../log-register/logout.php" class="logout"><i class="bi bi-box-arrow-right"></i>&nbsp<span>ออกจากระบบ</span></a>
                        <?php else: ?>
                            เข้าสู่ระบบ
                        <?php endif; ?>
                    </span>
                </a>
            </div>
        </div>
    </nav>
</body>
</html>
