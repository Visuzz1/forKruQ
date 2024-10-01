<?php 
session_start();
require_once "config/db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Layout</title>
    <link rel="icon" href="img/logo.png">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,300;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Prompt", sans-serif;
            font-weight: 500;
            font-style: normal;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        a{
            color: black;
            text-decoration: none;
        }
        .container {
            display: flex;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .sidebar {
            width: 20%;
            background-color: #ffffff;
            padding: 20px;
            margin-right: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .main-content {
            width: 60%;
            background-color: #ffffff;
            padding: 20px;
            margin-right: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .side-content {
            width: 200px;
            background-color: #ffffff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .category-bar {
            display: flex;
            overflow-x: auto;
            margin-bottom: 20px;
        }
        .category-bar img {
            max-width: 100px;
            height: 100px;
            margin-right: 10px;
            border-radius: 8px;
        }
        .restaurant-card {
            display: block;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .drinks-card {
            display: block;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #ddd;
        }
        .drinks-card img {
            width: 100%;
            height:358px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .restaurant-card img {
            width: 100%;
            height:358px;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 10px;
            
        }
        .restaurant-rating {
            color: #ff3e3e;
            font-weight: bold;
            margin-top: 10px;
        }
        .button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }
        .advertisement {
            margin-bottom: 20px;
        }
        .advertisement img {
            width: 100%;
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <?php 
        include('nav.php')
        ?>
    <div class="container">
        <!-- Sidebar Filters -->
        <div class="sidebar">
            <h3>เลือก</h3>
            <form>
                <label>หมวดหมู่</label><br><br>
                <input type="checkbox" id="openfood" checked> อาหารเพื่อสุขภาพ<br>
                <input type="checkbox" id="opendrinks" checked> เครื่องดื่มเพือสุขภาพ<br><br>
            </form>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="category-bar">
                <img src="img/c1.jpg" alt="">
                <img src="img/c2.jpg" alt="">
                <img src="img/c3.jpg" alt="">
                <img src="img/c4.jpg" alt="">
                <img src="img/c5.jpg" alt="">
                <img src="img/c6.jpg" alt="">
                <img src="img/c7.jpg" alt="">
                <img src="img/c8.jpg" alt="">
            </div>

            <?php 
                                $stmt = $conn->query("SELECT * FROM food");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                if (!$users) {
                                    echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                                } else {
                                    $num = 1;
                                    foreach($users as $user)  {  
                            ?>
            <div class="restaurant-card" id="food">
            <img width="100%" height="100%" src="uploads/<?php echo $user['cover_store']; ?>" alt="">
                <h2><?php echo $user['Name_store']; ?></h2>
                <p>ที่ตั้งร้าน:<?php echo $user['adress_store']; ?></p>
                <a href="view/viewmore_food.php?id=<?php echo $user['id']; ?>"><button class="button">ดูเพิ่มเติม</button></a>
            </div>
                <?php } } ?>

                <?php 
                                $stmt = $conn->query("SELECT * FROM drinks");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                if (!$users) {
                                    echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                                } else {
                                    $num = 1;
                                    foreach($users as $user)  {  
                            ?>
            <div class="restaurant-card" id="drinks">
            <img width="100%" height="100%" src="uploads/<?php echo $user['cover_store']; ?>" alt="">
                <h2><?php echo $user['Name_store']; ?></h2>
                <p>ที่ตั้งร้าน:<?php echo $user['adress_store']; ?></p>
                <a href="view/viewmore_drinks.php?id=<?php echo $user['id']; ?>"><button class="button">ดูเพิ่มเติม</button></a>
            </div>
                <?php } } ?>
            
        </div>

        <!-- Side Content for Ads and Maps -->
        <div class="side-content">
            <h3>พื่นที่โฆษณา</h3>
            <img src="map.jpg" alt="Map">

            <div class="advertisement">
                <img src="ad1.jpg" alt="Ad">
            </div>

            <div class="advertisement">
                <img src="ad2.jpg" alt="Ad">
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
    <script src="javascript/scrpit.js"></script>
</body>
</html>
