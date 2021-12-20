<?php
/*
 * Từ khóa LIKE: so sánh tương đối
 * SELECT * FORM product WHERE name = 'laptop'; Tìm kiếm tuyệt đối
 * tìm kiếm tương đối
 * SELECT * FORM product WHERE name LIKE '%laptop%'
 *
 *
 * ORDER BY: sắp xếp theo chiều ..
 * SELECT * FROM product ORDER BY id DESC
 * DESC: giảm dần
 * SELECT * FROM product ORDER BY create_at ASC
 * ASC: tăng dần
 *
 *
 * BETWEEN: thay thế cho >=  AND <=
 * SELECT * FROM product WHERE id BETWEEN 1 AND 3
 *
 *
 * SELECT * FROM product WHERE id IN(1,2,3);
 *
 *
 * SELECT COUNT(id) as count_id FROM product;
 *
 * MIN,MAX
 * SELECT MAX(id) as max_id, MIN(id) as min_id FROM product;
 *
 * GROUP BY: nhóm các giá trị theo trường
 * SELECT price, COUNT(id) as count_id FORM product GROUP BY price //đếm các sản phẩm cùng giá
 *
 *
 * JOIN
 * JOIN trong SQL có 3 kiểu chính
 * dùng thao tác với JOIN bắt buộc sử dụng tên bảng trước tên trường
 * INNER JOIN
 * SELECT products.*, categories.* FROM product
 * INNER JOIN categories ON product.category_id = category.id
 *
 * LEFT JOIN
 * RIGHT JOIN
 *
 * */

//Connect.php
//Cách PHP tương tác với cơ sở dữ liệu MySQL
//sử dụng thư viện: mysqli (i= improve) , pdo(PHP data object) hỗ trợ nhiều csdl khác nhau
//- Các bước kết nối:
//Tạo ra hằng số kết nối
// Lưu thông tin máy chủ chứa csdl kết nối
const DB_HOST = 'localhost';
//Username dùng để kết nối vào csdl
const DB_USERNAME = 'root';
//Password connect
const DB_PASSWORD = '';
//tên cơ sở dữ liệu muốn kết nối
const DB_NAME = 'db_demo_join';
//cổng kết nối
const DB_PORT = 3306;

//kết nối csdl và thực hiện truy vấn
$connection = mysqli_connect(DB_HOST,DB_USERNAME, DB_PASSWORD, DB_NAME,DB_PORT);
if (!$connection){
    die("Lỗi kết nối" .mysqli_connect_error());
}
echo "<h2>Kết nối CSDL thành công</h2>";

//INSERT, UPDATE, SELECT
//B1: Viết câu truy vấn
//$sql_insert = "INSERT INTO products(name, price, description) VALUES('Máy tính DELL', 2000, 'Mô tả máy tính dell')";
//$is_insert = mysqli_query($connection, $sql_insert);//B2: thực thi truy vấn


//select nhiều bản ghi:
$sql_select = "SELECT * FROM products ORDER BY created_at desc ";
$select_all = mysqli_query($connection, $sql_select);
//echo "<pre>";
//print_r($select_all);
//echo "</pre>";
//B3: Lấy mảng kết hợp nhiều phần tử
$products = mysqli_fetch_all($select_all, MYSQLI_ASSOC);
echo "<pre>";
print_r($products);
echo "</pre>";

//Select 1 bản ghi
$sql_select = "SELECT * FROM products WHERE id = 1 ";
$select_one = mysqli_query($connection,$sql_select);
$product  = mysqli_fetch_assoc($select_one);
echo "<pre>";
print_r($product);
echo "</pre>";

//UPDATE
$sql_update = "UPDATE products SET name = 'new name', price = 10001 WHERE id =4";
$is_update = mysqli_query($connection,$sql_update);
//var_dump($is_update);//true

//DELETE
$sql_delete = "DELETE FROM products WHERE id = 12";
$is_delete = mysqli_query($connection,$sql_delete);
//var_dump($is_delete);//true