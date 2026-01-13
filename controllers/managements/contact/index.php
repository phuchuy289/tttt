<div class="container">
    <h2>📩 DANH SÁCH LIÊN HỆ</h2>

    <?php if (empty($data['contacts'])): ?>
    <p>Không có liên hệ nào.</p>

    <?php else: ?>
    <table border="1" cellpadding="10" cellspacing="0" style="width:100%; border-collapse:collapse;">
        <tr>
            <th>ID</th>
            <th>Tên khách</th>
            <th>Email</th>
            <th>Sản phẩm</th>
            <th>Nội dung</th>
            <th>Ngày gửi</th>
            <th>Hành động</th>
        </tr>

        <?php foreach ($data['contacts'] as $c): ?>
        <tr>
            <td><?= $c['id']; ?></td>
            <td><?= htmlspecialchars($c['name']); ?></td>
            <td><?= htmlspecialchars($c['email']); ?></td>
            <td><?= $c['product'] ?: 'Không chọn'; ?></td>
            <td><?= nl2br(htmlspecialchars($c['message'])); ?></td>
            <td><?= $c['created_at']; ?></td>
            <td>
                <a href="index.php?controller=managements&action=contactManage&method=delete&id=<?= $c['id']; ?>"
                    onclick="return confirm('Bạn chắc muốn xóa?')">
                    ❌ Xóa
                </a>
            </td>
        </tr>
        <?php endforeach; ?>

    </table>
    <?php endif; ?>
</div>