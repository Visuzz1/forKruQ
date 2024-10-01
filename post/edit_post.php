<?php
include '../config/db.php';

if (isset($_GET['id'])) {
    $post_id = $_GET['id'];

    // Query เพื่อดึงข้อมูลกระทู้
    $stmt = $conn->prepare("SELECT * FROM posts WHERE id = :id");
    $stmt->bindParam(':id', $post_id);
    $stmt->execute();
    $post = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($post) {
        // แสดงฟอร์มแก้ไขกระทู้
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Post</title>
            <link rel="stylesheet" href="css/styles.css">
            <link rel="stylesheet" href="css/gatooeditpost.css">
        </head>
        <body>
            <div class="container">
                <h2>แก้ไขกระทู้</h2>
                <form action="update_post.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $post_id; ?>">
                    <label for="title">หัวข้อกระทู้</label>
                    <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($post['title']); ?>" required>

                    <label for="content">เนื้อหากระทู้</label>
                    <textarea id="content" name="content" rows="5" required><?php echo htmlspecialchars($post['content']); ?></textarea>


                    <button type="submit" name="submit">บันทึกการแก้ไข</button>
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "ไม่พบกระทู้";
    }
} else {
    header("Location: ../admin.php");
    exit();
}
?>
