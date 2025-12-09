 <!--DOCTYPE html -->
<?php if (!empty($products)): ?>
<div class="">
    <section class="section">
        <div class="container">
    <div class="products">
        <?php foreach ($products as $product): ?>
            <div class="card">
                <a href="?controller=product&action=detail&id=<?= $product->id ?>">
                    <div class="card_top">
                        <img
                            src="<?= $product->img ?>"
                            alt=""
                            class="card_img"
                        />
                        <div class="card_top_icons">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="card_top_icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z"/>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                 stroke-width="1.5" stroke="currentColor" class="card_top_icon">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="card_body">
                        <h3 class="card_title"><?= htmlspecialchars($product->name) ?></h3>
                        <p class="card_price"><?= number_format($product->price, 0, ',', '.') ?> đ</p>
                        <div class="card_ratings">
                            <div class="card_stars">
                                <?php for ($i = 0; $i < 5; $i++): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd"
                                              d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007
                                                  5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527
                                                  1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354
                                                  7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273
                                                  -4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433
                                                  2.082-5.006z"
                                              clip-rule="evenodd"/>
                                    </svg>
                                <?php endfor; ?>
                            </div>
                            <p class="card_rating_numbers">(88)</p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
        </div>
    </section>
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
<?php else: ?>
    <div class="not_found">
        <h1><?= isset($message) ? $message : 'Không tìm thấy sản phẩm'; ?></h1>

        <a href="?controller=home&action=index" class="not_found_btn">Quay về Trang Chủ</a>
    </div>
<?php endif; ?>
