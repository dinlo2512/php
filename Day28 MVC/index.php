<?php
//File index gốc của ứng dụng
//Bắt buộc là index.php
//là nơi đầu tiên nhận request từ user gửi lên
//phân tích url gọi đúng controller tương ứng. -> MVC
// -> bắt buộc URL theo chuẩn định nghĩa
/*
 * Chức năng thêm mới sp:
 * index.php?controller=product&action=create
 * */

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
//echo date('d-m-Y H:i:s');
//Lấy tham số controller từ url :
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';

//Lấy action từ URL:
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

//var_dump($controller);

//+ Biến đổi controller lấy được thành tên file controller tương ứng -> nhúng file controller
$controller = ucfirst($controller);
$controller_name = $controller. "Controller";
$controller_file_path = "controllers/$controller_name.php";//Đường dẫn tới file controller
//Mọi đường dẫn phải bắt đầu từ file index gốc của ứng dụng.

if (!file_exists($controller_file_path)){
    die('Trang bạn tìm không tồn tại - 404');
}

//Nhúng file
require_once $controller_file_path;
// + Khởi tạo đối tượng từ class controller bên trong file đã nhúng:
$object = new $controller_name();// $object = new ProductController();

// + gọi phương thức tương ứng từ đối tượng trên dựa vào action check tồn tại của phương thức.
if (!method_exists($object, $action)){
    die("Phương thức $action không tồn tại trong controller $controller_name");
}

$object->$action();


