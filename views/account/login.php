<?php if (!empty($message)): ?>
    <script type="text/javascript">
        alert("<?= showMessageRegister($message) ?>");
    </script>
<?php endif; ?>
<section class="section">
    <div class="auth_container">
        <div class="auth_img">
            <img src="./assets/image/bgsinginup.png" alt="" class="auth_image" />
        </div>
        <div class="auth_content">
            <form action="?controller=account&action=login" class="auth_form" method="post">
                <h2 class="form_title">Đăng Nhập Tài Khoản</h2>
                <p class="auth_p"></p>
                <div class="form_group">
                    <input name="tk" type="text" placeholder="Username" class="form_input" />
                </div>
                <div class="form_group form_pass">
                    <input
                            type="password"
                            placeholder="Mật Khẩu"
                            style="ime-mode: disabled;"
                            name="mk"
                            class="form_input"
                    />
                </div>
                <div class="form_group">
                    <input type="submit" name="btn_submit" class="form_btn" value="Đăng Nhập"/>
                </div>
                <div class="form_group">
                <label><input type="checkbox" name="remember_me"> Ghi nhớ đăng nhập</label>

              <span
              >Bạn chưa có tài khoản?
                <a href="?controller=account&action=register" class="form_auth_link"
                >Đăng Ký</a
                ></span
              >
                </div>
            </form>
        </div>
    </div>
</section>
<!-- End of views/account/login.php -->
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
    </div>
    <div class="footer_bottom">
        <div class="container footer_bottom_container">
            <p class="footer_copy">
                Copyright TECHNOVAS 2025. All right reserved
            </p>
        </div>
    </div>
</footer>