<?php
include_once('controllers/BaseController.php');
include_once('models/Student.php');
include_once('models/Product.php');
include_once('models/User.php');
class HomeController extends BaseController {
    public function __construct() {
        $this->folder = 'home';
    }

    public function user(){
        $user = getUserLoggedIn();
        $this->render('user',array('user' => $user));
    }

    public function index() {
       
        $flashSaleProducts = Product::getAll('Flash Sale');
        $bestSellingProducts = Product::getAll('Best Selling Products');
        $ourProducts = Product::getAll('Our Products');

        // Truyền các sản phẩm vào view
        $this->render('index', array(
            "flashSaleProducts" => $flashSaleProducts,
            "bestSellingProducts" => $bestSellingProducts,
            "ourProducts" => $ourProducts
        ));
    }
    public function error() {
        $this->render('error');
    }

}
