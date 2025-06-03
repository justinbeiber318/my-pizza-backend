<?php
$servername = "sql12.freesqldatabase.com	";       // Máy chủ MySQL
$username = "sql12782808";              // Tên người dùng (root hoặc tài khoản của bạn)
$password = "4pqTr9sp7M";                  // Mật khẩu của tài khoản MySQL (trong trường hợp này là trống cho "root")
$dbname = "sql12782808";              // Tên cơ sở dữ liệu

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
