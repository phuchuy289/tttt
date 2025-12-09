 
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


<h2>Chi tiết đơn hàng #<?= $order['order_id'] ?></h2>
<p><strong>Người nhận:</strong> <?= $order['customer_name'] ?></p>
<p><strong>Địa chỉ:</strong> <?= $order['address'] ?>, <?= $order['ward'] ?>, <?= $order['district'] ?>, <?= $order['province'] ?></p>
<p><strong>SĐT:</strong> <?= $order['phone'] ?></p>

<table border="1" cellpadding="8">
    <tr>
        <th>Ảnh</th>
        <th>Sản phẩm</th>
        <th>Số lượng</th>
        <th>Giá</th>
        <th>Thành tiền</th>
    </tr>
    <?php foreach ($items as $item): ?>
    <tr>
        <td><img src="uploads/<?= $item['image'] ?>" width="60"></td>
        <td><?= $item['product_name'] ?></td>
        <td><?= $item['quantity'] ?></td>
        <td><?= number_format($item['price'], 0, ',', '.') ?>₫</td>
        <td><?= number_format($item['price'] * $item['quantity'], 0, ',', '.') ?>₫</td>
    </tr>
    <?php endforeach; ?>
</table>

<p><strong>Tổng thanh toán:</strong> <?= number_format($order['total_amount'], 0, ',', '.') ?>₫</p>
<a href="?controller=order&action=history">← Quay lại lịch sử</a>
