<?php

include_once('controllers/BaseController.php');
include_once('models/User.php');
include_once('utils/account.php');
include_once('utils/redirect.php');
include_once('models/Product.php');

class ProductManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/product';
    }


    public function index(): void
    {
      
        $products = Product::getAll(); // Giả sử bạn đã có phương thức getAll trong model Product

        // Truyền dữ liệu vào view
        $this->render('index', ['products' => $products], 'admin');
    }

    public function deleteProduct(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $productId = $_POST['id'];  // Dùng POST thay vì GET để nhận ID
            echo $productId;

            // Gọi hàm xóa trong Model
            $result = Product::deleteProductById($productId);

            if ($result) {
                redirect('?controller=productManage&action=index');
            } else {
                echo "Xóa sản phẩm thất bại.";
            }
        } else {
            echo "Không tìm thấy ID sản phẩm cần xóa.";
        }
    }


}
