<?php
if (!isUserLoggedIn()) {
    header("Location: ?controller=home&action=index");
    exit;
}
?>
<div class="app-content">
    <div class="app-content-header">
        <h1 class="app-content-headerText">Add Products</h1>
        <button class="mode-switch" title="Switch Theme">
            <svg class="moon" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                stroke-width="2" width="24" height="24" viewBox="0 0 24 24">
                <path d="M21 12.79A9 9 0 111.21 3 7 7 0 0021 12.79z"></path>
            </svg>
        </button>
    </div>

    <div class="app-content">
        <div class="add-product-form">
            <form method="POST" action="?controller=add_productManage&action=index" enctype="multipart/form-data">

                <div class="form-group">
                    <label class="form-label">Tên sản phẩm</label>
                    <input name="productName" type="text" class="form-control" placeholder="Nhập tên sản phẩm" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Giá ($)</label>
                    <input name="price" type="number" class="form-control" placeholder="Nhập giá" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Mô tả</label>
                    <textarea name="description" rows="4" class="form-control" placeholder="Nêu mô tả"></textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Danh mục chính</label>
                    <select name="mainCategory" class="form-control">
                        <option value="">Chọn danh mục chính</option>
                        <option value="1">Flash Sale</option>
                        <option value="2">Best Selling Products</option>
                        <option value="3">Our Products</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Chọn hình ảnh sản phẩm</label>
                    <input name="image" type="file" class="form-control" accept="image/*" required>
                </div>

                <button name="btn" type="submit" class="app-content-headerButton">Lưu sản phẩm</button>
            </form>
        </div>
    </div>
</div>