<?php
    include_once('controllers/BaseController.php');
    include_once('models/User.php');
    include_once('utils/account.php');
    include_once('utils/redirect.php');

    class AccountController extends BaseController {
        public function __construct() {
            $this->folder = 'account';
        }

        public function login() {
            
            if (isset($_COOKIE['remember_token'])) {
                $user = User::getUserByToken($_COOKIE['remember_token']);
                if ($user) {
                    // Người dùng đã đăng nhập, lưu vào session và chuyển hướng
                    setUserLogin(serialize($user));
                    if ($user->role_id == 2) {
                        redirect("?controller=dashboard&action=index");
                    } else {
                        redirect("?controller=home&action=index");
                    }
                    return;
                }
            }

            if (isset($_POST['btn_submit'])) {
                $username = $_POST['tk'];
                $password = $_POST['mk'];

                if (empty($username) || empty($password)) {
                    $message = "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu";
                    $this->render('login', array("message" => $message));
                    return;
                }

                // Kiểm tra tên đăng nhập và mật khẩu
                $user = User::login($username, $password);
                if ($user) {
                    // Lưu thông tin user vào session
                    $_SESSION['user_id'] = $user->id;
                    setUserLogin(serialize($user));

                    // Ghi nhớ đăng nhập
                    if (isset($_POST['remember_me'])) {
                        $token = bin2hex(random_bytes(32)); // Tạo token ngẫu nhiên
                        setcookie('remember_token', $token, time() + (86400 * 30), "/", "", false, true); // Lưu cookie trong 30 ngày
                        User::updateRememberToken($user->id, $token);  // Cập nhật token vào DB
                    }

                    // Kiểm tra role_id và chuyển hướng
                    if ($user->role_id == 2) {
                        redirect("?controller=dashboard&action=index");
                    } else {
                        redirect("?controller=home&action=index");
                    }
                } else {
                    $message = "Sai tên đăng nhập hoặc mật khẩu";
                    $this->render('login', array("message" => $message));
                }
            } else {
                $this->render('login');
            }
        }

        public function logout() {
            // Xử lý logout
            if (isset($_SESSION['user_id'])) {
                User::updateRememberToken($_SESSION['user_id'], null); // Xóa token trong DB
            }
            setcookie('remember_token', '', time() - 3600, "/"); // Xóa cookie
            setUserLogout();  // Xóa thông tin người dùng khỏi session
            redirect("?controller=home&action=index");
        }

        public function register() {
            if (isset($_POST['btn_submit'])) {
                $username = $_POST['text_username'];
                $email = $_POST['text_email'];
                $password = $_POST['text_password'];

                // Đăng ký người dùng mới
                $user = User::signup($username, $email, $password);

                if ($user) {
                    // Đăng ký thành công, hiển thị thông báo
                    $message = "Đăng ký thành công";
                } else {
                    // Đăng ký thất bại, hiển thị thông báo lỗi
                    $message = "Đăng ký thất bại, vui lòng thử lại";
                }

                $this->render('register', array("message" => $message));
            } else {
                $this->render('register', array("message" => ""));
            }
        }

        public function changePassword() {
            // Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login
            if (!isUserLoggedIn()) redirect("?controller=account&action=login");
            $user = getUserLoggedIn();  // Lấy thông tin người dùng từ session

            if (isset($_POST['btn_submit'])) {
                $oldPassword = $_POST['old_password'];
                $newPassword = $_POST['new_password'];
                $confirmPassword = $_POST['confirm_password'];

                if (empty($oldPassword) || empty($newPassword) || empty($confirmPassword)) {
                    $this->render('changePassword', ["message" => "Vui lòng nhập đầy đủ thông tin"]);
                    return;
                }
                
                
                if ($newPassword !== $confirmPassword) {
                    $this->render('changePassword', ["message" => "Mật khẩu mới và xác nhận mật khẩu không khớp"]);
                    return;
                }

                // Kiểm tra mật khẩu cũ
                $currentUser = User::getUserById($user->id);
                if (!$currentUser) {
                    $this->render('changePassword', ["message" => "Unknown error"]);
                    return;
                }

                if ($currentUser->password !== $oldPassword) {
                    $this->render('changePassword', ["message" => "Mật khẩu cũ không chính xác"]);
                    return;
                } else {
                    // Cập nhật mật khẩu mới
                    $updateStatus = User::changePassword($currentUser->id, $newPassword);
                    $message = $updateStatus ? "Mật khẩu đã được thay đổi thành công" : "Đã xảy ra lỗi trong quá trình thay đổi mật khẩu";
                    if ($updateStatus) {
                        $currentUser->password = $newPassword;
                        setUserLogin(serialize($currentUser));  // Cập nhật lại thông tin người dùng trong session
                    }

                    $this->render('changePassword', ["message" => $message]);
                }
            } else {
                $this->render('changePassword', ["message" => ""]);
            }
        }

        public function updateProfile() {
            // Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login
            if (!isUserLoggedIn()) {
                redirect("?controller=account&action=login");
            }

            $user = getUserLoggedIn();

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                $username = $_POST['username'] ?? '';
                $name = $_POST['name'] ?? '';
                $email = $_POST['email'] ?? '';
                $phone = $_POST['phone'] ?? '';
                $gender = $_POST['gender'] ?? '';

                if (empty($name) || empty($email) || empty($phone) ||  empty($username)) {
                    $this->render('editProfile', [
                        "message" => "Vui lòng nhập đầy đủ thông tin",
                        "user" => $user
                    ]);
                    return;
                }

                // Cập nhật thông tin người dùng
                $updateStatus = User::updateProfile($user->id, $name, $email, $phone, $gender, $username);

                if ($updateStatus) {
                    // Cập nhật session user
                    $user->username = $username;
                    $user->name = $name;
                    $user->email = $email;
                    $user->phone = $phone;
                    $user->gender = $gender;
                    setUserLogin(serialize($user));

                    // Sau khi cập nhật đưa tới trang user
                    header("Location: ?controller=home&action=user");
                    exit;
                } else {
                    $this->render('editProfile', [
                        "message" => "Đã xảy ra lỗi khi cập nhật thông tin",
                        "user" => $user
                    ]);
                    return;
                }
            }

            // GET: Hiển thị form với thông báo thành công nếu có
            $message = "";
            if (isset($_GET['success']) && $_GET['success'] == 1) {
                $message = "Cập nhật thông tin thành công";
            }

            $this->render('editProfile', [
                "message" => $message,
                "user" => $user
            ]);
        }
    }
?>
