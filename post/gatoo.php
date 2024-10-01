<?php
include '../config/db.php';

$stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
$stmt->execute();
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="css/gatoo.css">
</head>
<body>
    <h2>รายการกระทู้ทั้งหมด</h2>
    <?php foreach ($posts as $post): ?>
        <div class="post">
            <h3><?php echo htmlspecialchars($post['title']); ?></h3>
            <p>โดย: <?php echo htmlspecialchars($post['author']); ?> เมื่อ: <?php echo htmlspecialchars($post['created_at']); ?></p>
            <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
            <a href="view_post.php?id=<?php echo $post['id']; ?>">ดูเพิ่มเติม</a>
        </div>
        <hr>
    <?php endforeach; ?>
</body>
</html>
