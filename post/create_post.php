<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $author = $_SESSION['user_name']; // ใช้ชื่อผู้ใช้ที่ล็อกอินเข้ามาเป็นผู้สร้างกระทู้

    if (empty($title) || empty($content)) {
        $_SESSION['error'] = 'กรุณากรอกข้อมูลให้ครบถ้วน';
        header("location: create_post.php");
        exit();
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO posts (title, content, author) VALUES (:title, :content, :author)");
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':content', $content);
            $stmt->bindParam(':author', $author);
            $stmt->execute();

            $_SESSION['success'] = 'สร้างกระทู้เรียบร้อยแล้ว!';
            header("location: post.php");
            exit();
        } catch (PDOException $e) {
            echo "เกิดข้อผิดพลาด: " . $e->getMessage();
        }
    }
}
?>


