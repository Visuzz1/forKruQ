<?php
session_start();
session_destroy(); // ทำลาย session ทั้งหมด
header("Location: ../index.php"); // หลังจากออกจากระบบแล้ว, กลับไปที่หน้า login
exit();
?>
