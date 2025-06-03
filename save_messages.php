<?php
// Xử lý preflight request
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type, Authorization");
    http_response_code(200);
    exit;
}

// Header chính cho tất cả request
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Bao gồm kết nối DB
require_once 'db_connect.php';

// Đọc JSON input
$data = json_decode(file_get_contents('php://input'), true);

// Kiểm tra kết nối DB
if (!$conn) {
    echo json_encode(['success' => false, 'error' => 'Database connection failed']);
    exit;
}

// Kiểm tra dữ liệu
$name = $conn->real_escape_string($data['name'] ?? '');
$email = $conn->real_escape_string($data['email'] ?? '');
$subject = $conn->real_escape_string($data['subject'] ?? '');
$message = $conn->real_escape_string($data['message'] ?? '');

if (empty($name) || empty($email) || empty($subject) || empty($message)) {
    echo json_encode(['success' => false, 'error' => 'Thiếu thông tin cần thiết']);
    exit;
}

// Chèn vào bảng contact_messages
$sql = "INSERT INTO contact_messages (name, email, subject, message)
        VALUES ('$name', '$email', '$subject', '$message')";

if ($conn->query($sql)) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'error' => $conn->error]);
}
?>
