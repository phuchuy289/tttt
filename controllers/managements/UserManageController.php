<?php

include_once('controllers/BaseController.php');
include_once('models/User.php');
include_once('utils/account.php');
include_once('utils/redirect.php');

class UserManageController extends BaseController
{
    public function __construct()
    {
        $this->folder = 'managements/user';
    }


    public function index(): void
    {
       
        $users = User::getAllUsers(); // Giả sử bạn có phương thức getAllUsers trong model User để lấy tất cả người dùng

        // Truyền dữ liệu người dùng vào view
        $this->render('index', ['users' => $users], 'admin');
    }

    public function deleteUser(): void
{
    // Lấy ID người dùng từ query string
    if (isset($_GET['id'])) {
        $userId = $_GET['id']; // Lấy ID từ query string
    } else {
        // Nếu không có id, redirect về trang danh sách người dùng
        header('Location: ?controller=userManage&action=index');
        exit;
    }

    // Gọi phương thức deleteUser trong model User để xóa người dùng
    if (User::deleteUser($userId)) {
        // Nếu xóa thành công, chuyển hướng lại trang danh sách người dùng
        header('Location: ?controller=userManage&action=index');
        exit;
    } else {
        // Nếu có lỗi, bạn có thể hiển thị thông báo lỗi ở đây
        echo "Lỗi khi xóa người dùng!";
    }
}

}
