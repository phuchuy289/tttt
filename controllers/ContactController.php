<?php
require_once 'controllers/BaseController.php';
require_once 'models/Contact.php';
require_once 'models/Product.php';

class ContactController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'contact';
    }

    public function index()
    {
        $products = Contact::getProducts();
        $data = ['products' => $products];
        $this->render('index', $data);
    }

    public function send()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?controller=contact&action=index');
            exit;
        }

        if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
            $_SESSION['contact_error'] = "Vui lòng nhập đầy đủ thông tin!";
            header('Location: index.php?controller=contact&action=index');
            exit;
        }

        Contact::create($_POST['name'], $_POST['email'], $_POST['product'], $_POST['message']);
        $_SESSION['contact_success'] = "Gửi liên hệ thành công!";
        header('Location: index.php?controller=contact&action=index');
        exit;
    }
}