<?php

include_once('controllers/BaseController.php');
include_once('models/Product.php');
include_once('utils/account.php');
include_once('utils/redirect.php');

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
            $cate_id = $_POST['mainCategory'];

            // Xử lý upload ảnh
            $imagePath = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $uploadDir = 'assets/uploads/';

                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0777, true);
                }

                $fileName = time() . '_' . basename($_FILES['image']['name']);
                $filePath = $uploadDir . $fileName;

                if (move_uploaded_file($_FILES['image']['tmp_name'], $filePath)) {
                    $imagePath = $filePath;
                } else {
                    die("Lỗi upload ảnh!");
                }
            }

            // Lưu DB
            $result = Product::addProduct($name, $desc, $price, $cate_id, $imagePath);

            if ($result) {
                redirect('?controller=productManage&action=index');
                exit;
            } else {
                echo "Có lỗi khi thêm sản phẩm.";
            }
        }

        $this->render('index', [], 'admin');
    }
}