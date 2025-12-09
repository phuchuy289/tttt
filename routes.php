
<?php
    $controllers = array(
        'account' => ['login', 'register', 'logout', 'changePassword', 'updateProfile'],
        'home' => ['index', 'error','user'],
        'payment' => ['thanhtoan', 'thanhtoan_tienmat'],
        'about' => ['index'],
        'contact' => ['index'],
        'cart' => ['index', 'add', 'remove'],
        'order' => ['success','placeOrder','checkout', 'history', 'detail'],
        'product' => ['index','search','detail'],
        'dashboard' => ['index','logout'],
        'managements' =>
            array(
                'productManage' => ['index', 'deleteProduct'],
                'userManage' => ['index', 'deleteUser'],
                'orderManage' => ['index'],
                'add_productManage' => ['index'],
                'edit_productManage' => ['index'],
            )

    ); // Các controllers trong hệ thống và các action có thể gọi ra từ controller đó.

    // Nếu các tham số nhận được từ URL không hợp lệ (không thuộc list controller và action có thể gọi
    // thì trang báo lỗi sẽ được gọi ra.

    if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
        if (!array_key_exists($controller, $controllers['managements']) || !in_array($action, $controllers['managements'][$controller])) {
            $controller = 'home';
            $action = 'error';
        }
    }

    // Nhúng file định nghĩa controller vào để có thể dùng được class định nghĩa trong file đó
    $controllerName = ucfirst($controller) . 'Controller';


    // Kiểm tra nếu controller có chứa string 'manage' thì import theo path controllers/managements
    if (str_contains($controller, "Manage")) {
        include_once('controllers/managements/' . $controllerName . '.php');
    } else {
        include_once('controllers/' . $controllerName . '.php');
    }

    // Tạo ra tên controller class từ các giá trị lấy được từ URL sau đó gọi ra để hiển thị trả về cho người dùng.
    $controller = new $controllerName;
    $controller->$action();