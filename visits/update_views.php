<?php
// ตั้งค่าการเชื่อมต่อฐานข้อมูล
$host = 'localhost';
$db = 'happyoldman';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Connection failed: ' . $e->getMessage());
}

// ตรวจสอบว่ามีข้อมูลถูกส่งมาจาก AJAX หรือไม่
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['page'])) {
    $page = $_POST['page'];

    // ตรวจสอบว่ามีข้อมูลของหน้าเว็บนี้ในฐานข้อมูลหรือยัง
    $stmt = $pdo->prepare("SELECT views FROM page_views WHERE page_name = ?");
    $stmt->execute([$page]);
    $result = $stmt->fetch();

    if ($result) {
        // ถ้ามีอยู่แล้ว ให้เพิ่มจำนวนรับชม
        $stmt = $pdo->prepare("UPDATE page_views SET views = views + 1 WHERE page_name = ?");
        $stmt->execute([$page]);
    } else {
        // ถ้าไม่มี ให้เพิ่มหน้าพร้อมจำนวนรับชมเริ่มต้นที่ 1
        $stmt = $pdo->prepare("INSERT INTO page_views (page_name, views) VALUES (?, 1)");
        $stmt->execute([$page]);
    }
}
