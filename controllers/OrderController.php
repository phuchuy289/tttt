<?php
require_once('controllers/BaseController.php');
require_once('models/Cart.php');
require_once('models/Order.php');

class OrderController extends BaseController
{
    private $orderModel;

    public function __construct()
    {
        $this->folder = 'order';
        $this->orderModel = new Order();
    }

    public function success()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['last_order'])) {
            header('Location: index.php?controller=home');
            exit;
        }

        $this->render('success');
    }
// Hiển thị trang thanh toán
    public function checkout()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=account&action=login');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $cartItems = Cart::getCartItems($user_id);

        if (empty($cartItems)) {
            $_SESSION['error'] = "Giỏ hàng của bạn trống!";
            header('Location: index.php?controller=cart');
            exit;
        }

        $data = ['cartItems' => $cartItems];
        $this->render('checkout', $data);
    }

    public function placeOrder()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=account&action=login');
            exit;
        }

        try {
            // Kiểm tra dữ liệu POST
            $required_fields = ['name', 'phone', 'address', 'ward', 'district', 'province'];
            foreach ($required_fields as $field) {
                if (empty($_POST[$field])) {
                    throw new Exception("Vui lòng điền đầy đủ thông tin giao hàng");
                }
            }

            $user_id = $_SESSION['user_id'];
            $cartItems = Cart::getCartItems($user_id);

            if (empty($cartItems)) {
                throw new Exception("Giỏ hàng trống, không thể đặt hàng!");
            }

            // Tính tổng tiền và chuẩn bị items
            $total_amount = 0;
            $items = [];
            foreach ($cartItems as $item) {
                if (empty($item['product_id'])) {
                    throw new Exception("Lỗi dữ liệu sản phẩm trong giỏ hàng");
                }
                $total_amount += $item['price'] * $item['quantity'];
                $items[] = [
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }

            // Tạo mã đơn hàng
            $order_id = time() . rand(10000, 99999);

            $orderData = [
                'order_id' => $order_id,
                'user_id' => $user_id,
                'customer_name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'ward' => $_POST['ward'],
                'district' => $_POST['district'],
                'province' => $_POST['province'],
                'total_amount' => $total_amount,
                'payment_method' => $_POST['payment_method'] ?? 'cod',
                'items' => $items
            ];

            // Tạo đơn hàng
            $this->orderModel->createOrder($orderData);

            // Xóa giỏ hàng
            Cart::clearCart($user_id);

            // Lưu thông tin đơn hàng vào session
            $_SESSION['last_order'] = [
                'order_id' => $order_id,
                'payment_method' => $orderData['payment_method'],
                'total_amount' => $total_amount,
                'customer_name' => $_POST['name'],
                'phone' => $_POST['phone'],
                'address' => $_POST['address'],
                'ward' => $_POST['ward'],
                'district' => $_POST['district'],
                'province' => $_POST['province']
            ];

            header('Location: index.php?controller=order&action=success');
            exit;

        } catch (Exception $e) {
            $_SESSION['error'] = $e->getMessage();
            header('Location: index.php?controller=payment&action=thanhtoan');
            exit;
        }
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


    public function detail()
{
    if (!isset($_GET['id'])) {
        header('Location: index.php?controller=order&action=history');
        exit;
    }

    $orderId = $_GET['id'];
    $order = $this->orderModel->getOrderById($orderId);
    $items = $this->orderModel->getOrderItems($orderId);

    if (!$order || $order['user_id'] != $_SESSION['user_id']) {
        echo "Không tìm thấy đơn hàng.";
        return;
    }

    $data = ['order' => $order, 'items' => $items];
    $this->render('detail', $data); // views/order/detail.php
}


}
?>
