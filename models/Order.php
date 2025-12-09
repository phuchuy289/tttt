<?php
class Order {
    private $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }

    public function createOrder($orderData) {
        try {
            
            $this->db->beginTransaction();

            // Thêm vào bảng orders
            $sql = "INSERT INTO orders (order_id, user_id, customer_name, phone, address, ward, district, province, total_amount, payment_method, payment_status) 
                   VALUES (:order_id, :user_id, :customer_name, :phone, :address, :ward, :district, :province, :total_amount, :payment_method, :payment_status)";
            
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':order_id' => $orderData['order_id'],
                ':user_id' => $orderData['user_id'],
                ':customer_name' => $orderData['customer_name'],
                ':phone' => $orderData['phone'],
                ':address' => $orderData['address'],
                ':ward' => $orderData['ward'],
                ':district' => $orderData['district'],
                ':province' => $orderData['province'],
                ':total_amount' => $orderData['total_amount'],
                ':payment_method' => $orderData['payment_method'],
                ':payment_status' => $orderData['payment_method'] === 'vnpay' ? 'paid' : 'pending'
            ]);

            // Thêm các sản phẩm vào order_items
            $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:order_id, :product_id, :quantity, :price)";
            $stmt = $this->db->prepare($sql);

            foreach ($orderData['items'] as $item) {
                $stmt->execute([
                    ':order_id' => $orderData['order_id'],
                    ':product_id' => $item['product_id'],
                    ':quantity' => $item['quantity'],
                    ':price' => $item['price']
                ]);
            }

            // Commit transaction
            $this->db->commit();
            return true;

        } catch (Exception $e) {
            // Rollback nếu có lỗi
            $this->db->rollBack();
            throw $e;
        }
    }

    public function getOrderById($orderId) {
        $sql = "SELECT * FROM orders WHERE order_id = :order_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':order_id' => $orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getOrderItems($orderId) {
        $sql = "SELECT oi.*, p.name as product_name, p.image 
                FROM order_items oi 
                JOIN products p ON oi.product_id = p.id 
                WHERE oi.order_id = :order_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':order_id' => $orderId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUserOrders($userId) {
        $sql = "SELECT * FROM orders WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll() {
    $sql = "SELECT * FROM orders ORDER BY id DESC";
    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

public function history()
{
    if (!isset($_SESSION['user_id'])) {
        header('Location: index.php?controller=account&action=login');
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $orders = $this->orderModel->getUserOrders($user_id);

    $data = ['orders' => $orders];
    $this->render('history', $data); // views/order/history.php
}


}    
?>
