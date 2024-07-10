นี่คือวิธีการติดตั้งและใช้งานในรูปแบบ README สำหรับ GitHub ในภาษาไทย:

---

# ชื่อโปรเจกต์

## คู่มือติดตั้งและการใช้งาน

### 1. การตั้งค่า XAMPP และ MySQL

#### 1.1 ดาวน์โหลดและติดตั้ง XAMPP

- ดาวน์โหลด XAMPP จาก [เว็บไซต์ XAMPP](https://www.apachefriends.org/index.html)
- ทำตามคำแนะนำเพื่อติดตั้ง XAMPP บนเครื่องของคุณ

#### 1.2 เริ่มต้นใช้งาน XAMPP และเปิดเซิร์ฟเวอร์ MySQL และ Apache

- เปิด XAMPP Control Panel
- เริ่มต้นเซิร์ฟเวอร์ MySQL และเซิร์ฟเวอร์ Apache โดยคลิกปุ่ม "Start" ที่ตรงกับแต่ละเซิร์ฟเวอร์

### 2. เข้าสู่ระบบ phpMyAdmin

#### 2.1 เปิด phpMyAdmin ในเบราว์เซอร์

- เปิดเบราว์เซอร์และไปที่: [http://localhost/phpmyadmin](http://localhost/phpmyadmin)

### 3. สร้างฐานข้อมูลใหม่

#### 3.1 คลิกที่แท็บ "Database" และกรอกชื่อฐานข้อมูลใหม่

### 4. สร้างตารางในฐานข้อมูล

#### 4.1 เลือกฐานข้อมูล จากนั้นคลิกที่แท็บ "SQL"

#### 4.2 วางคำสั่ง SQL ต่อไปนี้และกดปุ่ม "Go" เพื่อสร้างตาราง:

```sql
CREATE TABLE areas (
    area_id INT AUTO_INCREMENT PRIMARY KEY,
    area_name VARCHAR(255) NOT NULL,
    creator_name VARCHAR(255) NOT NULL,
    target_area_analysis TEXT NOT NULL,
    strengths TEXT NOT NULL,
    weaknesses TEXT NOT NULL,
    opportunities TEXT NOT NULL,
    threats TEXT NOT NULL,
    report_date DATE NOT NULL
);

CREATE TABLE data (
    reporter_id INT AUTO_INCREMENT PRIMARY KEY,
    area_id INT NOT NULL,
    reporter_name VARCHAR(255) NOT NULL,
    FOREIGN KEY (area_id) REFERENCES areas(area_id)
);

CREATE TABLE data1 (
    resource_id INT AUTO_INCREMENT PRIMARY KEY,
    area_id INT NOT NULL,
    resources TEXT NOT NULL,
    FOREIGN KEY (area_id) REFERENCES areas(area_id)
);
```

### 5. นำโค้ดและไฟล์ต่าง ๆ ไปวางในตำแหน่งที่ต้องการ

#### 5.1 ดาวน์โหลดไฟล์โปรแกรม และแตกไฟล์ ZIP

#### 5.2 นำไฟล์ที่แตกไว้ไปวางที่ C:\xampp\htdocs

### 6. เปิดเบราว์เซอร์และทดสอบการใช้งาน

#### 6.1 เปิดเบราว์เซอร์และใส่ URL ต่อไปนี้: `http://localhost/ชื่อโฟลเดอร์ของคุณ/data.php`

### 7. เริ่มต้นใช้งาน

#### 7.1 ลงทะเบียนบัญชีผู้ใช้หรือเข้าใช้งานตามคำแนะนำที่ระบุในโปรแกรม

---

คุณสามารถนำ README นี้ไปใช้ใน GitHub โดยการสร้างไฟล์ชื่อ `README.md` และวางเนื้อหาข้างต้นลงไปในไฟล์นั้น.
