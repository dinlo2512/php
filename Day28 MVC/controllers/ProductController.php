<?php

require_once 'controllers/Controller.php';
require_once 'models/Product.php';

class ProductController extends Controller{

    public function create()
    {
        //XỬ lý submit form
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";

        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];

            if (empty($name) || empty($price)){
                $this->error = "Tên hoặc giá không được để trống";
            }

            if (empty($this->error)){
                //GỌi model thêm vào csdl
                $product_model = new Product();
                $arrs = [
                  'name' => $name,
                  'price' => $price
                ];

                $is_insert = $product_model->insertData($arrs);
                var_dump($is_insert);
            }
        }

        //Gọi view để hiển thị form thêm mới sp, dung layout động
        //Gán nội dung file view thêm mới sp cho thuộc tính content của class cha
        $this->content = $this->render('views/products/create.php');
         //var_dump($this->content);
        //Gọi layout để hiển thị các nội dung động trên trang là content và page_title
        //Thuộc tính content và page_title
        $this->page_title = "Thêm mới sản phẩm";
        require_once 'views/layout/main.php';


    }

}