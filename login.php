<?php
session_start();
require_once 'db_connect.php';

$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, username, password_hash, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Kiểm tra vai trò admin
        if ($user['role'] === 'admin' && password_verify($password, $user['password_hash'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            header("Location: admin_dashboard.php"); // trang sau đăng nhập
            exit;
        } else {
            $error = "Chỉ tài khoản admin mới được đăng nhập.";
        }
    } else {
        $error = "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}
$_SESSION['login_error'] = $error;
header("Location: login_form.php");
exit;
