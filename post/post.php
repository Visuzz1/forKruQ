<?php
include '../config/db.php';
// ตัวอย่างการตั้งค่า session เมื่อผู้ใช้ล็อกอินสำเร็จ
// สมมติว่าผู้ใช้ล็อกอินสำเร็จและมีข้อมูลชื่อผู้ใช้ในฐานข้อมูล
$stmt1['user_name'] = 'ชื่อผู้ใช้'; // กำหนดชื่อผู้ใช้ลงใน session
$_SESSION['user_id'] = 1; // กำหนด ID ผู้ใช้ลงใน session
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="../img/logo.png">
    <link rel="stylesheet" href="../css/gatoo.css">
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,300;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php 
    include('nav.php')
    ?>

    <h2>สร้างกระทู้ใหม่</h2>
    <form action="create_post.php" method="post">
        <label for="title">ชื่อกระทู้:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">เนื้อหากระทู้:</label>
        <textarea id="content" name="content" rows="10" cols="30" required></textarea>
        
        <button type="submit">สร้างกระทู้</button>
    </form>

    <?php
    $stmt = $conn->prepare("SELECT * FROM posts ORDER BY created_at DESC");
    $stmt->execute();
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="">
        <h2>รายการกระทู้ทั้งหมด</h2>
        <?php foreach ($posts as $post): ?>
            <div class="post">
                <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                <p>โดย: <?php echo htmlspecialchars($post['author']); ?> เมื่อ: <?php echo htmlspecialchars($post['created_at']); ?></p>
                <p><?php echo nl2br(htmlspecialchars($post['content'])); ?></p>
                <a href="view_post.php?id=<?php echo $post['id']; ?>" class="button">ดูเพิ่มเติม</a>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="../visits/visits2.js"></script>
    <script src="script.js"></script>
</body>
</html>
