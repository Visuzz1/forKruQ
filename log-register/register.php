<?php 
session_start();
include '../config/db.php';
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/styles.css">
    <!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,300;1,300&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="signup-card p-4 shadow rounded">
        <?php if (isset($_SESSION['error'])): ?>
              <div class="alert alert-danger">
                  <?php 
                      echo $_SESSION['error']; 
                      unset($_SESSION['error']); // ลบข้อความหลังแสดงแล้ว
                  ?>
              </div>
          <?php endif; ?>

          <?php if (isset($_SESSION['success'])): ?>
              <div class="alert alert-success">
                  <?php 
                      echo $_SESSION['success']; 
                      unset($_SESSION['success']); // ลบข้อความหลังแสดงแล้ว
                  ?>
              </div>
          <?php endif; ?>
            <div class="text-center mb-4">
                <img src="../img/logo.png" alt="" width="150">
                <h3 class="mt-3">สมัครสมาชิก</h3>
            </div>
            
            <form id="signup-form" novalidate action="registerinsert.php" method="post">

              <div class="mb-3">
                    <label for="text" class="form-label">ชื่อ</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="ชื่อและนามสกุล" required>
                    <div class="invalid-feedback">
                        กรุณาใส่ชื่อของท่าน
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">อีเมล</label>
                    <input type="email" class="form-control" id="email" name="user_email" placeholder="name@example.com" required>
                    <div class="invalid-feedback">
                        กรุณาใส่อีเมลที่ถูกต้อง
                    </div>
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">รหัสผ่าน (ต้องมี 10 ตัวขึ้นไป)</label>
                    <input type="password" class="form-control" id="password" name="user_password" placeholder="********" required minlength="6">
                    <div class="invalid-feedback">
                        รหัสผ่านต้องมีอย่างน้อย 6 ตัวอักษร
                    </div>
                </div>

                <div class="mb-3">
                    <label for="confirm-password" class="form-label">ยืนยันรหัสผ่าน</label>
                    <input type="password" class="form-control" id="confirm-password" name="confirm_password" placeholder="********" required>
                    <div class="invalid-feedback">
                        รหัสผ่านไม่ตรงกัน
                    </div>
                </div>

                <div class="mb-3">
                    <label for="text" class="form-label">เบอร์โทร</label>
                    <input type="text" class="form-control" id="text" placeholder="กรุณาเขียนเบอร์มือถือ" name="user_number" required>
                    <div class="invalid-feedback">
                        ใส่เบอร์มือถือผิด
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="terms" required>
                    <label class="form-check-label" for="terms">
                        ฉันยอมรับ <a href="#" data-bs-toggle="modal" data-bs-target="#termsModal">ข้อกำหนดการให้บริการ</a> และ <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">นโยบายความเป็นส่วนตัว</a>
                    </label>
                    <div class="invalid-feedback">
                        คุณต้องยอมรับข้อกำหนดเพื่อดำเนินการต่อ
                    </div>
                </div>
                <button type="submit" name="signup" class="btn btn-primary w-100">สมัครสมาชิก</button>
            </form>

            <div class="text-center mt-3">
                มีบัญชีอยู่แล้ว? <a href="login.php">เข้าสู่ระบบ</a>
            </div>
        </div>
    </div>

    <!-- Terms Modal -->
    <div class="modal fade" id="termsModal" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="termsModalLabel">ข้อกำหนดการให้บริการ</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
          </div>
          <div class="modal-body">
            <!-- Terms of service content goes here -->
            <p>เนื้อหาของข้อกำหนดการให้บริการ...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Privacy Modal -->
    <div class="modal fade" id="privacyModal" tabindex="-1" aria-labelledby="privacyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="privacyModalLabel">นโยบายความเป็นส่วนตัว</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="ปิด"></button>
          </div>
          <div class="modal-body">
            <!-- Privacy policy content goes here -->
            <p>เนื้อหาของนโยบายความเป็นส่วนตัว...</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('signup-form');
            const password = document.getElementById('password');
            const confirmPassword = document.getElementById('confirm-password');

            password.addEventListener('input', function () {
                confirmPassword.setCustomValidity('');
            });

            confirmPassword.addEventListener('input', function () {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Passwords do not match');
                } else {
                    confirmPassword.setCustomValidity('');
                }
            });

            // ตรวจสอบฟอร์มก่อนส่ง
            form.addEventListener('submit', function (event) {
                if (password.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('Passwords do not match');
                    event.preventDefault(); // หยุดการส่งฟอร์ม
                } else {
                    confirmPassword.setCustomValidity('');
                }
            });
        });

    </script>
</body>
</html>
