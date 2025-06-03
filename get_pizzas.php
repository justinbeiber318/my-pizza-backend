<?php
// CORS và header
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// Kết nối DB
include 'db_connect.php'; // Đảm bảo $conn tồn tại và kết nối

// Truy vấn
$sql = "SELECT id, name, price, description, category, badge, image FROM pizzas";
$result = $conn->query($sql);

$pizzas = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $pizzas[] = [
      'id' => (int)($row['id'] ?? 0),
      'name' => $row['name'] ?? '',
      'price' => isset($row['price']) ? (float)$row['price'] : 0,
      'description' => $row['description'] ?? '',
      'category' => $row['category'] ?? '',
      'badge' => $row['badge'] ?? null,
      'image' => $row['image'] ?? ''
    ];
  }
}

// Trả JSON
echo json_encode($pizzas);

// Đóng kết nối
$conn->close();
?>
