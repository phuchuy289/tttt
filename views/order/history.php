<style>

h2 {
    color: #2f3640;
    border-bottom: 2px solid #2f3640;
    padding-bottom: 8px;
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffffff;
    box-shadow: 0 0 8px rgba(0,0,0,0.1);
    border-radius: 8px;
    overflow: hidden;
}

table th, table td {
    padding: 12px 16px;
    text-align: left;
    border-bottom: 1px solid #eee;
}

table th {
    background-color: #f1f2f6;
    color: #2f3640;
    font-weight: 600;
}

table tr:hover {
    background-color: #f9f9f9;
}

a {
    color: #0984e3;
    text-decoration: none;
    font-weight: bold;
}

a:hover {
    text-decoration: underline;
}

img {
    border-radius: 6px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

p {
    margin-bottom: 8px;
}

strong {
    color: #2f3640;
}

.back-link {
    display: inline-block;
    margin-top: 20px;
    background-color: #0984e3;
    color: #fff;
    padding: 10px 16px;
    border-radius: 6px;
    text-decoration: none;
    transition: background 0.3s ease;
}

.back-link:hover {
    background-color: #0652dd;
}
</style>


<h2>Lịch sử đơn hàng</h2>

<?php if (empty($orders)): ?>
    <p>Bạn chưa có đơn hàng nào.</p>
<?php else: ?>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Ngày đặt</th>
            <th>Phương thức thanh toán</th>
            <th>Trạng thái</th>
            <th>Tổng tiền</th>
            <th>Chi tiết</th>
        </tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?= htmlspecialchars($order['order_id']) ?></td>
                <td><?= $order['created_at'] ?></td>
                <td><?= strtoupper($order['payment_method']) ?></td>
                <td><?= $order['payment_status'] === 'paid' ? 'Đã thanh toán' : 'Chờ xử lý' ?></td>
                <td><?= number_format($order['total_amount'], 0, ',', '.') ?>₫</td>
                <td><a href="index.php?controller=order&action=detail&id=<?= $order['order_id'] ?>">Xem</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<!-- partial -->