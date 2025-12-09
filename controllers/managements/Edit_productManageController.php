<?php

include_once('controllers/BaseController.php');
include_once('models/User.php');
include_once('utils/account.php');
include_once('utils/redirect.php');
include_once('models/Product.php');

class Edit_productManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/edit_product';
    }

    public function index(): void
    {
        
        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            echo "Không tìm thấy sản phẩm để chỉnh sửa.";
            return;
        }

        $productId = (int)$_GET['id'];

        // Lấy thông tin chi tiết sản phẩm từ cơ sở dữ liệu
        $product = Product::getProductById($productId);

        if (!$product || !is_array($product)) {
            echo "Sản phẩm không tồn tại.";
            return;
        }

        // Xử lý khi biểu mẫu được gửi để cập nhật sản phẩm
        if (isset($_POST['btn'])) {
            $name = $_POST['productName'] ?? '';
            $desc = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? 0;
            $img = $_POST['imageUrl'] ?? '';
            $cate_id = $_POST['mainCategory'] ?? 0;

            // Kiểm tra dữ liệu đầu vào
            if (empty($name) || empty($price) || empty($cate_id) || empty($img)) {
                echo "Vui lòng điền đầy đủ thông tin.";
                return;
            }

            // Cập nhật sản phẩm trong cơ sở dữ liệu
            $result = Product::updateProduct($productId, $name, $desc, $price, $cate_id, $img);

            if ($result === true) {
                redirect('?controller=productManage&action=index');
            } else {
                echo "Có lỗi khi cập nhật sản phẩm: " . htmlspecialchars($result);
            }
        }

        // Hiển thị giao diện chỉnh sửa sản phẩm với dữ liệu sản phẩm
        $data = ['product' => $product];
        $this->render('index', $data, 'admin');
    }
}