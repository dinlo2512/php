<?php
/*
 * Mô hình MVC
 * Model,
 * View,
 * Controller
 *
 * Controller nhận request gửi yêu cầu đến Model,
 * Model thực hiện truy vấn với Database trả về Controller,
 * Controller đưa dữ liệu cho View hiển thị trả dữ liệu lại Controller,
 * Controller hiển thị dữ liệu lên cho Browser
 *
 * Tổ chức cấu trúc thư mục code MVC
 * MVC:
 *      /assets: chứa các file liên quan tới front-end
 *              /css: file css
 *                  /style.css
 *              /js: file js của hệ thống
 *                  /script.js
 *              /image: chứa các ảnh tĩnh
 *      /config: cấu hình hệ thống CSDL,...
 *              /Database.php: Class chứa cấu hình CSDL
 *      /Controllers: chứa các Class controller - C
 *                  /Controller.php class controller cha
 *                  /ProductController.php quản lý products
 *                  /...
 *      /models: Chứa class Model - M
 *              /Model.php: class model cha
 *              /Product.php
 *              /...
 *      /views: chứa các file View - V
 *              /layout: chứa file bố cục chính
 *                      /main.php
 *              /products: chứa các file view tương ứng của product
 *                        /index.php danh sách sản phẩm
 *                        /create.php thêm mới
 *                        /...
 *      .htaccess: file cấu hình
 *      index.php: file index gốc của ứng dụng
 *
 * */