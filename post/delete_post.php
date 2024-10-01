<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // ลบกระทู้
    $stmt = $conn->prepare("DELETE FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $post_id);

    if ($stmt->execute()) {
        // เมื่อทำการลบกระทู้เสร็จ กลับไปหน้าจัดการกระทู้
        header("Location: ../admin.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบกระทู้";
    }
} else {
    // หากไม่มี ID ที่ส่งมา กลับไปที่หน้าจัดการกระทู้
    header("Location: ../admin.php");
    exit();
}
?>
