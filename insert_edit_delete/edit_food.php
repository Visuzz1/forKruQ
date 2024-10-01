<?php
session_start();
require_once "../config/db.php";

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // รับค่าจากฟอร์ม
        $Name_store = $_POST['Name_store'];
        $adress_store = $_POST['adress_store'];
        $open_store = $_POST['open_store'];
        $close_store = $_POST['close_store'];
        $number_of_seats = $_POST['number_of_seats'];
        $price = $_POST['price'];

        // New fields
        $line = $_POST['line'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instragram']; // Corrected spelling
        $tiktok = $_POST['tiktok'];

        // Handle checkboxes
        $parking = isset($_POST['parking']) ? 1 : 0;
        $wifi = isset($_POST['wifi']) ? 1 : 0;
        $allow_pet = isset($_POST['allow_pet']) ? 1 : 0;
        $accept_credit_card = isset($_POST['accept_credit_card']) ? 1 : 0;
        $suitable_for_child = isset($_POST['suitable_for_child']) ? 1 : 0;
        $suitable_for_group = isset($_POST['suitable_for_group']) ? 1 : 0;

        // Handle cover_store upload
        $coverFileNew = $_POST['current_cover_store']; // Default to current cover file
        if (isset($_FILES['cover_store']) && $_FILES['cover_store']['error'] == 0) {
            $cover_store = $_FILES['cover_store'];
            $coverExtension = explode('.', $cover_store['name']);
            $coverFileActExt = strtolower(end($coverExtension));
            $coverFileNew = rand() . "." . $coverFileActExt;
            $coverFilePath = '../uploads/' . $coverFileNew;

            $allow = array('jpg', 'jpeg', 'pdf', 'png');
            if (in_array($coverFileActExt, $allow) && move_uploaded_file($cover_store['tmp_name'], $coverFilePath)) {
                // Successfully uploaded new cover store file
            } else {
                echo "Invalid cover file type or upload error.<br>";
            }
        }

        // Handle multiple file uploads for assemblePic_store
        $assembleFiles = !empty($_POST['current_assemblePic_store']) ? json_decode($_POST['current_assemblePic_store'], true) : [];
        if (isset($_FILES['assemblePic_store']) && is_array($_FILES['assemblePic_store']['name'])) {
            foreach ($_FILES['assemblePic_store']['name'] as $key => $fileName) {
                if ($_FILES['assemblePic_store']['error'][$key] == 0) {
                    $fileExtension = explode('.', $fileName);
                    $fileActExt = strtolower(end($fileExtension));
                    $allow = array('jpg', 'jpeg', 'pdf', 'png');
                    if (in_array($fileActExt, $allow)) {
                        $fileNew = rand() . "." . $fileActExt;
                        $assembleFilePath = '../uploads/' . $fileNew;

                        if (move_uploaded_file($_FILES['assemblePic_store']['tmp_name'][$key], $assembleFilePath)) {
                            $assembleFiles[] = $fileNew;
                        } else {
                            echo "Failed to move file: " . $fileName . "<br>";
                        }
                    } else {
                        echo "Invalid file type for file: " . $fileName . "<br>";
                    }
                } else {
                    echo "Error uploading file: " . $fileName . "<br>";
                }
            }
        }

        // Convert assembleFiles array to JSON for storage
        $assembleFilesJson = !empty($assembleFiles) ? json_encode($assembleFiles) : '[]';

        // Update the database
        $sql = $conn->prepare("UPDATE food SET 
            Name_store = :Name_store, 
            adress_store = :adress_store, 
            open_store = :open_store, 
            close_store = :close_store, 
            number_of_seats = :number_of_seats, 
            price = :price, 
            parking = :parking, 
            wifi = :wifi, 
            allow_pet = :allow_pet, 
            accept_credit_card = :accept_credit_card, 
            suitable_for_child = :suitable_for_child, 
            suitable_for_group = :suitable_for_group, 
            cover_store = :cover_store, 
            assemblePic_store = :assemblePic_store,
            line = :line, 
            facebook = :facebook, 
            instragram = :instragram, 
            tiktok = :tiktok
            WHERE id = :id");

        // Bind parameters
        $sql->bindParam(":Name_store", $Name_store);
        $sql->bindParam(":adress_store", $adress_store);
        $sql->bindParam(":open_store", $open_store);
        $sql->bindParam(":close_store", $close_store);
        $sql->bindParam(":number_of_seats", $number_of_seats);
        $sql->bindParam(":price", $price);
        $sql->bindParam(":parking", $parking);
        $sql->bindParam(":wifi", $wifi);
        $sql->bindParam(":allow_pet", $allow_pet);
        $sql->bindParam(":accept_credit_card", $accept_credit_card);
        $sql->bindParam(":suitable_for_child", $suitable_for_child);
        $sql->bindParam(":suitable_for_group", $suitable_for_group);
        $sql->bindParam(":cover_store", $coverFileNew);
        $sql->bindParam(":assemblePic_store", $assembleFilesJson);
        $sql->bindParam(":line", $line);
        $sql->bindParam(":facebook", $facebook);
        $sql->bindParam(":instragram", $instagram); // Corrected spelling
        $sql->bindParam(":tiktok", $tiktok);
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
        $stmt = $conn->prepare("SELECT * FROM food WHERE id = :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if data is found
        if (!$result) {
            echo "No data found";
            exit;
        }
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
    <title>Edit foodation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container justify-content-center">
        <div class="card_content">
            <form class="row g-3" action="edit_food.php?id=<?= htmlspecialchars($id, ENT_QUOTES) ?>" method="post" enctype="multipart/form-data">
                <h3>แก้ไขเนื้อหาหน้าสมาชิก</h3>
                <input type="hidden" name="id" value="<?= htmlspecialchars($result['id'], ENT_QUOTES) ?>">
                <input type="hidden" name="current_cover_store" value="<?= htmlspecialchars($result['cover_store'], ENT_QUOTES) ?>">
                <input type="hidden" name="current_assemblePic_store" value='<?= htmlspecialchars($result['assemblePic_store'], ENT_QUOTES) ?>'>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ชื่อร้าน" name="Name_store" value="<?= htmlspecialchars($result['Name_store'], ENT_QUOTES) ?>">
                    <label for="floatingInput">ชื่อร้าน</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ที่ตั้งร้าน" name="adress_store" value="<?= htmlspecialchars($result['adress_store'], ENT_QUOTES) ?>">
                    <label for="floatingInput">ที่ตั้งร้าน</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="เวลาเปิดร้าน" name="open_store" value="<?= htmlspecialchars($result['open_store'], ENT_QUOTES) ?>">
                    <label for="floatingInput">เวลาเปิดร้าน</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="เวลาปิดร้าน" name="close_store" value="<?= htmlspecialchars($result['close_store'], ENT_QUOTES) ?>">
                    <label for="floatingInput">เวลาปิดร้าน</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="จำนวนที่นั่ง" name="number_of_seats" value="<?= htmlspecialchars($result['number_of_seats'], ENT_QUOTES) ?>">
                    <label for="floatingInput">จำนวนที่นั่ง</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ราคา" name="price" value="<?= htmlspecialchars($result['price'], ENT_QUOTES) ?>">
                    <label for="floatingInput">ราคา</label>
                </div>

                <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="line"value="<?= htmlspecialchars($result['line'], ENT_QUOTES) ?>">
                        <label for="floatingInput"><p>Line</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="facebook"value="<?= htmlspecialchars($result['facebook'], ENT_QUOTES) ?>">
                        <label for="floatingInput"><p>facebook</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="instragram"value="<?= htmlspecialchars($result['instragram'], ENT_QUOTES) ?>">
                        <label for="floatingInput"><p>intagram</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="tiktok"value="<?= htmlspecialchars($result['tiktok'], ENT_QUOTES) ?>">
                        <label for="floatingInput"><p>tiktok</p></label>
                    </div>

                

                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="parking" name="parking" <?= $result['parking'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="parking">ที่จอดรถ</label>
                </div>

                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="wifi" name="wifi" <?= $result['wifi'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="wifi">wifi</label>
                </div>

                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="allow_pet" name="allow_pet" <?= $result['allow_pet'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="allow_pet">สัตว์เลี้ยงเข้าได้</label>
                </div>

                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="accept_credit_card" name="accept_credit_card" <?= $result['accept_credit_card'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="accept_credit_card">รับบัตรเครดิต</label>
                </div>

                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="suitable_for_child" name="suitable_for_child" <?= $result['suitable_for_child'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="suitable_for_child">เหมาะสมกับเด็ก</label>
                </div>

                <div class="form-check col-md-4">
                    <input class="form-check-input" type="checkbox" id="suitable_for_group" name="suitable_for_group" <?= $result['suitable_for_group'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="suitable_for_group">เหมาะมาเป็นกลุ่ม</label>
                </div>

                <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">รูปหน้าปกของร้าน</label>
                    <input class="form-control" type="file" id="formFile" name="cover_store">
                    <?php if ($result['cover_store']): ?>
                        <div class="img-container">
                            <img src="../uploads/<?= htmlspecialchars($result['cover_store'], ENT_QUOTES) ?>" alt="Cover Image" class="cover_image">
                        </div>
                    <?php endif; ?> 
                </div>

                <div class="col-12 mb-3">
                    <label for="formFileMultiple" class="form-label">รูปประกอบร้าน</label>
                    <input class="form-control" type="file" id="formFileMultiple" name="assemblePic_store[]" multiple>
                    <div class="img_container_assemblePic">
                        <?php
                        $assembledPics = json_decode($result['assemblePic_store'], true);
                        if ($assembledPics) {
                            foreach ($assembledPics as $pic) {
                                echo "<img src='../uploads/" . htmlspecialchars($pic, ENT_QUOTES) . "' alt='assembled image' style='max-width: 100px; margin-right: 10px;'>";
                            }
                        }
                        ?>
                 </div>
                </div>

                <div class="btnAction">
                        <a href="../admin.php"class="Btn_cancel_food">ยกเลิก</a>
                        <button class="Btn_submit_food" name="submit">ตกลง</button>
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
