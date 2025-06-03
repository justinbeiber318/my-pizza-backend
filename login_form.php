<?php
session_start();
$error = $_SESSION['login_error'] ?? '';
unset($_SESSION['login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Đăng nhập - Pizzaria Italiana</title>
  <link rel="stylesheet" href="login.css" />
</head>
<body>
<button id="login-btn" class="login-btn">Login</button>
  <div id="login-popup" class="login-popup hidden">
    <div class="login-popup-content">
      <button id="close-login-btn" class="close-login-btn">&times;</button>
      <h3>Đăng nhập</h3>
      <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
      <?php endif; ?>
      <form id="login-form" method="POST" action="login.php">
        <label for="username">Tên đăng nhập:</label>
        <input type="text" id="username" name="username" required placeholder="Nhập tên đăng nhập" />
        <label for="password">Mật khẩu:</label>
        <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu" />
        <button type="submit" class="btn-primary">Đăng nhập</button>
      </form>
    </div>
  </div>
<script src="login.js" defer></script>
</body>
</html>
