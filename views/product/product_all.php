 <!--DOCTYPE html -->
<style>
/* Style cho icon được chọn */
.category.active {
    border: 2px solid #000;
    background-color: #f0f0f0;
    border-radius: 10px;
}
</style>

<?php
// include_once("connection.php");
$db = DB::getInstance();

// Xử lý biểu mẫu POST
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['category'])) {
    $category = trim($_POST['category']);
    if ($category === '') {
        unset($_SESSION['selected_category']); // Xóa danh mục nếu chọn "Tất cả"
    } else {
        $_SESSION['selected_category'] = $category; // Lưu danh mục vào session
    }
    // Chuyển hướng để tránh gửi lại biểu mẫu
    header("Location: ?controller=product&action=index");
    exit;
}

// Lấy trang hiện tại
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

// Số sản phẩm mỗi trang
$limit = 10;

// Tính offset
$offset = ($page - 1) * $limit;

// Lấy danh mục từ session
$category = isset($_SESSION['selected_category']) ? $_SESSION['selected_category'] : '';

// Xây dựng truy vấn đếm tổng số sản phẩm
$totalQuery = "SELECT COUNT(*) FROM products";
if (!empty($category)) {
    $totalQuery .= " WHERE LOWER(name) LIKE :category";
}

$totalStmt = $db->prepare($totalQuery);
if (!empty($category)) {
    $totalStmt->bindValue(':category', '%' . strtolower($category) . '%', PDO::PARAM_STR);
}
$totalStmt->execute();
$totalProducts = $totalStmt->fetchColumn();

// Tính tổng số trang
$totalPages = ceil($totalProducts / $limit);

// Xây dựng truy vấn lấy sản phẩm
$query = "SELECT * FROM products";
if (!empty($category)) {
    $query .= " WHERE LOWER(name) LIKE :category";
}
$query .= " LIMIT :limit OFFSET :offset";

$stmt = $db->prepare($query);
if (!empty($category)) {
    $stmt->bindValue(':category', '%' . strtolower($category) . '%', PDO::PARAM_STR);
}
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>



<section class="section">
    <div class="container">
        <div class="section_category">
            <p class="section_category_p">Danh mục</p>
        </div>
        <div class="section_header">
            <h3 class="section_title">Danh mục sản phẩm</h3>
        </div>
        <form method="POST" id="categoryForm" action="?controller=product&action=index">
    <input type="hidden" name="category" id="categoryInput">
    <div class="categories">
        <button type="submit" class="category <?= !isset($_SESSION['selected_category']) ? 'active' : '' ?>" data-name="">
            <img src="./assets/image/icons/all.png" alt="" class="category_icon" />
            <p class="category_name">Tất cả</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Iphone' ? 'active' : '' ?>" data-name="Iphone">
            <img src="./assets/image/icons/phone.png" alt="" class="category_icon" />
            <p class="category_name">Điện thoại</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Apple Watch' ? 'active' : '' ?>" data-name="Apple Watch">
            <img src="./assets/image/icons/applewatch.png" alt="" class="category_icon" />
            <p class="category_name">Đồng hồ</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Laptop' ? 'active' : '' ?>" data-name="Laptop">
            <img src="./assets/image/icons/laptop.png" alt="" class="category_icon" />
            <p class="category_name">Laptop</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'PC' ? 'active' : '' ?>" data-name="PC">
            <img src="./assets/image/icons/pc.png" alt="" class="category_icon" />
            <p class="category_name">PC</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Ipad' ? 'active' : '' ?>" data-name="Ipad">
            <img src="./assets/image/icons/ipad.png" alt="" class="category_icon" />
            <p class="category_name">Ipad</p>
        </button>
        <button type="submit" class="category <?= isset($_SESSION['selected_category']) && $_SESSION['selected_category'] === 'Robot' ? 'active' : '' ?>" data-name="Robot">
            <img src="./assets/image/icons/robot.png" alt="" class="category_icon" />
            <p class="category_name">Robot</p>
        </button>
    </div>
</form>

    </div>
</section>



<!--DATABASE-->

<div class="product_grid">
    <?php
    foreach ($products as $product) {
        echo '<div class="product_card">';
        echo '<a href="?controller=product&action=detail&id=' . htmlspecialchars($product['id']) . '">';
        echo '<img class="product_img" src="' . htmlspecialchars($product['image']) . '" alt="' . htmlspecialchars($product['name']) . '">';
        echo '<h4>' . htmlspecialchars($product['name']) . '</h4>';
        echo '<p class="price">' . number_format($product['price']) . '<sup>đ</sup>';

        if ($product['discount'] > 0) {
            echo ' <span class="discount">-' . $product['discount'] . '%</span>';
        }

        echo '</p>';
        echo '<p class="desc">' . htmlspecialchars($product['description']) . '</p>';
        echo '</a>';
        echo '</div>';
    }
    ?>
</div>
<!-- sss -->
<!--Phân Trang-->
<div style="text-align: center; margin: 30px 0;">
    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($page > 1): ?>
                <a href="?controller=product&action=index&page=<?= $page - 1 ?>">« Trước</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <a href="?controller=product&action=index&page=<?= $i ?>" <?= ($i == $page) ? 'class="active"' : '' ?>><?= $i ?></a>
            <?php endfor; ?>

            <?php if ($page < $totalPages): ?>
                <a href="?controller=product&action=index&page=<?= $page + 1 ?>">Tiếp »</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>


<section class="section">
    <div class="container services_container">
        <div class="service">
            <img src="./assets/image/icons/service-1.png" alt="" class="service_img" />
            <h3 class="service_title">GIAO HÀNG NHANH VÀ MIỄN PHÍ</h3>
            <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-2.png" alt="" class="service_img" />
            <h3 class="service_title">HỖ TRỢ 24/7</h3>
            <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
        <div class="service">
            <img src="./assets/image/icons/service-3.png" alt="" class="service_img" />
            <h3 class="service_title">CHÍNH SÁCH BẢO HÀNH</h3>
            <p class="service_p">Lorem ipsum dolor sit amet consectetur.</p>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container footer_container">
        <div class="footer_item">
            <a href="#" class="footer_logo">TECHNOVAS</a>
            <div class="footer_p">
                TECHNOVAS là thương hiệu tiên phong đến từ Tập đoàn VTECH với gần 40 năm kinh nghiệm trong việc sản xuất và xuất khẩu linh kiện điện tử và thiết bị thông minh đạt chuẩn quốc tế.
            </div>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Dịch Vụ</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Chính Sách Bán Hàng</li>
                <li class="li footer_list_item">Chính Sách Giao Hàng & Lắp Đặt</li>
                <li class="li footer_list_item">Chính Sách Đổi Trả</li>
                <li class="li footer_list_item">Chính Sách Bảo Hành & Bảo Trì</li>
            </ul>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Account</li>
                <li class="li footer_list_item">Login / Register</li>
                <li class="li footer_list_item">Cart</li>
                <li class="li footer_list_item">Shop</li>
            </ul>
        </div>
        <div class="footer_item">
            <h3 class="footer_item_titl">Support</h3>
            <ul class="footer_list">
                <li class="li footer_list_item">Privacy policy</li>
                <li class="li footer_list_item">Terms of use</li>
                <li class="li footer_list_item">FAQ's</li>
                <li class="li footer_list_item">Contact</li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">Copyright TECHNOVAS 2025. All right reserved</p>
        </div>
    </div>
    
</footer>