<?php 
session_start();
require_once "config/db.php";
?>
<!-- ลบ -->
<?php
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deletestmt = $conn->query("DELETE FROM recommend WHERE id = $delete_id");
    $deletestmt->execute();
    if ($deletestmt) {
        echo "<script>alert('ลบข้อมูลสำเร็จ')</script>";
        $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
        header("refresh:1; url=admin.php");  
    }       

}
// viral
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deletestmt = $conn->query("DELETE FROM viral WHERE id = $delete_id");
    $deletestmt->execute();     

}
// news
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deletestmt = $conn->query("DELETE FROM news WHERE id = $delete_id");
    $deletestmt->execute();   

}
//food
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deletestmt = $conn->query("DELETE FROM food WHERE id = $delete_id");
    $deletestmt->execute();     

}
// drinks
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deletestmt = $conn->query("DELETE FROM drinks WHERE id = $delete_id");
    $deletestmt->execute();     

}
// drinks
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $deletestmt = $conn->query("DELETE FROM registermember WHERE id = $delete_id");
    $deletestmt->execute();     

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="img/logo.png">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- icon -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,300;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="card_header">
            <div class="header">
                <div class="header_top">
                    <h2>หน้าจัดการ</h2>
                </div>
                <div class="header_bottom">
                    <button class="recommend_adminBtn" onclick="recommend_admin()"><span>จัดการยอดนิยม</span></button>
                    <button class="viral_adminBtn" onclick="viral_admin()"><span>จัดการมาแรง</span></button>
                    <button class="" onclick="food_admin()"><span>จัดการหน้าอาหารเพื่อสุขภาพ</span></button>
                    <button class="" onclick="drinks_admin()"><span>จัดการเครื่องดื่มเพื่อสุขภาพ</span></button>
                    <button class="News_adminBtn" onclick="News_admin()"><span>จัดการข้อมูลประชาสัมพันธ์</span></button>
                    <button class="view_adminBtn" onclick="view_admin()"><span>ยอดการรับชมเว็ปไซต์</span></button>
                    <button class="Topic_adminBtn" onclick="Topic_admin()"><span>จัดการกระทู้</span></button>
                    <button class="Topic_adminBtn" onclick="member_admin()"><span>จัดการสมาชิก</span></button>
                </div>
            </div>
        </div>


        <!-- recommend -->
         <div class="card_recommend_con"id="card_recommend_header">
            <div class="card_recommend">
                <button onclick="managerrecommend()">จัดการเนื้อหา</button>
                <button onclick="insertrecommend()">เพิ่มเนื้อหา</button>
            </div>
         </div>

         <!-- manager recommend -->
         <div class="card_recommend_manager_con" id="card_recommend_manager">
            <div class="card_recommend_manager">
                <div class="card_recommend_manager_header">
                    <h3>จัดการยอดนิยม</h3>
                    <input type="text" placeholder="ค้นหา..." id="searchInput">
                </div>
                <!-- table -->
                <div class="table_section">
                    <table id="recommendTable">
                        <thead>
                            <tr>
                                <th>เลขไอดี</th>
                                <th>ภาพ</th>
                                <th>ชื่อร้าน</th>
                                <th>ที่ตั้งร้าน</th>
                                <th>ปุ่มคำสั่ง</th>
                            </tr>
                        </thead>
                       
                        <tbody>
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
                            <tr>
                                <td><?php echo $num; $num++; ?></td>
                                <td><img class="rounded" width="100%" src="uploads/<?php echo $user['cover_store']; ?>" alt=""></td>
                                <td><?php echo $user['Name_store']; ?></td>
                                <td><?php echo $user['adress_store']; ?></td>
                                <td>
                                    <a href="insert_edit_delete/edit_recommend.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a data-id="<?= $user['id']; ?>" href="?delete=<?= $user['id']; ?>"><button class="btndelete" onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="recommend_pagination">  
                    <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
                    <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
                    <div id="page-numbers" hidden></div>
                    <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
                </div>
            </div>
         </div>
        <!-- insert recommend -->
         <div class="card_recommend_content" id="card_recommend_content">
            <div class="card_recommend_content_information">
                <form class="row g-3" action="insert_edit_delete/insert_recommend.php" method="post" enctype="multipart/form-data">
                    <h3>เพิ่มเนื้อหา</h3>
                <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="Name_store" required>
                        <label for="floatingInput"><p>ชื่อร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="adress_store"required>
                        <label for="floatingInput"><p>ที่ตั้งร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="open_store"required>
                        <label for="floatingInput"><p>เวลาเปิดร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="close_store"required>
                        <label for="floatingInput"><p>เวลาปิดร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="number_of_seats"required>
                        <label for="floatingInput"><p>จำนวนที่นั่ง</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="price"required>
                        <label for="floatingInput"><p>ราคา</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="line"required>
                        <label for="floatingInput"><p>Line</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="facebook" required>
                        <label for="floatingInput"><p>facebook</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="instragram"required>
                        <label for="floatingInput"><p>intagram</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="tiktok"required>
                        <label for="floatingInput"><p>tiktok</p></label>
                    </div>

                    
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="parking">
                        <label class="form-check-label" for="">
                            <span class="text">ที่จอดรถ</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="wifi">
                        <label class="form-check-label" for="">
                            <span class="text">wifi</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="allow_pet">
                        <label class="form-check-label" for="">
                            <span class="text">สวัสว์เลี้ยงเข้าได้</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="accept_credit_card">
                        <label class="form-check-label" for="">
                            <span class="text">รับบัตรเครดิต</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_child">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะสมกับเด็ก</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_group">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะมาเป็นกลุ่ม</span>
                        </label>
                    </div>

                    <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">รูปหน้าปกของร้าน</label>
                    <input class="form-control" type="file" id="formFile" name="cover_store"require>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="formFileMultiple" class="form-label">รูปประกอบร้าน</label>
                        <input class="form-control" type="file" id="formFileMultiple"name="assemblePic_store[]" multiple require>
                      </div>
                      <div class="col-12 mb-3">
                        <button class="Btn_submit_recommend" name="submit">ตกลง</button>
                      </div>
                  </form>
            </div>
         </div>

