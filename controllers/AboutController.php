<?php
include_once('controllers/BaseController.php');

class AboutController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'about';
    }

    public function index(){
        $this->render('index');
    }
}

// End of AboutController.php
