<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    // Chưa đăng nhập hoặc không phải admin => chuyển về login
    header("Location: login.php");
    exit;
}

// Đây là trang admin, chỉ admin mới xem được
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - Quản trị Pizzaria Italiana</title>
  <link rel="stylesheet" href="admin.css" />
</head>
<body>
  <h1>Trang Quản trị - Pizzaria Italiana</h1>
  <nav>
    <button id="btn-products" class="active">Quản lý Sản phẩm</button>
    <button id="btn-sales">Quản lý Doanh số</button>
  </nav>

  <section id="section-products">
    <h2>Danh sách Pizza</h2>
    <table id="products-table">
      <thead>
        <tr>
          <th>ID</th><th>Tên</th><th>Mô tả</th><th>Giá ($)</th><th>Loại</th><th>Hình ảnh</th><th>Hành động</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>

    <h3>Thêm / Sửa Pizza</h3>
    <form id="product-form">
      <input type="hidden" id="product-id" />
      <label>Tên Pizza:</label>
      <input type="text" id="product-name" required />
      <label>Mô tả:</label>
      <input type="text" id="product-description" required />
      <label>Giá ($):</label>
      <input type="number" id="product-price" min="0" step="0.01" required />
      <label>Loại:</label>
      <select id="product-category" required>
        <option value="Classics">Cơ bản</option>
        <option value="Specialty">Đặc biệt</option>
        <option value="Vegetarian">Thuần chay</option>
        <option value="Spicy">Cay</option>
      </select>
      <label>URL Hình ảnh:</label>
      <input type="text" id="product-image" required />
      <button type="submit" class="btn-primary">Lưu Pizza</button>
      <button type="button" id="cancel-edit">Hủy</button>
    </form>
  </section>

  <section id="section-sales" style="display:none;">
    <h2>Doanh số bán hàng</h2>
    <p><strong>Tổng doanh thu:</strong> $<span id="total-revenue">0.00</span></p>
    <p><strong>Tổng số lượng pizza bán:</strong> <span id="total-quantity">0</span></p>

    <h3>Chi tiết bán theo loại pizza</h3>
    <table id="sales-table">
      <thead>
        <tr>
          <th>Tên Pizza</th>
          <th>Số lượng bán</th>
          <th>Doanh thu ($)</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </section>

  <script src="admin.js"></script>
</body>
</html>

</body>
</html>