<!-- viral -->
<div class="card_viral_con"id="card_viral_header">
    <div class="card_viral">
        <button onclick="managerviral()">จัดการเนื้อหา</button>
        <button onclick="insertviral()">เพิ่มเนื้อหา</button>
    </div>
 </div>

 <!-- manager viral -->
 <div class="card_viral_manager_con" id="card_viral_manager">
    <div class="card_viral_manager">
     <div class="card_recommend_manager_header">
                    <h3>จัดการมาแรง</h3>
                    <input type="text" placeholder="ค้นหา..." id="searchviral">
     </div>
     <!-- table -->
     <div class="table_section">
                    <table id="viralTable">
                        <thead>
                            <tr>
                                <th>เลขไอดี</th>
                                <th>ภาพ</th>
                                <th>ชื่อร้าน</th>
                                <th>ที่ตั้งร้าน</th>
                                <th>ปุ่มคำสั่ง</th>
                            </tr>
                        </thead>
                       
                        <tbody>
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
                            <tr>
                                <td><?php echo $num; $num++; ?></td>
                                <td><img class="rounded" width="100%" src="uploads/<?php echo $user['cover_store']; ?>" alt=""></td>
                                <td><?php echo $user['Name_store']; ?></td>
                                <td><?php echo $user['adress_store']; ?></td>
                                <td>
                                    <a href="insert_edit_delete/edit_viral.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a data-id="<?= $user['id']; ?>" href="?delete=<?= $user['id']; ?>"><button class="btndelete" onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="recommend_pagination">  
                    <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
                    <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
                    <div id="page-numbers" hidden></div>
                    <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
                </div>
        
    </div>
 </div>
