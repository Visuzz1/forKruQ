<?php
include '../config/db.php';

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$post = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$post) {
    echo "ไม่พบกระทู้ที่ต้องการ";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($post['title']); ?></title>
</head>
<body>
    <h2><?php echo htmlspecialchars($post['title']); ?></h2>
    <p>โดย: <?php echo htmlspecialchars($post['author']); ?> เมื่อ: <?php echo htmlspecialchars($post['created_at']); ?></p>
    <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
    <a href="post.php">กลับไปหน้ารายการกระทู้</a>
</body>
</html>
