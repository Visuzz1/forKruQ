<?php
session_start();
include '../config/db.php';

if (isset($_POST['signin'])) {
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header("location: login.php");
        exit();
    } else {
        try {
            // ตรวจสอบว่ามีผู้ใช้ในฐานข้อมูลหรือไม่
            $stmt = $conn->prepare("SELECT * FROM `registermember` WHERE user_email = :user_email OR user_number = :user_email");
            $stmt->bindParam(":user_email", $email);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                if (password_verify($password, $row['user_password'])) {
                    if ($row['user_role'] == 'admin') {
                        $_SESSION['admin_login'] = $row['id'];
                        $_SESSION['user_name'] = $row['username']; // เก็บชื่อผู้ใช้ใน session
                        header("location: ../admin.php");
                        exit();
                    } else {
                        $_SESSION['user_login'] = $row['id'];
                        $_SESSION['user_name'] = $row['username']; // เก็บชื่อผู้ใช้ใน session
                        header("location: ../index.php");
                        exit();
                    }
                } else {
                    $_SESSION['error'] = 'รหัสผ่านไม่ถูกต้อง';
                }
            } else {
                $_SESSION['error'] = "ไม่พบอีเมลนี้ในระบบ";
            }
            header("location: login.php");
            exit();
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด: " . $e->getMessage();
        }
    }
}
?>