<!-- insert viral -->
 <div class="card_viral_content" id="card_viral_content">
    <div class="card_viral_content_information">
    <form class="row g-3" action="insert_edit_delete/insert_viral.php" method="post" enctype="multipart/form-data">
                    <h3>เพิ่มเนื้อหา</h3>
                <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="Name_store"required>
                        <label for="floatingInput"><p>ชื่อร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="adress_store"required>
                        <label for="floatingInput"><p>ที่ตั้งร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="open_store"required>
                        <label for="floatingInput"><p>เวลาเปิดร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="close_store"required>
                        <label for="floatingInput"><p>เวลาปิดร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="number_of_seats"required>
                        <label for="floatingInput"><p>จำนวนที่นั่ง</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="price"required>
                        <label for="floatingInput"><p>ราคา</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="line"required>
                        <label for="floatingInput"><p>Line</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="facebook"required>
                        <label for="floatingInput"><p>facebook</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="instragram"required>
                        <label for="floatingInput"><p>intagram</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="tiktok"required>
                        <label for="floatingInput"><p>tiktok</p></label>
                    </div>

                    
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="parking">
                        <label class="form-check-label" for="">
                            <span class="text">ที่จอดรถ</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="wifi">
                        <label class="form-check-label" for="">
                            <span class="text">wifi</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="allow_pet">
                        <label class="form-check-label" for="">
                            <span class="text">สวัสว์เลี้ยงเข้าได้</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="accept_credit_card">
                        <label class="form-check-label" for="">
                            <span class="text">รับบัตรเครดิต</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_child">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะสมกับเด็ก</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_group">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะมาเป็นกลุ่ม</span>
                        </label>
                    </div>

                    <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">รูปหน้าปกของร้าน</label>
                    <input class="form-control" type="file" id="formFile" name="cover_store"required>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="formFileMultiple" class="form-label">รูปประกอบร้าน</label>
                        <input class="form-control" type="file" id="formFileMultiple"name="assemblePic_store[]" multiple required>
                      </div>
                      <div class="col-12 mb-3">
                        <button class="Btn_submit_viral" name="submit">ตกลง</button>
                      </div>
                  </form>
    </div>
 </div>

<!-- food -->
<div class="card_food_con"id="card_food_header">
    <div class="card_food">
        <button onclick="managerfood()">จัดการเนื้อหา</button>
        <button onclick="insertfood()">เพิ่มเนื้อหา</button>
    </div>
 </div>

 <!-- manager food -->
 <div class="card_food_manager_con" id="card_food_manager">
    <div class="card_food_manager">
     <div class="card_recommend_manager_header">
                    <h3>จัดการหน้าอาหารเพื่อสุขภาพ</h3>
                    <input type="text" placeholder="ค้นหา..." id="searchfood">
     </div>
     <!-- table -->
     <div class="table_section">
                    <table id="foodTable">
                        <thead>
                            <tr>
                                <th>เลขไอดี</th>
                                <th>ภาพ</th>
                                <th>ชื่อร้าน</th>
                                <th>ที่ตั้งร้าน</th>
                                <th>ปุ่มคำสั่ง</th>
                            </tr>
                        </thead>
                       
                        <tbody>
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
                            <tr>
                                <td><?php echo $num; $num++; ?></td>
                                <td><img class="rounded" width="100%" src="uploads/<?php echo $user['cover_store']; ?>" alt=""></td>
                                <td><?php echo $user['Name_store']; ?></td>
                                <td><?php echo $user['adress_store']; ?></td>
                                <td>
                                    <a href="insert_edit_delete/edit_food.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a data-id="<?= $user['id']; ?>" href="?delete=<?= $user['id']; ?>"><button class="btndelete" onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="recommend_pagination">  
                    <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
                    <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
                    <div id="page-numbers" hidden></div>
                    <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
                </div>
        
    </div>
 </div>
