<?php
$servername = "localhost";       // Máy chủ MySQL
$username = "root";              // Tên người dùng (root hoặc tài khoản của bạn)
$password = "";                  // Mật khẩu của tài khoản MySQL (trong trường hợp này là trống cho "root")
$dbname = "database";              // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
