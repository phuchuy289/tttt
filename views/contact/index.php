<div class="container">
    <div class="contact-info">
        <h3>Call</h3>
        <p>📞 +8412452656</p>
        <h3>Email</h3>
        <p>✉ TECHNOVAS@gmail.com</p>
        <h3>Address</h3>
        <p>📍 Trung My Tay, Ho Chi Minh City</p>
        <h3>Follow</h3>
        <div class="social-icons">
            <a href="#">🐦</a>
            <a href="#">📘</a>
            <a href="#">▶</a>
            <a href="#">🔗</a>
        </div>
    </div>

    <div class="contact-form">
        <?php if (isset($_SESSION['error'])): ?>
        <p style="color:red;"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></p>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
        <p style="color:green;"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></p>
        <?php endif; ?>

        <form method="POST" action="index.php?controller=contact&action=send">
            <input type="text" name="name" placeholder="Your Name" required />
            <input type="email" name="email" placeholder="Your Email" required />

            <select name="product_id">
                <option value="">-- Product you ask about --</option>
                <?php foreach ($products as $product): ?>
                <option value="<?php echo $product['id']; ?>">
                    <?php echo htmlspecialchars($product['name']); ?>
                </option>
                <?php endforeach; ?>
            </select>

            <textarea rows="5" name="message" placeholder="Message" required></textarea>

            <button type="submit">Send Message</button>
        </form>
    </div>
</div>