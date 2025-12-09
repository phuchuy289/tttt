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

            <form id="payment-form" method="post" action="index.php?controller=order&action=placeOrder" onsubmit="return validateForm()">
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
                    <label for="address"><i class="fas fa-map-marker-alt"></i> Địa chỉ</label>
                    <input type="text" id="address" name="address" required>
                    <div class="cf-error" id="address-error"></div>
                </div>

                <div class="cf-form-row">
                    <div class="cf-form-group">
                        <label for="province"><i class="fas fa-city"></i> Tỉnh/Thành phố</label>
                        <input type="text" id="province" name="province" required>
                        <div class="cf-error" id="province-error"></div>
                    </div>

                    <div class="cf-form-group">
                        <label for="district"><i class="fas fa-building"></i> Quận/Huyện</label>
                        <input type="text" id="district" name="district" required>
                        <div class="cf-error" id="district-error"></div>
                    </div>
                </div>

                <div class="cf-form-group">
                    <label for="ward"><i class="fas fa-map"></i> Phường/Xã</label>
                    <input type="text" id="ward" name="ward" required>
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
                            <p><strong>Vietcombank - (Ngân hàng TMCP Ngoại Thương Việt Nam)</strong></p>
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
                    <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
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
        function validateForm() {
            let isValid = true;
            const fields = ['name', 'phone', 'address', 'province', 'district', 'ward'];
            
            // Reset all error messages
            fields.forEach(field => {
                document.getElementById(field + '-error').textContent = '';
            });
            
            // Validate name
            const name = document.getElementById('name').value.trim();
            if (!name) {
                document.getElementById('name-error').textContent = 'Vui lòng nhập họ tên';
                isValid = false;
            } else if (name.length < 2) {
                document.getElementById('name-error').textContent = 'Họ tên phải có ít nhất 2 ký tự';
                isValid = false;
            }
            
            // Validate phone - accept various phone formats
            const phone = document.getElementById('phone').value.trim();
            if (!phone) {
                document.getElementById('phone-error').textContent = 'Vui lòng nhập số điện thoại';
                isValid = false;
            } else if (!/^[0-9]{8,11}$/.test(phone.replace(/[-. ]/g, ''))) {
                document.getElementById('phone-error').textContent = 'Số điện thoại không hợp lệ (phải có từ 8-11 số)';
                isValid = false;
            }
            
            // Validate address
            const address = document.getElementById('address').value.trim();
            if (!address) {
                document.getElementById('address-error').textContent = 'Vui lòng nhập địa chỉ';
                isValid = false;
            } else if (address.length < 5) {
                document.getElementById('address-error').textContent = 'Địa chỉ quá ngắn';
                isValid = false;
            }
            
            // Validate province, district, ward
            ['province', 'district', 'ward'].forEach(field => {
                const value = document.getElementById(field).value.trim();
                if (!value) {
                    document.getElementById(field + '-error').textContent = `Vui lòng nhập ${field === 'province' ? 'tỉnh/thành phố' : field === 'district' ? 'quận/huyện' : 'phường/xã'}`;
                    isValid = false;
                }
            });

            if (!isValid) {
                return false;
            }

            const method = document.querySelector('input[name="payment_method"]:checked').value;
            if (method === 'vnpay') {
                document.getElementById('payment-form').action = 'vnpay_php/vnpay_create_payment.php';
            }
            return true;
        }

        function selectPayment(method) {
            document.querySelectorAll('.cf-payment-option').forEach(option => {
                option.classList.remove('cf-selected');
            });
            
            const radio = document.querySelector(`input[value="${method}"]`);
            radio.checked = true;
            radio.closest('.cf-payment-option').classList.add('cf-selected');

            // Show/hide bank info
            const bankInfo = document.getElementById('bank-info');
            if (bankInfo) {
                bankInfo.style.display = method === 'bank_transfer' ? 'block' : 'none';
            }
        }
    </script>