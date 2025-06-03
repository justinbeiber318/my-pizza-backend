<?php
// Bao gồm tệp kết nối cơ sở dữ liệu
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
  // Trả về các header CORS cho yêu cầu OPTIONS
  header("Access-Control-Allow-Origin: *");
  header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
  header("Access-Control-Allow-Headers: Content-Type, Authorization");
  exit;  // Dừng lại sau khi xử lý OPTIONS
}

// Thêm header cho yêu cầu chính
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Content-Type: application/json");

// Bao gồm tệp kết nối cơ sở dữ liệu
include 'db_connect.php';  // Đảm bảo bạn có tệp db_connect.php với thông tin kết nối hợp lệ

// Truy vấn lấy thông tin khuyến mãi từ cơ sở dữ liệu
// Truy vấn lấy thông tin khuyến mãi từ cơ sở dữ liệu
$sql = "SELECT id, name, price, image, description FROM special_offers";  // Đảm bảo có trường 'image'
$result = $conn->query($sql);

// Kiểm tra xem có kết quả không
if ($result->num_rows > 0) {
  // Lưu trữ kết quả trong một mảng
  $specialOffers = [];
  while ($row = $result->fetch_assoc()) {
    $specialOffers[] = $row;
  }

  // Trả về kết quả dưới dạng JSON
  echo json_encode($specialOffers);
} else {
  echo json_encode([]);  // Nếu không có khuyến mãi, trả về mảng trống
}

