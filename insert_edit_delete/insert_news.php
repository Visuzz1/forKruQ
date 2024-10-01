<?php 

session_start();
require_once "../config/db.php";

if (isset($_POST['submit'])) {
    $head_news = $_POST['head_news'];
    $where_news_from = $_POST['where_news_from'];
    $story_news = $_POST['story_news'];
    $img_news = $_FILES['img_news'];

    $allow = array('jpg', 'jpeg', 'png');

    // Handle img_news upload
    $imgExtension = explode('.', $img_news['name']);
    $imgFileActExt = strtolower(end($imgExtension));
    $imgFileNew = rand() . "." . $imgFileActExt;  
    $imgFilePath = '../uploads/'.$imgFileNew;

    if (in_array($imgFileActExt, $allow)) {
        if ($img_news['size'] > 0 && $img_news['error'] == 0) {
            if (move_uploaded_file($img_news['tmp_name'], $imgFilePath)) {
                
                // Insert into database
                $sql = $conn->prepare("INSERT INTO news (
                    head_news, 
                    where_news_from, 
                    story_news, 
                    img_news) 
                VALUES (
                    :head_news, 
                    :where_news_from, 
                    :story_news, 
                    :img_news)");

                // Bind parameters
                $sql->bindParam(":head_news", $head_news);
                $sql->bindParam(":where_news_from", $where_news_from);
                $sql->bindParam(":story_news", $story_news);
                $sql->bindParam(":img_news", $imgFileNew);

                try {
                    if ($sql->execute()) {
                        echo "<script>alert('เพิ่มข้อมูลสำเร็จ')</script>";
                        $_SESSION['success'] = "เพิ่มข้อมูลสำเร็จ";
                        header("refresh:1; url=../admin.php");
                    } else {
                        echo "Error inserting into database: " . $sql->errorInfo()[2] . "<br>";
                    }
                } catch (PDOException $e) {
                    echo "Database error: " . $e->getMessage() . "<br>";
                }
            } else {
                echo "Failed to upload news cover image.<br>";
            }
        } else {
            echo "Invalid news cover image file.<br>";
        }
    } else {
        echo "Invalid file type. Only JPG, JPEG, and PNG files are allowed.<br>";
        header("refresh:1; url=../admin.php");
    }
}
?>
