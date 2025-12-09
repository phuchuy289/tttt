<?php
include_once('controllers/BaseController.php');
include_once('models/Cart.php');

class CartController extends BaseController {
    public function __construct() {
        $this->folder = 'cart';
        
    }
// Hiển thị giỏ hàng
    public function index() {
        $user_id = $_SESSION['user_id'] ?? 0;
        $cart_items = Cart::getCartItems($user_id);
        $data = ['cart_items' => $cart_items];
        $this->render('index', $data);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $product_id = $_POST['product_id'] ?? '';
            $product_name = $_POST['product_name'] ?? '';
            $product_price = $_POST['product_price'] ?? 0;
            $product_image = $_POST['product_image'] ?? '';
            $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
            $user_id = $_SESSION['user_id'] ?? 0;

            if ($product_id && $product_name && $product_price && $user_id) {
                Cart::addToCart($user_id, $product_id, $product_name, $product_price, $product_image, $quantity);
                header("Location: ?controller=cart&action=index");
                exit;
            } else {
                $_SESSION['error'] = "Lỗi khi thêm sản phẩm vào giỏ hàng!";
                header("Location: ?controller=cart&action=index");
                exit;
            }
        }
    }

    public function remove() {
        if (isset($_GET['id'])) {
            $cart_id = $_GET['id'];
            $user_id = $_SESSION['user_id'] ?? 0;

            Cart::removeFromCart($user_id, $cart_id);
            $_SESSION['message'] = "Sản phẩm đã được xóa khỏi giỏ hàng!";
        }

        header("Location: ?controller=cart&action=index");
        exit;
    }
}
