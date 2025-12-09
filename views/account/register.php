<section class="section">
    <div class="auth_container">
        <div class="auth_img">
            <img src="./assets/image/auth-imagee.jpg" alt="" class="auth_image" />
        </div>
        <div class="auth_content">
            <form action="?controller=account&action=register" class="auth_form" method="POST">
                <h2 class="form_title">Tạo Tài Khoản</h2>
                <p class="auth_p"></p>
                <div class="form_group">
                    <input type="text" placeholder="Username" class="form_input" name="text_username" />
                </div>
                <div class="form_group">
                    <input type="email" placeholder="Email" class="form_input" name="text_email" />
                </div>
                <div class="form_group form_pass">
                    <input
                        type="password"
                        placeholder="Mật khẩu"
                        class="form_input"
                        name="text_password"
                    />
                </div>
                <div class="form_group">
                    <input type="submit" name="btn_submit" class="form_btn" value="ĐĂNG KÝ"/>
                </div>
                <div class="form_group">
              <span
              >Bạn đã có tài khoản?
                <a href="?controller=account&action=login" class="form_auth_link">Đăng Nhập</a></span
              >
                </div>
            </form>
        </div>
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
        <div class="footer_bottom">
            <div class="container footer_bottom_container">
                <p class="footer_copy">
                    Copyright TECHNOVAS 2025. All right reserved
                </p>
            </div>
        </div>
</footer>

<?php if (!empty($message)): ?>
    <script type="text/javascript">
        alert("<?= showMessageRegister($message) ?>");
    </script>
<?php endif; ?>
<!-- End of views/account/register.php -->