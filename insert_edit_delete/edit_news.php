<?php
session_start();
require_once "../config/db.php";

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // รับค่าจากฟอร์ม
        $head_news = $_POST['head_news'];
        $where_news_from = $_POST['where_news_from'];
        $story_news = $_POST['story_news'];

        // Handle img_news upload
        $imgFileNew = $_POST['current_img_news'] ?? ''; // Default to current image file
        if (isset($_FILES['img_news']) && $_FILES['img_news']['error'] == 0) {
            $img_news = $_FILES['img_news'];
            $imgExtension = explode('.', $img_news['name']);
            $imgFileActExt = strtolower(end($imgExtension));
            $imgFileNew = rand() . "." . $imgFileActExt;
            $imgFilePath = '../uploads/' . $imgFileNew;

            $allowed = array('jpg', 'jpeg', 'pdf', 'png');
            if (in_array($imgFileActExt, $allowed) && move_uploaded_file($img_news['tmp_name'], $imgFilePath)) {
                // Successfully uploaded new image file
            } else {
                echo "Invalid image file type or upload error.<br>";
            }
        }

        // Update the database
        $sql = $conn->prepare("UPDATE news SET 
            head_news = :head_news, 
            where_news_from = :where_news_from, 
            story_news = :story_news, 
            img_news = :img_news
            WHERE id = :id");

        // Bind parameters
        $sql->bindParam(":head_news", $head_news);
        $sql->bindParam(":where_news_from", $where_news_from);
        $sql->bindParam(":story_news", $story_news);
        $sql->bindParam(":img_news", $imgFileNew);
        $sql->bindParam(":id", $id, PDO::PARAM_INT);

        try {
            if ($sql->execute()) {
                echo "<script>alert('แก้ข้อมูลเสร็จแล้ว')</script>";
                $_SESSION['success'] = "แก้ข้อมูลเสร็จแล้ว";
                header("Location: ../admin.php");
                exit;
            } else {
                echo "Error updating record: " . $sql->errorInfo()[2] . "<br>";
            }
        } catch (PDOException $e) {
            echo "Database error: " . $e->getMessage() . "<br>";
        }
    } else {
        // Retrieve the current data
        $stmt = $conn->prepare("SELECT * FROM news WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if data is found
        if (!$result) {
            echo "No data found";
            exit;
        }

        // Prepopulate variables for the form
        $head_news = $result['head_news'];
        $where_news_from = $result['where_news_from'];
        $story_news = $result['story_news'];
        $img_news = $result['img_news'];
    }
} else {
    echo "No id provided";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container justify-content-center">
        <div class="card_content">
            <form class="row g-3" action="edit_news.php?id=<?= htmlspecialchars($id, ENT_QUOTES) ?>" method="post" enctype="multipart/form-data">
                <h3>แก้ไขเนื้อหาข่าว</h3>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="head_news" value="<?= htmlspecialchars($head_news, ENT_QUOTES) ?>">
                    <label for="floatingInput"><p>ตั้งชื่อหัวข่าว</p></label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="" name="where_news_from" value="<?= htmlspecialchars($where_news_from, ENT_QUOTES) ?>">
                    <label for="floatingInput"><p>ที่มาของข่าว</p></label>
                </div>

                <div class="form-floating col-12">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="story_news"><?= htmlspecialchars($story_news, ENT_QUOTES) ?></textarea>
                    <label for="floatingTextarea2"><p>เนื้อหาของข่าว</p></label>
                </div>

                <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">เลือกรูปปกของข่าว</label>
                    <input class="form-control" type="file" id="formFile" name="img_news">
                    <input type="hidden" name="current_img_news">
                    <?php if ($result['img_news']): ?>
                        <div class="img-container">
                            <img src="../uploads/<?= htmlspecialchars($result['img_news'], ENT_QUOTES) ?>" alt="Cover Image" class="cover_image">
                        </div>
                    <?php endif; ?> 
                </div>

                <div class="btnAction">
                    <a href="../admin.php" class="Btn_cancel_recommend">ยกเลิก</a>
                    <button class="Btn_submit_recommend" name="submit">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/noumanqamar450/alertbox@main/version/1.0.2/alertbox.min.js"></script>
</body>
</html>
