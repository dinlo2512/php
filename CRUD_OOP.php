<?php
//product : id,category_id,  name , price, description,
class Product{
    public $id;
    public $category_id;
    public $name;
    public $price;
    public $description;

    public function addProduct()
    {
        $connection = $this->getConnection();
        $sql_insert = "INSERT INTO products(name, price) VALUES('$this->name', $this->price)";
        $is_insert = mysqli_query($connection,$sql_insert);
        return $is_insert;
    }
    public function editProduct()
    {

    }
    public function deleteProduct()
    {

    }

    public function listProducts()
    {
        $connection = $this->getConnection();

        $sql_select_all = "SELECT * FROM PRODUCTS";
        $obj = mysqli_query($connection, $sql_select_all);
        $values = mysqli_fetch_all($obj, MYSQLI_ASSOC);
        return $values;
    }

    public function getConnection()
    {
        $connection = mysqli_connect(self::DB_HOST,self::DB_USERNAME,self::DB_PASSWORD,self::DB_NAME,
            self::DB_PORT);
        if (!$connection){
            die("Lỗi kết nối". mysqli_connect_error());
        }
            echo "Kết nối thành công";
            return $connection;
    }

    const DB_HOST = 'localhost';
    const DB_USERNAME = 'root';
    const DB_PASSWORD = '';
    const DB_NAME = 'db_demo_join';
    const DB_PORT = '3306';
}

$product = new Product();
$product->listProducts();
echo "<pre>";
print_r($product);
echo "</pre>";


$product->name = 'Sản phẩm 1';
$product->price = 30000;

$is_insert = $product->addProduct();