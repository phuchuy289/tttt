<?php
require_once('controllers/BaseController.php');
require_once('models/Cart.php');
require_once('models/Order.php');

class PaymentController extends BaseController
{
    private $orderModel;

    public function __construct()
    {
        $this->folder = 'payment';
        $this->orderModel = new Order();
    }
// Hiển thị trang thanh toán
    public function thanhtoan()
    {
        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?controller=account&action=login');
            exit;
        }

        $user_id = $_SESSION['user_id'];
        $cart_items = Cart::getCartItems($user_id);

        if (empty($cart_items)) {
            $_SESSION['error'] = "Giỏ hàng trống";
            header('Location: index.php?controller=cart');
            exit;
        }

        $data = array('cart_items' => $cart_items);
        $this->render('thanhtoan', $data);
    }

    public function placeOrder()
    {
        try {
            if (!isset($_SESSION['user_id'])) {
                header('Location: index.php?controller=account&action=login');
                exit;
            }

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: index.php?controller=payment&action=thanhtoan');
                exit;
            }

            // Validate form data
            $required_fields = ['name', 'phone', 'address', 'ward', 'district', 'province', 'payment_method'];
            foreach ($required_fields as $field) {
                if (empty($_POST[$field])) {
                    throw new Exception("Vui lòng điền đầy đủ thông tin");
                }
            }

            $user_id = $_SESSION['user_id'];
            $cart_items = Cart::getCartItems($user_id);
            
            if (empty($cart_items)) {
                throw new Exception("Giỏ hàng trống");
            }

            // Tính tổng tiền
            $total_amount = 0;
            $items = [];
            foreach ($cart_items as $item) {
                $total_amount += $item['price'] * $item['quantity'];
                $items[] = [
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price']
                ];
            }

            // Tạo mã đơn hàng
            $order_id = time() . rand(10000, 99999);

            // Chuẩn bị dữ liệu đơn hàng
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
                'payment_method' => $_POST['payment_method'],
                'items' => $items
            ];

            // Tạo đơn hàng
            $this->orderModel->createOrder($orderData);

            // Xóa giỏ hàng
            Cart::clearCart($user_id);

            // Lưu thông tin đơn hàng vào session
            $_SESSION['last_order'] = [
                'order_id' => $order_id,
                'payment_method' => $_POST['payment_method'],
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
}
?>
