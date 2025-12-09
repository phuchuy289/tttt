<?php
include_once('controllers/BaseController.php');
include_once('models/Product.php');
class ProductController extends BaseController{
    public function __construct()
    {
        $this->folder = 'product';
    }
    public function index() {
        $this->render('product_all');
    }
    public function detail() {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $product = Product::getProductById($id);
    
            if ($product) {
                $this->render('product_detail', array("product" => $product));
            } else {
                echo "Không tìm thấy sản phẩm.controllers";
            }
        } else {
            echo "Thiếu ID sản phẩm.";
        }
    }

    public function search() {
        
        if (isset($_GET['search_query']) && !empty($_GET['search_query']) && isset($_GET['submit_search'])) {
            $search_query = $_GET['search_query'];

            // Tìm sản phẩm với từ khóa tìm kiếm
            $products = Product::searchProducts($search_query);

            // Hiển thị kết quả tìm kiếm
            $this->render('search_results', array('products' => $products));
        } else {
            // Nếu không có từ khóa, hiển thị thông báo
            $this->render('search_results', array('products' => [], 'message' => 'Không tìm thấy sản phẩm.'));
        }
    }
}