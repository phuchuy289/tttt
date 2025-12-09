<section class="section">
    <div class="container">
        <div class="cart">
            <div class="cart_header">
                <p class="cart_header_id">Mã Sản Phẩm</p>
                <p class="cart_header_title">Tên Sản Phẩm</p>
                <p class="cart_header_image">Hình Ảnh</p>
                <p class="cart_header_price">Giá</p>
                <p class="cart_header_quantity">Số Lượng</p>
                <p class="cart_header_delete">Xóa</p>
            </div>

          
            <?php if (!empty($data['cart_items'])): ?>
                 <?php $total_price = 0; // Khởi tạo biến tổng giá ?>
                <?php foreach ($data['cart_items'] as $item): ?>
                     <?php 
                        $item_total = $item['price'] * $item['quantity']; // Tính tổng cho từng mặt hàng
                        $total_price += $item_total; // Cộng dồn vào tổng
                    ?>
                    <div class="cart-item">
                        <p class="cart_id"><?php echo htmlspecialchars($item['id']); ?></p>
                        <p class="cart_title"><?php echo htmlspecialchars($item['name']); ?></p>
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="cart_img" />
                        <p class="cart_price"><?php echo number_format($item['price'], 0, ',', '.') . ' VND'; ?></p>
                        <p class="cart_quantity"><?php echo $item['quantity']; ?></p>
                        <a href="?controller=cart&action=remove&id=<?php echo urlencode($item['id']); ?>" class="cart_delete">Xóa</a>
                    </div>
                <?php endforeach; ?>
                 <div class="cart-total">
                    <p><strong>Tổng cộng:</strong> <?php echo number_format($total_price, 0, ',', '.') . ' VND'; ?></p>
                </div>
            <?php else: ?>
                <p>Giỏ hàng của bạn đang trống.</p>
            <?php endif; ?>
        </div>

        <!-- Nút thanh toán -->
        <?php if (!empty($data['cart_items'])): ?>
            <a href="?controller=payment&action=thanhtoan" class="checkout-btn">Thanh toán</a>
        <?php endif; ?>
    </div>
</section>




<footer class="footer">
    <div class="container footer_container">
        <div class="footer_item">
            <a href="#" class="footer_logo">TECHNOVAS</a>
            <div class="footer_p">
                TECHNOVAS là thương hiệu tiên phong đến từ Tập đoàn VTECH với gần 40 năm kinh
                nghiệm trong việc sản xuất và xuất khẩu linh kiện điện tử và thiết bị thông minh đạt chuẩn quốc tế.
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