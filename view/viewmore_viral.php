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
    <link rel="stylesheet" href="../css/food.css">
    <link rel="icon" href="../img/logo.png">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500&family=Roboto+Condensed:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <?php 
    include('nav.php')
    ?>
    <div class="container">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $stmt = $conn->prepare("SELECT * FROM viral WHERE id = :id");
            $stmt->execute(['id' => $id]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        ?>
        <header>
            <div class="img_one">
                <img width="100%" height="100%" src="../uploads/<?php echo htmlspecialchars($user['cover_store']); ?>" alt="">
            </div>
            <div class="img_two">
                <div class="img_two_items">
                <?php
                if (isset($user['assemblePic_store'])) {
                    // ลบเครื่องหมายคำพูดและเครื่องหมายปีกกาออกจากข้อมูล
                    $imageString = str_replace(['[', ']', '"'], '', $user['assemblePic_store']);
                    $images = explode(',', $imageString);

                    foreach ($images as $image) {
                        $imagePath = '../uploads/' . htmlspecialchars(trim($image));
                        // ตรวจสอบว่าไฟล์รูปภาพมีอยู่จริง
                        if (file_exists($imagePath)) {
                            echo '<img src="' . $imagePath . '" alt="Image">';
                        } else {
                            echo '<p>Image not found: ' . $imagePath . '</p>';
                        }
                    }
                } else {
                    echo '<p>No images available.</p>';
                }
                ?>
                </div>
            </div>
        </header>
        <div class="card_con">
            <div class="card_left">
                <h3><?php echo htmlspecialchars($user['Name_store']); ?></h3>
                <h5>ที่ตั้งร้าน</h5>
                <p><?php echo htmlspecialchars($user['adress_store']); ?></p>
                <div class="price">
                    <h5>ราคาประมาณ</h5>
                    <p>฿ <?php echo htmlspecialchars($user['price']); ?></p>
                </div>
                <div class="seats">
                    <h5>จำนวนที่นั่ง</h5>
                    <p><?php echo htmlspecialchars($user['number_of_seats']); ?></p>
                </div>
            </div>
            <div class="card_right">
                <div class="open_time">
                    <h5>เวลาเปิดร้าน</h5>
                    <p><?php echo htmlspecialchars($user['open_store']); ?> - <?php echo htmlspecialchars($user['close_store']); ?></p>
                </div>
                <div class="checkbox">
                    <ul>
                        <li><input type="checkbox" id="checkbox1" class="input_view"<?= $user['parking'] ? 'checked' : '' ?>><label for="checkbox1">ที่จอดรถ</label></li>
                        <li><input type="checkbox" id="checkbox2" class="input_view"<?= $user['wifi'] ? 'checked' : '' ?>><label for="checkbox2">wifi</label></li>
                        <li><input type="checkbox" id="checkbox3" class="input_view"<?= $user['allow_pet'] ? 'checked' : '' ?>><label for="checkbox3">สัตว์เลี้ยงเข้าได้</label></li>
                        <li><input type="checkbox" id="checkbox4" class="input_view"<?= $user['accept_credit_card'] ? 'checked' : '' ?>><label for="checkbox4">รับบัตรเครดิต</label></li>
                        <li><input type="checkbox" id="checkbox5" class="input_view"<?= $user['suitable_for_child'] ? 'checked' : '' ?>><label for="checkbox5">เหมาะสมกับเด็ก</label></li>
                        <li><input type="checkbox" id="checkbox6" class="input_view"<?= $user['suitable_for_group'] ? 'checked' : '' ?>><label for="checkbox6">เหมาะมาเป็นกลุ่ม</label></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card_bottom">
                <div class="card_bottom_item">
                    <a href="<?php echo htmlspecialchars($user['line']); ?>"><i class="fa-brands fa-line"></i> <span></span></a>
                    <a href="<?php echo htmlspecialchars($user['facebook']); ?>"><i class="fa-brands fa-facebook"></i> <span></span></a>
                    <a href="<?php echo htmlspecialchars($user['instragram']); ?>"><i class="fa-brands fa-instagram"></i> <span></span></a>
                    <a href="<?php echo htmlspecialchars($user['tiktok']); ?>"><i class="fa-brands fa-tiktok"></i> <span></span></a>
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
