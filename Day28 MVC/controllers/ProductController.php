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
                if  ($is_insert){
                    $_SESSION['success'] = "Thêm mới thành công";
                    header("Location:index.php?controller=product&action=index");
                    exit();
                }
                $this->error = 'Thêm vào thất bại';
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

    public function index()
    {
        //Gọi model để lấy dữ liệu

        $product_model = new Product();
        $products = $product_model->getData();

        //Controller gọi view để hiển thị trước
        $this->page_title = 'Liệt kê sản phẩm';
        $this->content = $this->render('views/products/index.php',[
            'products' => $products
        ]);//TRuyền biến qua view để sử dụng qua tham số thứ 2 hàm render
        require_once 'views/layout/main.php';
    }

    public function update()
    {
        //Lấy id trên url
        if  (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số không hợp lệ';
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $id = $_GET['id'];
        //GỌi Model để lấy sản phẩm theo ID
        $product_model = new Product();
        $product = $product_model->getOne($id);
        //var_dump($product);

        //Xử lý submit form trước logic gọi view
        if (isset($_POST['submit'])){
            $name = $_POST['name'];
            $price = $_POST['price'];

            if (empty($name) || empty($price)){
                $this->error = "Tên hoặc giá không được để trống";
            }
            if (empty($this->error)){
                //gọi model
                $data = [
                  'name' => $name,
                  'price' => $price,
                    'id' => $id
                ];
                $is_update = $product_model->updateData($data);
                if ($is_update) {
                    $_SESSION['success'] = "Sửa sản phẩm id = $id thành công";
                    header("Location:index.php?controller=product&action=index");
                    exit();
                }
                $this->error = "Sửa thất bại";

            }
        }

        //Controller gọi view form update
        $this->page_title = 'Cập nhật sản phẩm';
        $this->content = $this->render('views/products/update.php',
        [
            'product' => $product
        ]);
        require_once 'views/layout/main.php';

    }

    public function delete()
    {
        if  (!isset($_GET['id']) || !is_numeric($_GET['id'])){
            $_SESSION['error'] = 'Tham số không hợp lệ';
            header("Location: index.php?controller=product&action=index");
            exit();
        }
        $id = $_GET['id'];

        $product_model = new Product();
        $is_delete = $product_model->delete($id);
        //var_dump($is_delete);
        if ($is_delete){
            $_SESSION['success'] = "Xóa thành công";
            header("Location:index.php?controller=product&action=index");
            exit();
        }
        $_SESSION['error'] = "Xóa thất bại";
        header("Location:index.php?controller=product&action=index");
        exit();


    }


}