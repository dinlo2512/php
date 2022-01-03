<?php
//Code API theo cơ chế RESTFUL API
//tạo các URL sau cho ứng dụng CRUD
/*
 * api.php theo method = GET lấy danh sách sp
 * api.php theo method = POST thêm mới sản phẩm
 *         theo method = PUT cập nhật sản phẩm
 *         theo method = DELETE xóa sản phẩm
 * */

require_once 'connection.php';
//set các header cần thiết để trả về dữ liệu
header('Content-Type: application/json');

//Đọc nội dung từ client/frontend gửi lên
$data = file_get_contents("php://input");
//var_dump($data);

//Lấy phương thức gửi lên từ client
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        //Chức năng liệt kê sản phẩm
        //+ tương tác với cơ sở dữ liệu
        $sql_select_all = "SELECT * FROM products";
        $obj_select_all = mysqli_query($connection, $sql_select_all);

        $products = mysqli_fetch_all($obj_select_all, MYSQLI_ASSOC);

        //không trả kiểu dữ liệu về JSON
        $json = json_encode($products);//chuyển kiểu dữ liệu sang JSON
        //var_dump($json);

        //set mã trả về cho client
        http_response_code(200); //200 gọi API thành công
        //trả dữ liệu JSON về cho client
        echo $json;
        break;
    case 'POST'://API thêm mới
//        var_dump($data);
        $data = json_decode($data);
        //ép sang kiểu mảng
        $data = (array) $data;

        $name   = $data['name'];
        $price  = $data['price'];
        $desc   = $data['description'];

        //viết truy vấn
        $sql_insert = "INSERT INTO products(name, price, description) VALUES ('$name',$price,'$desc')";
        $is_insert = mysqli_query($connection,$sql_insert);

        if ($is_insert){
            $response = [
              'message'  => 'Thêm sp thành công',
            ];
            http_response_code(201);
            echo json_encode($response);//trả response về cho client dưới dạng JSON
        }else{
            $response = [
              'message' => 'Thêm sp thất bại',
            ];
            http_response_code(500);//lỗi code
            echo json_encode($response);//trả response về cho client dưới dạng JSON
        }



        break;
//    case 'PUT':
//        break;
    case 'DELETE':
        $data = json_decode($data); //giải mã chuỗi json
        $data = (array) $data;

        $id = $data['id'];

        $sql_delete = "DELETE FROM products WHERE id = $id";
        $is_delete = mysqli_query($connection,$sql_delete);

        if ($is_delete){
            $response = [
                'message'  => 'Xóa sp thành công',
            ];
            http_response_code(200);
            echo json_encode($response);
        }else{
            $response = [
                'message' => 'Xóa sp thất bại',
            ];
            http_response_code(500);//lỗi code
            echo json_encode($response);
        }


        break;
}