<?php
include_once('controllers/BaseController.php');
// include model nếu cần
class ContactController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'contact';
    }
    public function index(){
        $this->render('index');
    }
}