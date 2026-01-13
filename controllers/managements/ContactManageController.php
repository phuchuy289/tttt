<?php
require_once 'controllers/BaseController.php';
require_once 'models/Contact.php';

class ContactManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/contact';
    }

    public function index()
    {
        $contacts = Contact::getAll();
        $data = ['contacts' => $contacts];
        $this->render('index', $data);
    }

    public function delete()
    {
        if (!isset($_GET['id'])) {
            header('Location: index.php?controller=managements&action=contactManage');
            exit;
        }

        Contact::delete($_GET['id']);
        header('Location: index.php?controller=managements&action=contactManage');
        exit;
    }
}