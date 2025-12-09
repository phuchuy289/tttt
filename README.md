# Web_TMDT_UTH 🛒

## 📖 Giới thiệu
Đây là mã nguồn của dự án Website Thương mại Điện tử (TMĐT), được phát triển như một bài tập môn học tại trường **Đại học Giao thông Vận tải TP.HCM (UTH)**.

Dự án được xây dựng theo mô hình **MVC (Model-View-Controller)** sử dụng ngôn ngữ **PHP** thuần, giúp code rõ ràng, dễ quản lý và phát triển.

## 🚀 Công nghệ sử dụng
* **Backend**: PHP (theo mô hình MVC)
* **Frontend**: HTML5, CSS3, JavaScript
* **Database**: MySQL
* **Công cụ khác**: XAMPP(để chạy server localhost)

*** ⚙️ Hướng dẫn cài đặt & Chạy dự án**

Để chạy dự án này trên máy cục bộ (localhost), hãy làm theo các bước sau:

**Bước 1: Clone dự án**

Mở terminal hoặc Git Bash và chạy lệnh:
git clone [https://github.com/NDChung9999/Web_TMDT_UTH.git](https://github.com/NDChung9999/Web_TMDT_UTH.git)

**Bước 2: Cấu hình Database**

Mở phpMyAdmin (thường là http://localhost/phpmyadmin).

Tạo một cơ sở dữ liệu mới (Ví dụ tên là: tmdt_db).

Kiểm tra trong thư mục dự án vào folder Database lấy db để Import vào database vừa tạo (nếu không có, bạn cần tự tạo bảng dựa trên các file trong thư mục models).

Mở file connection.php và cập nhật thông tin kết nối cho phù hợp với máy của bạn

**Bước 3: Chạy dự án**

Copy thư mục Web_TMDT_UTH vào thư mục htdocs của XAMPP (hoặc www của WAMP).
Mở trình duyệt và truy cập đường dẫn:
http://localhost/Web_TMDT_UTH