<!-- insert food -->
 <div class="card_food_content" id="card_food_content">
    <div class="card_food_content_information">
    <form class="row g-3" action="insert_edit_delete/insert_food.php" method="post" enctype="multipart/form-data">
                    <h3>เพิ่มเนื้อหา</h3>
                <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="Name_store"required>
                        <label for="floatingInput"><p>ชื่อร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="adress_store"required>
                        <label for="floatingInput"><p>ที่ตั้งร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="open_store"required>
                        <label for="floatingInput"><p>เวลาเปิดร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="close_store"required>
                        <label for="floatingInput"><p>เวลาปิดร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="number_of_seats"required>
                        <label for="floatingInput"><p>จำนวนที่นั่ง</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="price"required>
                        <label for="floatingInput"><p>ราคา</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="line"required>
                        <label for="floatingInput"><p>Line</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="facebook"required>
                        <label for="floatingInput"><p>facebook</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="instragram"required>
                        <label for="floatingInput"><p>intagram</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="tiktok"required>
                        <label for="floatingInput"><p>tiktok</p></label>
                    </div>

                    
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="parking">
                        <label class="form-check-label" for="">
                            <span class="text">ที่จอดรถ</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="wifi">
                        <label class="form-check-label" for="">
                            <span class="text">wifi</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="allow_pet">
                        <label class="form-check-label" for="">
                            <span class="text">สวัสว์เลี้ยงเข้าได้</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="accept_credit_card">
                        <label class="form-check-label" for="">
                            <span class="text">รับบัตรเครดิต</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_child">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะสมกับเด็ก</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_group">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะมาเป็นกลุ่ม</span>
                        </label>
                    </div>

                    <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">รูปหน้าปกของร้าน</label>
                    <input class="form-control" type="file" id="formFile" name="cover_store"require>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="formFileMultiple" class="form-label">รูปประกอบร้าน</label>
                        <input class="form-control" type="file" id="formFileMultiple"name="assemblePic_store[]" multiple required>
                      </div>
                      <div class="col-12 mb-3">
                        <button class="Btn_submit_food" name="submit">ตกลง</button>
                      </div>
                  </form>
    </div>
 </div>
<!-- drinks -->
<div class="card_drinks_con"id="card_drinks_header">
    <div class="card_drinks">
        <button onclick="managerdrinks()">จัดการเนื้อหา</button>
        <button onclick="insertdrinks()">เพิ่มเนื้อหา</button>
    </div>
 </div>

 <!-- manager drinks -->
 <div class="card_drinks_manager_con" id="card_drinks_manager">
    <div class="card_drinks_manager">
     <div class="card_recommend_manager_header">
                    <h3>จัดการเครื่องดื่มเพื่อสุขภาพ</h3>
                    <input type="text" placeholder="ค้นหา..." id="searchdrinks">
     </div>
     <!-- table -->
     <div class="table_section">
                    <table id="drinksTable">
                        <thead>
                            <tr>
                                <th>เลขไอดี</th>
                                <th>ภาพ</th>
                                <th>ชื่อร้าน</th>
                                <th>ที่ตั้งร้าน</th>
                                <th>ปุ่มคำสั่ง</th>
                            </tr>
                        </thead>
                       
                        <tbody>
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
                            <tr>
                                <td><?php echo $num; $num++; ?></td>
                                <td><img class="rounded" width="100%" src="uploads/<?php echo $user['cover_store']; ?>" alt=""></td>
                                <td><?php echo $user['Name_store']; ?></td>
                                <td><?php echo $user['adress_store']; ?></td>
                                <td>
                                    <a href="insert_edit_delete/edit_drinks.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a data-id="<?= $user['id']; ?>" href="?delete=<?= $user['id']; ?>"><button class="btndelete" onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="recommend_pagination">  
                    <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
                    <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
                    <div id="page-numbers" hidden></div>
                    <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
                </div>
        
    </div>
 </div>
