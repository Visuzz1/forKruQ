<?php
session_start();
require_once "../config/db.php";

// Check if an ID is passed and get the member data
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Handle form submission to update member information
        $username = $_POST['username'];
        $user_number = $_POST['user_number'];
        $user_email = $_POST['user_email'];
        $user_role = $_POST['user_role'];

        // Update the member in the database
        $sql = $conn->prepare("UPDATE registermember SET 
            username = :username, 
            user_number = :user_number, 
            user_email = :user_email, 
            user_role = :user_role
            WHERE id = :id");

        $sql->bindParam(':username', $username);
        $sql->bindParam(':user_number', $user_number);
        $sql->bindParam(':user_email', $user_email);
        $sql->bindParam(':user_role', $user_role);

        $sql->bindParam(':id', $id, PDO::PARAM_INT);

        if ($sql->execute()) {
            echo "<script>alert('อัปเดตข้อมูลเรียบร้อยแล้ว');</script>";
            header("Location: ../admin.php");
            exit;
        } else {
            echo "Error updating member: " . $sql->errorInfo()[2];
        }
    } else {
        // Fetch current member data
        $stmt = $conn->prepare("SELECT * FROM registermember WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $member = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$member) {
            echo "No member found!";
            exit;
        }
    }
} else {
    echo "No ID provided!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../css/edit.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
</head>
<body>
<div class="container justify-content-center">
        <div class="card_content">
            <form action="edit_member.php?id=<?= htmlspecialchars($id, ENT_QUOTES) ?>" method="POST" class="row g-3 ">
            <h3>แก้ไขเนื้อหาหน้าสมาชิก</h3>  
                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ชื่อร้าน" name="username" value="<?= htmlspecialchars($member['username'], ENT_QUOTES) ?>">
                    <label for="floatingInput">ฃื่อสมาฃิก</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="เวลาเปิดร้าน" name="user_email" value="<?= htmlspecialchars($member['user_email'], ENT_QUOTES) ?>">
                    <label for="floatingInput">อีเมล</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="เวลาปิดร้าน" name="user_number" value="<?= htmlspecialchars($member['user_number'], ENT_QUOTES) ?>">
                    <label for="floatingInput">เบอร์โทร</label>
                </div>

                <div class="form-floating col-md-6 mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="ราคา" name="user_role" value="<?= htmlspecialchars($member['user_role'], ENT_QUOTES) ?>">
                    <label for="floatingInput">ตำแหน่ง (เขียนได้แค่ user/admin)</label>
                </div>


                <div class="btnAction">
                        <a href="../admin.php"class="Btn_cancel_drinks">ยกเลิก</a>
                        <button class="Btn_submit_drinks" name="submit">ตกลง</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
