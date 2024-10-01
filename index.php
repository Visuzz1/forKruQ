<?php 
session_start();
require_once "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happyoldman</title>
    <link rel="icon" href="img/logo.png">
    <link rel="stylesheet" href="css/styl.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    include('nav.php')
    ?>
<!-- image slide -->
<div class="slideshowContainer">
  
      <img class="imageSlides" src="img/oldman1.jpg" alt="beach side city view">
      <img class="imageSlides" src="img/oldman2.jpg" alt="leaf on the ground">
      <img class="imageSlides" src="img/oldman3.jpg" alt="lake surrounded by mountains">

      <span id ="leftArrow" class="slideshowArrow">&#8249;</span>
      <span id ="rightArrow" class="slideshowArrow">&#8250;</span>
      
      <div class="slideshowCircles">
        <span class="circle dot"></span>
        <span class="circle"></span>
        <span class="circle"></span>
      </div>
    </div>
<!-- menu -->
    <div class="menu">
        <div class="menu_con">
            <div class="menu_items"><a href="shop.php">
                <div class="menu_icon"> 
                    <img src="img/1.png" alt="">
                </div>
                <div class="menu_text">
                    <span>ร้านอาหารและเครื่องดื่ม</span>
                </div>
             </a>   
            </div>

            <div class="menu_items"><a href="post/post.php">
                <div class="menu_icon"> 
                    <img src="img/2.png" alt="">
                </div>
                <div class="menu_text">
                    <span>กระทู้พูดคุย</span>
                </div>
             </a>   
            </div>
        </div>
    </div>

<!-- card-body -->
    <!-- Recommed -->
    <div class="recommend" id="recommned">
        <div class="recommend_con">
            <h4>แนะนำสำหรับคุณ</h4>
            <div class="menu_recommed">
                <button onclick="Popular()" class="ropularBtn"><p>ยอดนิยม</p></button>
                <button onclick="viral()" class="viralBtn"><p>มาแรง</p></button>
            </div>
          <hr class="line">
        <div class="recommend_items_con">
            <?php 
                                $stmt = $conn->query("SELECT * FROM recommend");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                if (!$users) {
                                    echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                                } else {
                                    $num = 1;
                                    foreach($users as $user)  {  
                            ?>
                <a href="view/viewmore_recommend.php?id=<?php echo $user['id']; ?>">
                    <div class="recommend_times">
                    <div class="recommend_img">
                        <img src="uploads/<?php echo $user['cover_store']; ?>" alt="">
                    </div>
                    <div class="recommned_text">
                        <h3><?php echo $user['Name_store']; ?></h3>
                        <p>ที่ตั้งร้าน: <?php echo $user['adress_store']; ?></p>
                    </div>
                </div>
                </a>
                <?php } } ?>
            </div>
        </div>
    </div>

    <!-- viral -->
    <div class="viral" id="viral">
        <div class="viral_con">
            <h4>แนะนำสำหรับคุณ</h4>
            <div class="menu_viral">
                <button onclick="Popular()" class="ropularBtn"><p>ยอดนิยม</p></button>
                <button onclick="viral()" class="viralBtn"><p>มาแรง</p></button>
            </div>
          <hr class="line">
            <div class="viral_items_con">
            <?php 
                                $stmt = $conn->query("SELECT * FROM viral");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                if (!$users) {
                                    echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                                } else {
                                    $num = 1;
                                    foreach($users as $user)  {  
                            ?>
              <a href="view/viewmore_viral.php?id=<?php echo $user['id']; ?>">
             <div class="recommend_times">
                    <div class="recommend_img">
                        <img src="uploads/<?php echo $user['cover_store']; ?>" alt="">
                    </div>
                    <div class="recommned_text">
                        <h3><?php echo $user['Name_store']; ?></h3>
                        <p>ที่ตั้งร้าน: <?php echo $user['adress_store']; ?></p>
                    </div>
                </div>
             </a>
                <?php } } ?>

                </div>
                
            </div>
        </div>
    </div>
<!-- news -->
<div class="news" id="">
        <div class="news_con">
            <h4>ข้อมูลเพื่อสุขภาพ</h4>
            <div class="menu_news">
                <button onclick="" class="ropularBtn"><p>ข้อมูลที่เลือกมาอย่างดีสำหรับผู้ใช้ทุกท่าน</p></button>
            </div>
          <hr class="line">
            <div class="news_items_con">
            <?php 
                                $stmt = $conn->query("SELECT * FROM news");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                if (!$users) {
                                    echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                                } else {
                                    $num = 1;
                                    foreach($users as $user)  {  
                            ?>
                <a href="view/viewmore_news.php?id=<?php echo $user['id']; ?>">
                <div class="recommend_times">
                    <div class="recommend_img">
                        <img class="rounded" width="100%" src="uploads/<?php echo $user['img_news']; ?>" alt="">
                    </div>
                    <div class="recommned_text">
                        <h3><?php echo $user['head_news']; ?></h3>
                    </div>
                </div>
                </a>
                <?php } } ?>

                </div>
                
            </div>
        </div>
    </div>








    <?php 
    include('contactbtn.php')
    ?>


    <?php 
    include('footer.php')
    ?>
   
    <script src="visits/visits.js"></script>
    <script src="javascript/java.js"></script>
    <script src="javascript/card_body.js"></script>
</body>
</html>