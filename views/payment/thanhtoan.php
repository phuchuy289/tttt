<!--DOCTYPE html -->
<?php
if (!isUserLoggedIn()) {
    header("Location: index.php?controller=account&action=login");
    exit;
}
$cart_items = $data['cart_items'];
$total_amount = 0;
?>
<div class="cf-checkout-container">
    <div class="cf-checkout-form">
        <h2 class="cf-form-title"><i class="fas fa-shipping-fast"></i> Thông tin giao hàng</h2>

        <?php if (isset($_SESSION['error'])): ?>
        <div class="cf-error-message">
            <?php 
                echo $_SESSION['error'];
                unset($_SESSION['error']);
                ?>
        </div>
        <?php endif; ?>

        <form id="payment-form" method="post" action="index.php?controller=order&action=placeOrder"
            onsubmit="return validateForm()">
            <div class="cf-form-row">
                <div class="cf-form-group">
                    <label for="name"><i class="fas fa-user"></i> Họ tên</label>
                    <input type="text" id="name" name="name" required>
                    <div class="cf-error" id="name-error"></div>
                </div>

                <div class="cf-form-group">
                    <label for="phone"><i class="fas fa-phone"></i> Số điện thoại</label>
                    <input type="tel" id="phone" name="phone" required>
                    <div class="cf-error" id="phone-error"></div>
                </div>
            </div>

            <div class="cf-form-group">
                <label for="address"><i class="fas fa-map-marker-alt"></i> Địa chỉ (Tên đường, số nhà)</label>
                <input type="text" id="address" name="address" required>
                <div class="cf-error" id="address-error"></div>
            </div>

            <div class="cf-form-row">
                <div class="cf-form-group">
                    <label><i class="fas fa-city"></i> Tỉnh/Thành phố</label>
                    <select id="province" name="province" required>
                        <option value="">-- Chọn Tỉnh/Thành phố --</option>
                    </select>
                    <div class="cf-error" id="province-error"></div>
                </div>

                <div class="cf-form-group">
                    <label><i class="fas fa-building"></i> Quận/Huyện</label>
                    <select id="district" name="district" required disabled>
                        <option value="">-- Chọn Quận/Huyện --</option>
                    </select>
                    <div class="cf-error" id="district-error"></div>
                </div>
            </div>

            <div class="cf-form-group">
                <label><i class="fas fa-map"></i> Phường/Xã</label>
                <select id="ward" name="ward" required disabled>
                    <option value="">-- Chọn Phường/Xã --</option>
                </select>
                <div class="cf-error" id="ward-error"></div>
            </div>

            <div class="cf-payment-methods">
                <h3>Phương thức thanh toán</h3>
                <div class="cf-payment-option" onclick="selectPayment('cod')">
                    <div style="width: 100%; display: flex; align-items: center;">
                        <input type="radio" name="payment_method" value="cod" checked>
                        <label>Thanh toán khi nhận hàng (COD)</label>
                    </div>
                </div>

                <div class="cf-payment-option" onclick="selectPayment('bank_transfer')">
                    <div style="width: 100%; display: flex; align-items: center;">
                        <input type="radio" name="payment_method" value="bank_transfer">
                        <label>Thanh toán chuyển khoản</label>
                    </div>
                    <div class="cf-bank-info" id="bank-info" style="display: none;">
                        <h4>TÀI KHOẢN NGÂN HÀNG:</h4>
                        <p><strong>Vietcombank</strong></p>
                        <p><strong>Chủ tài khoản:</strong> TECHNOVAS</p>
                        <p><strong>Số tài khoản:</strong> 99344097177</p>
                    </div>
                </div>
            </div>

            <button type="submit" class="cf-submit-btn">
                <i class="fas fa-lock"></i> Đặt hàng an toàn
            </button>
        </form>
    </div>

    <div class="cf-order-summary">
        <h2 class="cf-form-title"><i class="fas fa-shopping-cart"></i> Đơn hàng của bạn</h2>
        <div class="cf-cart-items">
            <?php foreach ($cart_items as $item): 
                $itemTotal = $item['price'] * $item['quantity'];
                $total_amount += $itemTotal;
            ?>
            <div class="cf-cart-item">
                <img src="<?php echo htmlspecialchars($item['image']); ?>"
                    alt="<?php echo htmlspecialchars($item['name']); ?>">
                <div class="cf-item-details">
                    <h4><?php echo htmlspecialchars($item['name']); ?></h4>
                    <div class="cf-quantity">Số lượng: <?php echo $item['quantity']; ?></div>
                </div>
                <div class="cf-item-price"><?php echo number_format($itemTotal); ?>₫</div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="cf-total-amount">
            Tổng cộng: <?php echo number_format($total_amount); ?>₫
        </div>
    </div>
</div>

<script>
let data;

fetch("assets/js/dghc.json")
    .then(response => response.json())
    .then(json => {
        data = json;
        loadProvinces();
    });

function loadProvinces() {
    const provinceSelect = document.getElementById('province');
    data.forEach(p => {
        const opt = document.createElement('option');
        opt.value = p.Name;
        opt.dataset.code = p.Id;
        opt.textContent = p.Name;
        provinceSelect.appendChild(opt);
    });
}

document.getElementById('province').addEventListener('change', function() {
    const code = this.options[this.selectedIndex].dataset.code;
    const districtSel = document.getElementById('district');
    const wardSel = document.getElementById('ward');

    districtSel.innerHTML = '<option value="">-- Chọn Quận/Huyện --</option>';
    wardSel.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';
    wardSel.disabled = true;

    const province = data.find(p => p.Id == code);

    province.Districts.forEach(d => {
        const opt = document.createElement('option');
        opt.value = d.Name;
        opt.dataset.code = d.Id;
        opt.textContent = d.Name;
        districtSel.appendChild(opt);
    });

    districtSel.disabled = false;
});

document.getElementById('district').addEventListener('change', function() {
    const pCode = document.getElementById('province').options[document.getElementById('province').selectedIndex]
        .dataset.code;
    const dCode = this.options[this.selectedIndex].dataset.code;

    const wardSel = document.getElementById('ward');
    wardSel.innerHTML = '<option value="">-- Chọn Phường/Xã --</option>';

    const province = data.find(p => p.Id == pCode);
    const district = province.Districts.find(d => d.Id == dCode);

    district.Wards.forEach(w => {
        const opt = document.createElement('option');
        opt.value = w.Name;
        opt.textContent = w.Name;
        wardSel.appendChild(opt);
    });

    wardSel.disabled = false;
});
</script>