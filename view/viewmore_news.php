<?php
session_start();
require_once "../config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/news.css">
    <link rel="icon" href="../img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body background="#edf0f2">
    <?php 
    include('nav.php')
    ?>
    <div class="container">
    <?php
                    if (isset($_GET['id'])) {
                            $id = $_GET['id'];  
                            $stmt = $conn->query("SELECT * FROM news WHERE id = $id");
                            $stmt->execute();
                            $user = $stmt->fetch();    
                    }
                ?>

        <div class="content_items">
            <div class="header">
                <h1><?php echo $user['head_news']; ?></h1>
            </div>
            <div class="img_news">
            <img width="100%" height="100%" src="../uploads/<?php echo $user['img_news']; ?>" alt="">
            </div>
            <div class="content">
                <div class="time">
                    <?php echo $user['time']; ?>
                </div>
                <div class="story">
                    <p class="story_head">
                    <?php echo $user['head_news']; ?>
                    </p>
                    <br>
                    <article>
                    <?php echo $user['story_news']; ?>
                    </article>
                </div>
            </div>
        </div>
    </div>

    <?php 
    include('footer.php')
    ?>
    <?php 
    include('contactbtn.php')
    ?>
    <script src="../visits/visits2.js"></script>
</body>
</html>