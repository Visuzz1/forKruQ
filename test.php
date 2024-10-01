<!-- manager view -->
  
<div class="card_view_manager_con" id="card_view_manager">
    <div class="card_view_manager">
        <div class="card_recommend_manager_header">
            <h3>จัดการหน้าสมาชิก</h3>
            <input type="text" placeholder="ค้นหา..." id="searchview">
        </div>

        <!-- table -->
        <div class="table_section">
            <table id="viewTable">
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
                        $stmt = $conn->query("SELECT * FROM registerview");
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
                            <a href="insert_edit_delete/edit_view.php?id=<?php echo $user['id']; ?>"><button class="btnedit"><i class="fa-solid fa-pen-to-square"></i></button></a>
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