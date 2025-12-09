 <!--DOCTYPE html -->
<div class="product-detail-container">
    <?php if (isset($product)): ?>
        <div class="product-images">
            <div class="main-image">
                <img src="<?= htmlspecialchars($product['image'] ?? ''); ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="main-product-image" />
            </div>
        </div>

        <div class="product-info">
            <h1 class="product-title"><?= htmlspecialchars($product['name']) ?></h1>
            <div class="product-rating">
                <span class="rating">★★★★☆</span> <span>(150 Reviews)</span>
            </div>
            <p class="product-price"><?= number_format($product['price'], 0, ',', '.') ?> đ</p>
            <p class="product-description">
                <?= htmlspecialchars($product['description']) ?>
            </p>

            <div class="product-options">
                <form action="?controller=cart&action=add" method="POST">
                    <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                    <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                    <input type="hidden" name="product_price" value="<?= $product['price'] ?>">
                    <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['image'] ?? ''); ?>">

                    <!-- <label for="colours">Màu sắc:</label>
                    <select id="colours" name="colours">
                        <option value="red">Đỏ</option>
                        <option value="blue">Xanh</option>
                    </select>-->

                    <label for="quantity">Số lượng:</label>
                    <input
                        type="number"
                        id="quantity"
                        name="quantity"
                        value="1"
                        min="1"
                        style="width: 60px;"
                    />

                    <?php if (isUserLoggedIn()): ?>
                <button type="submit" class="btn-buy">Thêm vào giỏ hàng</button>
                <?php else: ?>
                    <a href="?controller=account&action=login" class="btn-buy" style="text-decoration: none; display: inline-block; text-align: center;">
                        Thêm vào giỏ hàng
                    </a>
                <?php endif; ?>
                </form>
            </div>

            <div class="product-actions">
                <p>Giao hàng miễn phí</p>
                <p>Đổi trả: Miễn phí đổi trả trong 30 ngày. Xem chi tiết</p>
            </div>
        </div>
    <?php else: ?>
        <p>Không tìm thấy sản phẩm.</p>
    <?php endif; ?>
</div>


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
                <li class="li footer_list_item">Privacy policy</li>
                <li class="li footer_list_item">Terms of use</li>
                <li class="li footer_list_item">FAQ's</li>
                <li class="li footer_list_item">Contact</li>
            </ul>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">
                Copyright TECHNOVAS 2025. All right reserved
            </p>
        </div>
    </div>
</footer>
