<!DOCTYPE html>
<html>
<head>
    <title>บันทึกและแสดงข้อมูลพื้นที่การวิเคราะห์</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* Light blue background */
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 70%;
            background-color: #ffffff; /* White background for container */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #4b0082; /* Indigo color */
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #333333;
        }
        input[type="text"], input[type="submit"], textarea {
            padding: 8px;
            margin-top: 4px;
            margin-bottom: 10px;
            border: 1px solid #dddddd;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #ffffff; /* White background for table */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #add8e6; /* Light blue for table headers */
            color: #333333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f2f2f2;
        }
        .author-info {
            text-align: center;
            margin-top: 20px;
        }
        .author-info img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <?php
    include 'db.php';

    // เพิ่มข้อมูลพื้นที่การวิเคราะห์
    if(isset($_POST['add_area'])) {
        $area_name = $_POST['area_name'];
        $creator_name = $_POST['creator_name'];
        $target_area_analysis = $_POST['target_area_analysis'];
        $strengths = $_POST['strengths'];
        $weaknesses = $_POST['weaknesses'];
        $opportunities = $_POST['opportunities'];
        $threats = $_POST['threats'];
        $resources = $_POST['resources'];
        $reporter_name = $_POST['reporter_name'];
        $report_date = date('Y-m-d');

        // Insert into areas table
        $sql = "INSERT INTO areas (area_name, creator_name, target_area_analysis, strengths, weaknesses, opportunities, threats, report_date) 
                VALUES ('$area_name', '$creator_name', '$target_area_analysis', '$strengths', '$weaknesses', '$opportunities', '$threats', '$report_date')";

        if ($conn->query($sql) === TRUE) {
            $area_id = $conn->insert_id; // Get the last inserted area_id

            // Insert into data table
            $sql_data = "INSERT INTO data (area_id, reporter_name) VALUES ('$area_id', '$reporter_name')";
            $conn->query($sql_data);

            // Insert into data1 table
            $sql_data1 = "INSERT INTO data1 (area_id, resources) VALUES ('$area_id', '$resources')";
            $conn->query($sql_data1);

            echo "<h2>บันทึกข้อมูลเรียบร้อยแล้ว</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // ลบข้อมูลพื้นที่การวิเคราะห์
    if(isset($_POST['delete_area'])) {
        $area_id = $_POST['area_id'];

        // Delete from data1 table
        $sql_data1 = "DELETE FROM data1 WHERE area_id=$area_id";
        $conn->query($sql_data1);

        // Delete from data table
        $sql_data = "DELETE FROM data WHERE area_id=$area_id";
        $conn->query($sql_data);

        // Delete from areas table
        $sql = "DELETE FROM areas WHERE area_id=$area_id";

        if ($conn->query($sql) === TRUE) {
            echo "<h2>ลบข้อมูลเรียบร้อยแล้ว</h2>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    ?>
    <div class="author-info">
        <h2>ผู้สร้างเว็บ แพท ชื่อนักศึกษา นาย เจษฎา ลีรัตน์ รหัสนักศึกษา 643450067-0</h2>
        <img src="https://scontent.fbkk29-6.fna.fbcdn.net/v/t39.30808-6/450675726_2779448558876851_8637114740397672924_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=127cfc&_nc_ohc=lzgzgs2xdj8Q7kNvgG84vi4&_nc_ht=scontent.fbkk29-6.fna&oh=00_AYDFMH7I0G5jYUqlCkqkyZbJPy3v8EMWSrl8PrB-OVi9Dg&oe=669408B9" alt="ผู้สร้างเว็บ">
    </div>
    <h2>เพิ่มข้อมูลพื้นที่การวิเคราะห์</h2>
    <form method="POST">
        <label for="area_name">ชื่อพื้นที่:</label>
        <input type="text" id="area_name" name="area_name" required><br>
        <label for="creator_name">ชื่อผู้สร้าง:</label>
        <input type="text" id="creator_name" name="creator_name" required><br>
        <label for="target_area_analysis">การวิเคราะห์พื้นที่เป้าหมาย:</label><br>
        <textarea id="target_area_analysis" name="target_area_analysis" rows="4" required></textarea><br>
        <label for="strengths">จุดแข็งของพื้นที่:</label><br>
        <textarea id="strengths" name="strengths" rows="4" required></textarea><br>
        <label for="weaknesses">จุดอ่อนของพื้นที่:</label><br>
        <textarea id="weaknesses" name="weaknesses" rows="4" required></textarea><br>
        <label for="opportunities">โอกาสและความท้าทายในพื้นที่:</label><br>
        <textarea id="opportunities" name="opportunities" rows="4" required></textarea><br>
        <label for="threats">อุปสรรคและปัจจัยคุกคามในพื้นที่:</label><br>
        <textarea id="threats" name="threats" rows="4" required></textarea><br>
        <label for="resources">ทรัพยากร:</label><br>
        <textarea id="resources" name="resources" rows="4" required></textarea><br>
        <label for="reporter_name">ชื่อผู้รายงาน:</label>
        <input type="text" id="reporter_name" name="reporter_name" required><br>
        <input type="submit" name="add_area" value="บันทึกข้อมูล">
    </form>

    <h2>ลบข้อมูลพื้นที่การวิเคราะห์</h2>
    <form method="POST">
        <label for="area_id">รหัสพื้นที่:</label>
        <input type="text" id="area_id" name="area_id" required><br>
        <input type="submit" name="delete_area" value="ลบข้อมูล">
    </form>

    <h2>รายการพื้นที่การวิเคราะห์</h2>
    <table border="1">
        <tr>
            <th>รหัสพื้นที่ (ID)</th>
            <th>ชื่อพื้นที่</th>
            <th>ผู้สร้าง</th>
            <th>วันที่รายงาน</th>
        </tr>
        <?php
        // เชื่อมต่อฐานข้อมูล
        include 'db.php';

        // สร้างคำสั่ง SQL เพื่อดึงข้อมูล
        $sql = "SELECT area_id, area_name, creator_name, report_date FROM areas";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["area_id"] . "</td>";
                echo "<td>" . $row["area_name"] . "</td>";
                echo "<td>" . $row["creator_name"] . "</td>";
                echo "<td>" . $row["report_date"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>ไม่พบข้อมูลพื้นที่การวิเคราะห์</td></tr>";
        }
        $conn->close(); // ปิดการเชื่อมต่อฐานข้อมูล
        ?>
    </table>
</div>

</body>
</html>
