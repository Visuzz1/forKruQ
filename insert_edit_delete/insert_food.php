<?php 

session_start();
require_once "../config/db.php";

if (isset($_POST['submit'])) {
    // เก็บข้อมูลจากฟอร์ม
    $Name_store = $_POST['Name_store'];
    $adress_store = $_POST['adress_store'];
    $open_store = $_POST['open_store'];
    $close_store = $_POST['close_store'];
    $number_of_seats = $_POST['number_of_seats'];
    $price = $_POST['price'];

    // โซเชียลมีเดีย
    $line = $_POST['line'];
    $facebook = $_POST['facebook'];
    $instragram = $_POST['instragram']; // แก้จาก 'instragram' เป็น 'instragram'
    $tiktok = $_POST['tiktok'];

    // Handle checkboxes
    $parking = isset($_POST['parking']) ? 1 : 0;
    $wifi = isset($_POST['wifi']) ? 1 : 0;
    $allow_pet = isset($_POST['allow_pet']) ? 1 : 0;
    $accept_credit_card = isset($_POST['accept_credit_card']) ? 1 : 0;
    $suitable_for_child = isset($_POST['suitable_for_child']) ? 1 : 0;
    $suitable_for_group = isset($_POST['suitable_for_group']) ? 1 : 0;

    $cover_store = $_FILES['cover_store'];
    $assemblePic_store = $_FILES['assemblePic_store'];

    $allow = array('jpg', 'jpeg', 'pdf', 'png');
    
    // Handle cover_store upload
    $coverExtension = explode('.', $cover_store['name']);
    $coverFileActExt = strtolower(end($coverExtension));
    $coverFileNew = rand() . "." . $coverFileActExt;  
    $coverFilePath = '../uploads/'.$coverFileNew;

    if (in_array($coverFileActExt, $allow)) {
        if ($cover_store['size'] > 0 && $cover_store['error'] == 0) {
            if (move_uploaded_file($cover_store['tmp_name'], $coverFilePath)) {
                
                // Handle multiple file uploads for assemblePic_store
                $assembleFiles = [];
                if (isset($assemblePic_store['name']) && is_array($assemblePic_store['name'])) {
                    foreach ($assemblePic_store['name'] as $key => $fileName) {
                        if ($assemblePic_store['error'][$key] == 0) {
                            $fileExtension = explode('.', $fileName);
                            $fileActExt = strtolower(end($fileExtension));
                            if (in_array($fileActExt, $allow)) {
                                $fileNew = rand() . "." . $fileActExt;  
                                $assembleFilePath = '../uploads/' . $fileNew;

                                if (move_uploaded_file($assemblePic_store['tmp_name'][$key], $assembleFilePath)) {
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
                } else {
                    echo "No files uploaded or incorrect form structure.<br>";
                }

                // Convert assembleFiles array to JSON for storage
                $assembleFilesJson = !empty($assembleFiles) ? json_encode($assembleFiles) : '[]'; // Set to '[]' if no files

                // Insert into database
                $sql = $conn->prepare("INSERT INTO food (
                    Name_store, 
                    adress_store, 
                    open_store, 
                    close_store, 
                    number_of_seats, 
                    price, 
                    parking, 
                    wifi, 
                    allow_pet, 
                    accept_credit_card, 
                    suitable_for_child, 
                    suitable_for_group, 
                    cover_store, 
                    assemblePic_store,
                    line,
                    facebook,
                    instragram,
                    tiktok) 
                VALUES (
                    :Name_store, 
                    :adress_store, 
                    :open_store, 
                    :close_store, 
                    :number_of_seats, 
                    :price, 
                    :parking, 
                    :wifi, 
                    :allow_pet, 
                    :accept_credit_card, 
                    :suitable_for_child, 
                    :suitable_for_group, 
                    :cover_store, 
                    :assemblePic_store,
                    :line,
                    :facebook,
                    :instragram,
                    :tiktok)");

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
                $sql->bindParam(":instragram", $instragram);
                $sql->bindParam(":tiktok", $tiktok);

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
                echo "Failed to upload cover store file.<br>";
            }
        } else {
            echo "Invalid cover store file.<br>";
        }
    } else {
        echo "ต้องการใส่ข้อมูล.<br>";
        header("refresh:1; url=../admin.php");
    }
}
?>
