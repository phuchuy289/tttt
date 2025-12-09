<?php

include_once('controllers/BaseController.php');
include_once('models/User.php');
include_once('utils/account.php');
include_once('utils/redirect.php');
include_once('models/Product.php');
class Add_productManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/add_product';
    }


   public function index(): void
{
    if (isset($_POST['btn'])) {
    $name = $_POST['productName'];
    $desc = $_POST['description'];
    $price = $_POST['price'];
    $img = $_POST['imageUrl'];
    $cate_id = $_POST['mainCategory'];  

    // Lưu sản phẩm vào cơ sở dữ liệu
    $result = Product::addProduct($name, $desc, $price, $cate_id, $img);

    if ($result) {
        redirect('?controller=productManage&action=index');
        echo "Sản phẩm đã được thêm!";
    } else {
        echo "Có lỗi khi thêm sản phẩm.";
    }
}

    // Render lại view nếu không có lỗi
    $this->render('index', [], 'admin');
}

    
}

