<?php
session_start();
include '../config/db.php';

if (isset($_POST['signup'])) {
    // รับข้อมูลจากฟอร์ม
    $firstname = $_POST['username'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $c_password = $_POST['confirm_password'];
    $usernumber = $_POST['user_number'];
    $urole = 'user';

    // ตรวจสอบฟิลด์
    if (empty($firstname) || empty($email) || empty($password) || empty($c_password) || empty($usernumber)) {
        $_SESSION['error'] = 'กรุณากรอกข้อมูลให้ครบทุกช่อง';
        header("location: register.php");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'รูปแบบอีเมลไม่ถูกต้อง';
        header("location: register.php");
        exit();
    } elseif (strlen($password) > 20 || strlen($password) < 5) {
        $_SESSION['error'] = 'รหัสผ่านต้องมีความยาวระหว่าง 5 ถึง 20 ตัวอักษร';
        header("location: register.php");
        exit();
    } elseif ($password != $c_password) {
        $_SESSION['error'] = 'รหัสผ่านไม่ตรงกัน';
        header("location: register.php");
        exit();
    } elseif (strlen($usernumber) != 10) {
        $_SESSION['error'] = 'เบอร์มือถือต้องมีความยาว 10 หลัก';
        header("location: register.php");
        exit();
    } else {
        try {
            if (!isset($conn)) {
                throw new PDOException('ไม่สามารถเชื่อมต่อกับฐานข้อมูลได้');
            }

            $check_email = $conn->prepare("SELECT COUNT(*) AS count FROM `registermember` WHERE user_email = :email");
            $check_email->bindParam(":email", $email);
            $check_email->execute();
            $row = $check_email->fetch(PDO::FETCH_ASSOC);

            if ($row['count'] > 0) {
                $_SESSION['error'] = "มีอีเมลนี้อยู่ในระบบแล้ว";
                header("location: register.php");
                exit();
            } else {
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO `registermember` (username, user_email, user_password, user_number, user_role, user_registime) 
                                        VALUES(:username, :user_email, :user_password, :user_number, :user_role, NOW())");
                $stmt->bindParam(":username", $firstname);
                $stmt->bindParam(":user_email", $email);
                $stmt->bindParam(":user_password", $passwordHash);
                $stmt->bindParam(":user_number", $usernumber);
                $stmt->bindParam(":user_role", $urole);

                $stmt->execute();

                $_SESSION['success'] = "สมัครสมาชิกเรียบร้อยแล้ว!";
                header("location: login.php");
                exit();
            }
        } catch (PDOException $e) {
            $_SESSION['error'] = "มีบางอย่างผิดพลาด: " . $e->getMessage();
            header("location: register.php");
            exit();
        }
    }
}
?>