<!-- insert drinks -->
 <div class="card_drinks_content" id="card_drinks_content">
    <div class="card_drinks_content_information">
    <form class="row g-3" action="insert_edit_delete/insert_drinks.php" method="post" enctype="multipart/form-data">
                    <h3>เพิ่มเนื้อหา</h3>
                <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="Name_store"required>
                        <label for="floatingInput"><p>ชื่อร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="adress_store"required>
                        <label for="floatingInput"><p>ที่ตั้งร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="open_store"required>
                        <label for="floatingInput"><p>เวลาเปิดร้าน</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="close_store"required>
                        <label for="floatingInput"><p>เวลาปิดร้าน</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="number_of_seats"required>
                        <label for="floatingInput"><p>จำนวนที่นั่ง</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="price"required>
                        <label for="floatingInput"><p>ราคา</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="line"required>
                        <label for="floatingInput"><p>Line</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="facebook"required>
                        <label for="floatingInput"><p>facebook</p></label>
                    </div>

                    <div class="form-floating col-md-6 mb-3 ">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="instragram"required>
                        <label for="floatingInput"><p>intagram</p></label>
                    </div>
                    <div class="form-floating col-md-6 mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"name="tiktok"required>
                        <label for="floatingInput"><p>tiktok</p></label>
                    </div>

                    
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="parking">
                        <label class="form-check-label" for="">
                            <span class="text">ที่จอดรถ</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="wifi">
                        <label class="form-check-label" for="">
                            <span class="text">wifi</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="allow_pet">
                        <label class="form-check-label" for="">
                            <span class="text">สวัสว์เลี้ยงเข้าได้</span>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="accept_credit_card">
                        <label class="form-check-label" for="">
                            <span class="text">รับบัตรเครดิต</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_child">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะสมกับเด็ก</span>
                        </label>
                    </div>
                    <div class="form-check col-md-4">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="suitable_for_group">
                        <label class="form-check-label" for="">
                            <span class="text">เหมาะมาเป็นกลุ่ม</span>
                        </label>
                    </div>

                    <div class="col-12 mb-3">
                    <label for="formFile" class="form-label">รูปหน้าปกของร้าน</label>
                    <input class="form-control" type="file" id="formFile" name="cover_store"required>
                      </div>
                      <div class="col-12 mb-3">
                        <label for="formFileMultiple" class="form-label">รูปประกอบร้าน</label>
                        <input class="form-control" type="file" id="formFileMultiple"name="assemblePic_store[]" multiple required>
                      </div>
                      <div class="col-12 mb-3">
                        <button class="Btn_submit_drinks" name="submit">ตกลง</button>
                      </div>
                  </form>
    </div>
 </div>

 <!-- news -->
 <div class="card_news_con"id="card_news_header">
    <div class="card_news">
        <button onclick="managernews()">จัดการเนื้อหา</button>
        <button onclick="insertnews()">เพิ่มเนื้อหา</button>
    </div>
 </div>
 <!-- manager news -->
 <div class="card_news_manager_con" id="card_news_manager">
    <div class="card_news_manager">
        <div class="card_recommend_manager_header">
                    <h3>จัดการข้อมูล</h3>
                    <input type="text" placeholder="ค้นหา..." id="searchnews">
        </div>
     <!-- table -->
     <div class="table_section">
                    <table id="newsTable">
                        <thead>
                            <tr>
                                <th>เลขไอดี</th>
                                <th>ภาพ</th>
                                <th>หัวข้อ</th>
                                <th>ที่มา</th>
                                <th>ปุ่มคำสั่ง</th>
                            </tr>
                        </thead>
                       
                        <tbody>
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
                            <tr>
                                <td><?php echo $num; $num++; ?></td>
                                <td><img class="rounded" width="100%" src="uploads/<?php echo $user['img_news']; ?>" alt=""></td>
                                <td><?php echo $user['head_news']; ?></td>
                                <td><?php echo $user['where_news_from']; ?></td>
                                <td>
                                    <a href="insert_edit_delete/edit_news.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                                    <a data-id="<?= $user['id']; ?>" href="?delete=<?= $user['id']; ?>"><button class="btndelete" onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><i class="fa-solid fa-trash"></i></button></a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
                
                <div class="recommend_pagination">  
                    <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
                    <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
                    <div id="page-numbers" hidden></div>
                    <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
                    <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
                </div>
    </div>
 </div>

