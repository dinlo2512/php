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
