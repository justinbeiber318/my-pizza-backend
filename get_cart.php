<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Kết nối cơ sở dữ liệu
include 'db_connect.php';

// Giả sử bạn có ID người dùng (user_id)
$userId = 1;  // Giả sử người dùng đã đăng nhập và có ID là 1

$sql = "SELECT cart_data FROM user_cart WHERE user_id = $userId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  echo $row['cart_data'];  // Trả lại giỏ hàng dưới dạng JSON
} else {
  echo json_encode(["message" => "Cart not found"]);
}

$conn->close();
?>
