
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/form.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
     <!-- font -->
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto+Condensed:ital,wght@0,500;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <style>
        body{
            background-color: #edf0f2;
            height: 250vh;
        }
        label{
            font-size: 20px;
        }
    </style>
    <?php 
    include('nav.php');
    ?>
    <br><br>
    <div class="container_form">
        <div class="row g-3 form_card">
            <h3><center>แบบประเมินADL</center></h3>
                <h4>โปรดอ่านและตอบตามที่เหมาะสมกับท่าน</h4>
                <!-- 1 -->
                  <div class="mb-3">
                    <label class="form-label">1. feeding รับประทานอาหารเมื่อเตรียมสำหรับไว้ให้เรียบร้อยต่อหน้า</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_one" name="interest1" value="0" required>
                      <label class="form-check-label" for="interest1">ไม่สามารถตักอาหารเข้าปากได้ ต้อง
                        มีคนป้อนให้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_two" name="interest1" value="1" required>
                      <label class="form-check-label" for="interest2">ตักอาหารเองได้แต่ต้องมีคนช่วย เช่น
                        ช่วยใช้ช้อนตักเตรียมไว้ให้หรือตัดเป็นเล็กๆ
                        ไว้ล่วงหน้า</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_three" name="interest1" value="2" required>
                      <label class="form-check-label" for="interest3">ตักอาหารและช่วยตัวเองได้เป็นปกติ</label>
                    </div>
                  </div>
                <!-- 2 -->
                  <div class="mb-3">
                    <label class="form-label">2. Grooming ล้างหน้า หวีผม แปรงฟัน โกนหนวด ในระยะเวลา 24 - 28 ชั่วโมงที่ ผ่านมา</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_one" name="interest2" value="0" required>
                      <label class="form-check-label" for="interest2">ต้องการความช่วยเหลือ</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_two" name="interest2" value="1" required>
                      <label class="form-check-label" for="interest2">ทําเองได้ (รวมทั้งที่ทําได้เองถ้า
                        เตรียมอุปกรณ์ไว้ให้)</label>
                    </div>
                  </div>
                  <!-- 3 -->
                  <div class="mb-3">
                    <label class="form-label">3. Transfer (ลุกนั่งจากที่นอน หรือจากเตียง
                        ไปยังเก้าอี้)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_one" name="interest3" value="0" required>
                      <label class="form-check-label" for="interest3">ไม่สามารถนั่งได้ (นั่งแล้วจะล้ม
                        เสมอ) หรือต้องใช้คนสองคนช่วยกันยกขึ้น</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="one_two" name="interest3" value="1" required>
                      <label class="form-check-label" for="interest3">ต้องการความช่วยเหลืออย่างมาก
                        จึงจะนั่งได้ เช่น ต้องใช้คนที่แข็งแรงหรือมี
                        ทักษะ 1 คน หรือใช้คนทั่วไป 2 คนพยุง
                        หรือดันขึ้นมาจึงจะนั่งอยู่ได้</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="one_two" name="interest3" value="2" required>
                        <label class="form-check-label" for="interest3">ต้องการความช่วยเหลือบ้าง
                            เช่น บอกให้ทําตาม หรือช่วยพยุง
                            เล็กน้อย หรือต้องมีคนดูแลเพื่อความ
                            ปลอดภัย</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" id="one_two" name="interest3" value="3" required>
                        <label class="form-check-label" for="interest3">ทําได้เอง</label>
                      </div>
                  </div>
                  <!-- 4 -->
                  <div class="mb-3">
                    <label class="form-label">4. Toilet use (ใช้ห้องนํ้า)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest4" name="interest4" value="0" required>
                      <label class="form-check-label" for="interest1">ช่วยตัวเองไม่ได้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest4" name="interest4" value="1" required>
                      <label class="form-check-label" for="interest2">ทําเองได้บ้าง (อย่างน้อย
                        ทําความสะอาดตัวเองได้หลังจาก
                        เสร็จธุระ) แต่ต้องการความ
                        ช่วยเหลือในบางสิ่ง</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest4" name="interest4" value="2" required>
                      <label class="form-check-label" for="interest3">ช่วยตัวเองได้ดี (ขึ้นนั่งและ
                        ลงจากโถส้วมเองได้ ทําความสะอาดได้
                        เรียบร้อยหลังจากเสร็จธุระ ถอดใส่
                        เสื้อผ้าได้เรียบร้อย)</label>
                    </div>
                  </div>
                  <!-- 5 -->
                  <div class="mb-3">
                    <label class="form-label">5. Mobility (การเคลื่อนที่ภายในห้องหรือ
                        บ้าน)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest5" name="interest5" value="0" required>
                      <label class="form-check-label" for="interest1">เคลื่อนที่ไปไหนไม่ได้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest5" name="interest5" value="1" required>
                      <label class="form-check-label" for="interest2">ต้องใช้รถเข็นช่วยตัวเองให้
                        เคลื่อนที่ได้เอง (ไม่ต้องมีคนเข็นให้) และ
                        จะต้องเข้าออกมุมห้อง
                        หรือประตูได้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest5" name="interest5" value="2" required>
                      <label class="form-check-label" for="interest3">เดินหรือเคลื่อนที่โดยมีคน
                        ช่วย เช่น พยุง หรือบอกให้ทําตาม
                        หรือต้องให้ความสนใจดูแลเพื่อ
                        ความปลอดภัย</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" id="interest5" name="interest5" value="3" required>
                        <label class="form-check-label" for="interest3">เดินหรือเคลื่อนที่ได้เอง</label>
                      </div>
                  </div>
                  <!-- 6 -->
                  <div class="mb-3">
                    <label class="form-label">6. Dressing (การสวมใส่เสื้อผ้า)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest6" name="interest6" value="0" required>
                      <label class="form-check-label" for="interest1">ต้องมีคนสวมใส่ให้ ช่วยตัว
                        เองแทบไม่ได้หรือได้น้อย</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest6" name="interest6" value="1" required>
                      <label class="form-check-label" for="interest2">ช่วยตัวเองได้ประมาณร้อย
                        ละ 50 ที่เหลือต้องมีคนช่วย</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest6" name="interest6" value="2" required>
                      <label class="form-check-label" for="interest3">ช่วยตัวเองได้ดี (รวมทั้งการ
                        ติดกระดุม รูดซิบ หรือใช้เสื้อผ้าที่
                        ดัดแปลงให้เหมาะสมก็ได้)</label>
                    </div>
                  </div>
                  <!-- 7 -->
                  <div class="mb-3">
                    <label class="form-label">ADL
                        7. Stairs (การขึ้นลงบันได 1 ชั้น)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest7" name="interest7" value="0" required>
                      <label class="form-check-label" for="interest1">ไม่สามารถทําได้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest7" name="interest7" value="1" required>
                      <label class="form-check-label" for="interest2">ต้องการคนช่วย</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest7" name="interest7" value="2" required>
                      <label class="form-check-label" for="interest3">ขึ้นลงได้เอง (ถ้าต้องใช้
                        เครื่องช่วยเดิน เช่น walker จะต้อง
                        เอาขึ้นลงได้ด้วย)</label>
                    </div>
                  </div>
                  <!-- 8 -->
                  <div class="mb-3">
                    <label class="form-label">8. Bathing (การอาบนํ้า)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest8" name="interest8" value="0" required>
                      <label class="form-check-label" for="interest1">ต้องมีคนช่วยหรือทําให้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest8" name="interest8" value="1" required>
                      <label class="form-check-label" for="interest2">อาบนํ้าเองได้</label>
                    </div>
                  </div>
                  <!-- 9 -->
                  <div class="mb-3">
                    <label class="form-label">9. Bowels (การกลั้นการถ่ายอุจจาระ
                        ในระยะ 1 สัปดาห์)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest9" name="interest9" value="0" required>
                      <label class="form-check-label" for="interest1">กลั้นไม่ได้ หรือต้องการการ
                        สวนอุจจาระอยู่เสมอ</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest9" name="interest9" value="1" required>
                      <label class="form-check-label" for="interest2">กลั้นไม่ได้บางครั้ง (เป็นน้อย
                        กว่า 1 ครั้งต่อสัปดาห์)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest9" name="interest9" value="2" required>
                      <label class="form-check-label" for="interest3">กลั้นได้เป็นปกติ</label>
                    </div>
                  </div>
                  <!-- 10 -->
                  <div class="mb-3">
                    <label class="form-label">10.Bladder (การกลั้นปัสสาวะในระยะ 1
                        สัปดาห์ที่ผ่านมา)</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest10" name="interest10" value="0" required>
                      <label class="form-check-label" for="interest1">กลั้นไม่ได้ หรือใส่สายสวนปัสสาวะ
                        แต่ไม่สามารถดูแลเองได้</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest10" name="interest10" value="1" required>
                      <label class="form-check-label" for="interest2">กลั้นไม่ได้บางครั้ง (เป็นน้อยกว่า
                        วันละ 1 ครั้ง)</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" id="interest10" name="interest10" value="2" required>
                      <label class="form-check-label" for="interest3">กลั้นได้เป็นปกติ</label>
                    </div>
                  </div>

        

                <div class="col-12 mb-3">
                    <button class="btn btn-primary" name="" onclick="submit_form()">ตกลง</button>
                </div>

                <div class="resutl_form">
                    <article id="resutl_name">ผลการประเมิน:</article>
                    <p id="resutl"></p>
                </div>
            </div>
    </div>
   
    <script src="../visits/visits2.js"></script>
    <script src="form.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>