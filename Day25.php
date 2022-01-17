<?php
/*
 * Lập trình hướng đối tượng: lấy đối tượng làm trung tâm để tạo ra cụm chức năng xoay quanh đối tượng
 * ->hướng lập trình về một đối tượng nào đó
 *
 *-OOP: Object Oriented Programming
 *
 * 1 - Class
 * class giống như bản vẽ kĩ thuật của ngôi nhà, là 1 khuôn mẫu. từ 1 class(khuôn mẫu) có thể sinh ra nhiều object(ngôi nhà) cụ thể
 * Quy tắc: Viết hoa ký tự đầu tiên của từng từ, 1 file php chỉ có 1 class thì tên file phải trùng với tên class
 * */
class House {

}

class HouseTestApi{

}

class Student{
    public $name;
    public $msv;
}
 /*
  * 2 - Object:
  * là thể hiện cụ thể của 1 class, sinh ra từ class
  *
  *
  * */

$obj_1 = new Student();
$obj_1->name = 'Nam';
$obj_1->msv = 1;

/*
 * 3 - Thuộc tính của class
 * Mô tả đặc điểm cho class đó
 * Thuộc tính là biến trong PHP thuần
 *
 * */

class Person {
    public $name;
    public $age;
    public $address;
}

$person1 = new Person();

$person1->name = 'ABC';
$person1->age = 31;
$person1->address = 'HN';

/*
 * 4 - Phương thức của class
 * Mô tả hành vi của class
 * Phương thức của class tương ứng là 1 hàm trong PHP thuần
 * */

class Book {
    public $name;
    public $amount;
    public $author;

    //phương thức
    public function addBook()
    {
        echo "addBook";
    }

    public function editBook($id)
    {
        echo "editBook $id";
    }

}

$book1 = new Book();
$book1->name = 'Ngữ văn 1';
$book1->author = 'ABC';

$book1->addBook();
$book1->editBook(4);

/*
 * 5- Phương thức khới tạo của class
 * Khởi tạo giá trị mặc định cho các thuộc tính của class đó
 * Phương thực chạy ngầm đầu tiên ngay khi object sinh ra từ class
 * */

class TestContructor{

    public $name;

    public function __construct(){
        echo "Chạy ngầm đầu tiên sau khi khởi tạo";
    }
}

$obj = new TestContructor();// in ra luôn dòng echo trong biến

//6 - từ khóa This: sử dụng bên trong để tham chiếu đến chính biến đó
class TestThis {
    public $name;
    public $age;

    public function showName()
    {
        echo $this->name;
    }
}

$test = new TestThis();
$test->name = 'Hello';
$test->showName();//in ra hello

/*7 - Phạm vi truy cập: gán quyền truy cập cho các thuộc tính và phương thức trong class
 * 3 quyền truy cập: Private, Public, Protected
 * + Private: chỉ có thể truy cập được bên trong class không thể truy cập bên ngoài class
 * + Protected: truy cập bên trong class và truy cập trong các class kế thừa
 * + Public: Có thể truy cập được từ mọi nơi
 *
*/

class TestPrivate{
    private $name;

    public function showName()
    {
        echo $this->name;
    }
}

$obj_test = new TestPrivate();
$obj_test->name = 'Name';//không thể truy cập name
class TestProtected{
    protected $address;

    public function showAddress()
    {
        echo $this->address;
    }

}

$testProtected = new TestProtected();
$testProtected->address = '';//Không thể truy cập bên ngoài class

class ExtendsProtected extends TestProtected{
    public function show()
    {
        echo $this->address;//có thể truy cập được vì đã kế thừa
    }
}
//8 - Từ khóa static: cơ chế truy cập các thuộc tính/ phương thức của class không cần khởi tạo đối tượng
//bằng cách khai báo từ khóa static trước tên TT/PT

class TestStatic{
    public static $name;

    public static function show()
    {
        echo 'show';
    }
}
TestStatic::$name = 'Static';
TestStatic::show();

//- từ khóa self : sử dụng bên trong class giống this, dùng để truy cập TT/PT tĩnh (static) bên trong class

class TestSelf {
    public static $address;

    public static function show()
    {
        self::$address = 'HN';
    }
}

//- Từ khóa const: truy cập hằng số giống như static
class TestConst{
    const PI = 3.14;

    public function show()
    {
        echo self::PI;
    }

}

//- tính kế thừa: sử dụng lại thuộc tính và phương thưc của class cha
// truy cập được ở 2 phạm vi protected và public
// PHP chỉ hỗ trợ đơn kế thừa

//-tính trừu tượng : abstract , tạo 1 class cha có 1 Phương thức chung cho các class con kế thừa bắt buộc phải định
//nghĩa lai phương thức này trong class con

abstract class TestAbstract{
    public $name;
    public function show()
    {

    }

    //Khai báo phương thức trừu tượng không có phần Body

    abstract public function test();
}

class ChildAbstract extends TestAbstract{
    //Phải định nghĩa lại phương thức abstract cuả class cha

    public function test()
    {
        // TODO: Implement test() method.
    }
}

//- Từ khóa implements: thực thi các interface
// Interface là các bộ khung
//1 class có thể implements nhiều interface ở 1 thời điểm
// Interface giống như 1 plugin cài vào máy tính
//interface không được chứa thuộc tính, phương thức bắt buộc không có nội dung

interface Config{
    public function sendMail();

    public function getMail();
}
class Mail implements Config{

    public function sendMail()
    {
        // TODO: Implement sendMail() method.
    }

    public function getMail()
    {
        // TODO: Implement getMail() method.
    }
}

//4 tính chất của OOP
//+ Kế thừa:tạo các class mới, kế thừa các thuộc tính có sẵn từ class cha, từ khóa extend
//+ Đa hình: Cùng 1 phương thức có nhiều cách thể hiện (hình dạng) để sử dụng cho các mục đích khác nhau, thường là interface
//+ Trừu tượng: tạo class cha có cùng bản chất , thể hiện abstract, từ 1 đối tượng giống nhau trừu tượng hóa lên thành 1 class
//+ Đóng gói: Tính đóng gói che dấu thông tin của class với các class bên ngoài, private, protected, public

