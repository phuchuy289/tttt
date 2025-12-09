 <!--DOCTYPE html -->
<?php

if (!isset($_SESSION['last_order'])) {
    header('Location: index.php?controller=home');
    exit;
}

$order = $_SESSION['last_order'];
?>

<!DOCTYPE html>
<html lang="vi">
<body>
    <div class="success-container">
        <div class="success-header">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h1 class="success-title">Đặt hàng thành công!</h1>
            <p class="success-message">Cảm ơn bạn đã mua hàng tại TECHNOVAS</p>
        </div>

        <div class="order-details">
            <div class="order-number">
                <i class="fas fa-receipt"></i> Mã đơn hàng: #<?php echo htmlspecialchars($order['order_id']); ?>
            </div>

            <div class="detail-row">
                <span class="detail-label">Phương thức thanh toán:</span>
                <span class="detail-value">
                    <?php 
                    if ($order['payment_method'] === 'bank_transfer') {
                        echo 'Thanh toán chuyển khoản';
                    } else if ($order['payment_method'] === 'cod') {
                        echo 'Thanh toán khi nhận hàng';
                    }
                    ?>
                </span>
            </div>

            <?php if ($order['payment_method'] === 'bank_transfer'): ?>
            <div class="bank-info">
                <h4>THÔNG TIN CHUYỂN KHOẢN:</h4>
                <p><strong>Vietcombank - Ngân hàng TMCP Ngoại Thương Việt Nam</strong></p>
                <p><strong>Chủ tài khoản:</strong> LÊ THÀNH PHÚ</p>
                <p><strong>Số tài khoản:</strong> 99344097177</p>
                <p style="margin: 10px 0 0 0; color: #000000;">
                    <strong>Nội dung chuyển khoản:</strong> <?php echo $order['order_id']; ?>
                </p>
            </div>
            <?php endif; ?>

            <div class="detail-row">
                <span class="detail-label">Tổng tiền:</span>
                <span class="detail-value" style="color: #000000; font-size: 20px; font-weight: bold;">
                    <?php echo number_format($order['total_amount']); ?>₫
                </span>
            </div>

            <div class="detail-row">
                <span class="detail-label">Trạng thái:</span>
                <span class="detail-value">
                    <span class="status-badge">
                        Chờ thanh toán
                    </span>
                </span>
            </div>
        </div>

        <div class="shipping-info">
            <h3><i class="fas fa-shipping-fast"></i> Thông tin giao hàng</h3>
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-user"></i> Người nhận:
                </span>
                <span class="detail-value"><?php echo htmlspecialchars($order['customer_name']); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-phone"></i> Số điện thoại:
                </span>
                <span class="detail-value"><?php echo htmlspecialchars($order['phone']); ?></span>
            </div>
            <div class="detail-row">
                <span class="detail-label">
                    <i class="fas fa-map-marker-alt"></i> Địa chỉ:
                </span>
                <span class="detail-value">
                    <?php 
                    echo htmlspecialchars($order['address']) . ', ' . 
                         htmlspecialchars($order['ward']) . ', ' . 
                         htmlspecialchars($order['district']) . ', ' . 
                         htmlspecialchars($order['province']);
                    ?>
                </span>
            </div>
        </div>

        <div class="button-container">
            <a href="index.php?controller=home" class="home-button">
                <i class="fas fa-shopping-cart"></i> Tiếp tục mua sắm
            </a>
        </div>
    </div>

    <?php
    // Xóa thông tin đơn hàng khỏi session sau khi hiển thị
    unset($_SESSION['last_order']);
    ?>