<!-- insert news -->
 <div class="card_news_content" id="card_news_content">
    <div class="card_news_content_information">
        <form class="row g-3"action="insert_edit_delete/insert_news.php" method="post" enctype="multipart/form-data">
        <h3>เพิ่มเนื้อหา</h3>
        <div class="form-floating col-md-6 mb-3 ">
                <input type="text" class="form-control" id="floatingInput" placeholder="" name="head_news"required>
                <label for="floatingInput"><p>ตั้งชื่อหัว</p></label>
            </div>
            <div class="form-floating col-md-6 mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="" name="where_news_from"required>
                <label for="floatingInput"><p>ที่มาของข้อมูล</p></label>
            </div>
            <div class="form-floating col-12">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" name="story_news"required></textarea>
                <label for="floatingTextarea2"><p>เนื้อหา</p></label>
            </div>
            <div class="col-12 mb-3">
                <label for="formFile" class="form-label">เลือกรูปปก</label>
                <input class="form-control" type="file" id=""for=""name="img_news"required>
              </div>
            <div class="col-12 mb-3">
                <button class="Btn_submit_viral" name="submit">ตกลง</button>
            </div>
          </form>
    </div>
 </div>


<!-- topic -->
 <!-- manager topic -->
 <div class="card_topic_manager_con" id="card_topic_manager">
    <div class="card_topic_manager">
        <div class="card_recommend_manager_header">
            <h3>จัดการหน้ากระทู้</h3>
            <input type="text" placeholder="ค้นหา..." id="searchtopic">
        </div>

        <!-- table -->
        <div class="table_section">
            <table id="topicTable">
                <thead>
                    <tr>
                        <th>เลขไอดี</th>
                        <th>หัวเรื่อง</th>
                        <th>เนื้อหา</th>
                        <th>ปุ่มคำสั่ง</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stmt = $conn->query("SELECT * FROM posts");
                        $stmt->execute();
                        $users = $stmt->fetchAll();
                        if (!$users) {
                            echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                        } else {
                            $num = 1;
                            foreach($users as $user)  {  
                    ?>
                    <tr>
                        <td><?php echo $num; $num++; ?></td>
                        <td><?php echo $user['title']; ?></td>
                        <td><?php echo $user['content']; ?></td>
                        <td>
                            <a href="post/edit_post.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a href="post/delete_post.php?id=<?php echo $user['id']; ?>"onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><button class="btndelete"><i class="fa-solid fa-trash"></i></i></button></a>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>

        <div class="recommend_pagination">  
            <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
            <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
            <div id="page-numbers" hidden></div>
            <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
            <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
        </div>
    </div>
</div>

<!-- member -->
 <!-- manager member -->
 <div class="card_member_manager_con" id="card_member_manager">
    <div class="card_member_manager">
        <div class="card_recommend_manager_header">
            <h3>จัดการหน้าสมาชิก</h3>
            <input type="text" placeholder="ค้นหา..." id="searchmember">
        </div>

        <!-- table -->
        <div class="table_section">
            <table id="memberTable">
                <thead>
                    <tr>
                        <th width="10%">เลขไอดี</th>
                        <th width="">ฃื่อสมาฃิก</th>
                        <th>เบอร์</th>
                        <th width="30%">อีเมล</th>
                        <th>ตำแหน่ง</th>
                        <th>ปุ่มคำสั่ง</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stmt = $conn->query("SELECT * FROM registermember");
                        $stmt->execute();
                        $users = $stmt->fetchAll();
                        if (!$users) {
                            echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                        } else {
                            $num = 1;
                            foreach($users as $user)  {  
                    ?>
                    <tr>
                        <td><?php echo $num; $num++; ?></td>
                        <td><?php echo $user['username']; ?></td>
                        <td><?php echo $user['user_number']; ?></td>
                        <td><?php echo $user['user_email']; ?></td>
                        <td><?php echo $user['user_role']; ?></td>
                        <td>
                            <a href="insert_edit_delete/edit_member.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <a data-id="<?= $user['id']; ?>" href="?delete=<?= $user['id']; ?>"><button class="btndelete" onclick="return confirm('คุณแน่ใจหรือต้องการลบข้อมูลนี้');"><i class="fa-solid fa-trash"></i></button></a>
                        </td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>

        <div class="recommend_pagination">  
            <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
            <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
            <div id="page-numbers" hidden></div>
            <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
            <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
        </div>
    </div>
</div>

<!-- view -->
<!-- manager view -->
<div class="card_view_manager_con" id="card_view_manager">
    <div class="card_view_manager">
        <div class="card_recommend_manager_header">
            <h3>ยอดการรับชมเว็ปไซต์</h3>
            <input type="text" placeholder="ค้นหา..." id="searchview">
        </div>

        <!-- table -->
        <div class="table_section">
            <table id="viewTable">
                <thead>
                    <tr>
                        <th>เลขไอดี</th>
                        <th>หน้า</th>
                        <th>จำนวนการเข้าชม</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $stmt = $conn->query("SELECT * FROM page_views");
                        $stmt->execute();
                        $users = $stmt->fetchAll();
                        if (!$users) {
                            echo "<tr><td colspan='5' class='text-center'>No data available</td></tr>";
                        } else {
                            $num = 1;
                            foreach($users as $user)  {  
                    ?>
                    <tr>
                        <td><?php echo $num; $num++; ?></td>
                        <td><?php echo $user['page_name']; ?></td>
                        <td><?php echo $user['views']; ?></td>
                    </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>

        <div class="recommend_pagination">  
            <div class="page-button" id="first-page"><i class="fa-solid fa-angles-left"></i></div>
            <div class="page-button" id="prev-page"><i class="fa-solid fa-angle-left"></i></div>
            <div id="page-numbers" hidden></div>
            <div class="page-button" id="next-page"><i class="fa-solid fa-angle-right"></i></div>
            <div class="page-button" id="last-page"><i class="fa-solid fa-angles-right"></i></div>
        </div>
    </div>
</div>
      
    
    <script src="visits/visits.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
      <script src="javascript/java.js"></script>
      <script src="javascript/admin.js"></script>
      <script src="javascript/search.js"></script>
      <script src="javascript/Pagination.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://cdn.jsdelivr.net/gh/noumanqamar450/alertbox@main/version/1.0.2/alertbox.min.js"></script>
      <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(e) {
                e.preventDefault();

                let formUrl = $(this).attr("action");
                let reqMethod = $(this).attr("method");
                let formData = $(this).serialize();

                $.ajax({
                    url: formUrl,
                    type: reqMethod,
                    data: formData,
                    success: function(data) {
                        let result = JSON.parse(data);
                        if (result.status == "success") {
                            console.log("Success", result)
                            Swal.fire("สำเร็จ!", result.msg, result.status).then(function() {
                                window.location.href = "dashboard.php";
                            });
                        } else {
                            console.log("Error", result)
                            Swal.fire("ล้มเหลว!", result.msg, result.status);
                        }
                    }
                })
            })
        })
    </script>
   <script>
    // Select all file input elements with the multiple attribute
    const fileInputs = document.querySelectorAll('input[type="file"][multiple]');
    
    // Add the event listener to each file input
    fileInputs.forEach(function(input) {
        input.addEventListener('change', function(event) {
            if (this.files.length > 4) {
                alert('คุณสามารถเลือกไฟล์ได้สูงสุด 4 ไฟล์');
                this.value = ''; // Clear the selection
            }
        });
    });
</script>
</body>
</html>