<?php

/*
 *backend
 *  :connection kết nối csdl theo cơ chế mysqli
 *  :API.php tạo code API cho ứng dụng CRUD
 *frontend
 *  :create.html thêm mới sản phẩm
 *  :index.html liệt kê
 *  :update.html cập nhật sản phẩm
 *
 *  */
const DB_HOST = 'localhost';
const DB_USERNAME = 'root';
const DB_PASSWORD = '';
const DB_NAME = 'db_demo_join';
const DB_PORT = '3306';

$connection = mysqli_connect(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME,DB_PORT);
if (!$connection){
    die("Lỗi kết nối". mysqli_connect_error());
}