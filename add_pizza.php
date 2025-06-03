<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

include 'db_connect.php';

$data = json_decode(file_get_contents("php://input"), true);

// Kiểm tra dữ liệu bắt buộc
if (!isset($data['name'], $data['price'], $data['description'], $data['category'], $data['image'])) {
  echo json_encode(["success" => false, "error" => "Thiếu dữ liệu đầu vào"]);
  exit;
}

// Nếu có ID → cập nhật, ngược lại → thêm mới
if (!empty($data['id'])) {
  // Cập nhật pizza
  $stmt = $conn->prepare("UPDATE pizzas SET name=?, description=?, price=?, category=?, image=? WHERE id=?");
  $stmt->bind_param("ssdssi", $data['name'], $data['description'], $data['price'], $data['category'], $data['image'], $data['id']);
} else {
  // Thêm mới pizza
  $stmt = $conn->prepare("INSERT INTO pizzas (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssdss", $data['name'], $data['description'], $data['price'], $data['category'], $data['image']);
}

if ($stmt->execute()) {
  echo json_encode(["success" => true]);
} else {
  echo json_encode(["success" => false, "error" => $stmt->error]);
}

$conn->close();
?>
