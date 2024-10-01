<?php
include '../config/db.php';

if (isset($_POST['submit'])) {
    $post_id = $_POST['id'];
    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("UPDATE posts SET title = :title, content = :content WHERE id = :id");
    $stmt->bindParam(':id', $post_id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':content', $content);

    if ($stmt->execute()) {
        // เมื่อทำการอัปเดตเสร็จ กลับไปที่หน้าจัดการกระทู้
        header("Location: ../admin.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการอัปเดตกระทู้";
    }
} else {
    header("Location: ../admin.php");
    exit();
}
?>
