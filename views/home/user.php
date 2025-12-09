<div class="ep-container">
    <div class="ep-sidebar">
        <h3>Tài khoản của tôi</h3>
        <ul>
            <li class="ep-active"><a href="?controller=home&action=user">Hồ sơ</a></li>
            <li ><a href="?controller=account&action=changePassword">Đổi mật khẩu</a></li>
            <li class=""><a href="?controller=order&action=history">Lịch sử mua hàng</a></li>
        </ul>
    </div>

    <div class="ep-content">
        <div class="ep-breadcrumb">
            <span class="ep-welcome">Welcome! <?= $user->name ?> </span>
        </div>
        <div class="ep-card">
            <h2 style="margin-bottom:50px">Hồ sơ của tôi</h2>
            <form method="post" action="?controller=account&action=updateProfile">
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" value="<?= $user->username ?>">
                    </div>
                </div>
                <div>
                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label>Tên</label>
                            <input type="text" name="name" value="<?= $user->name ?>">
                        </div>
                    </div>
                </div>
                <div class="ep-form-row">
                    <div class="ep-form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="<?= $user->email ?>">
                    </div>
                </div>
                <div>
                    <div class="ep-form-row">
                        <div class="ep-form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="phone" value="<?= $user->phone ?>">
                        </div>
                    </div>
                </div>

                <div class="ep-form-row">
                    <div class="ep-form-group">
                    <label for="gender">Giới tính:</label>
                        <select name="gender">
                        <option value="Male" <?= $user->gender === 'Male' ? 'selected' : '' ?>>Nam</option>
                        <option value="Female" <?= $user->gender === 'Female' ? 'selected' : '' ?>>Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="ep-form-actions">
                    <button type="submit" name="btn_submit"  class="ep-save">Lưu</button>
                </div>
                
            </form>
        </div>
    </div>
</div>

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
<!-- End of views/home/user.php -->