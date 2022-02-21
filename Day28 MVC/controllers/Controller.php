<?php

//Controller cha chứa thông tin chung cho controller con
class Controller{
    public $page_title; //Tiêu đề trang
    public $error;//Lỗi chung
    public $content;// Nội dung động của từng trang

    public function render($file_path, $variable = [])//Lấy nội dung của 1 file view bất kỳ kèm cơ chế truyền biến tường minh
    {
        //$file_path: đường dẫn tới fle
        //$variable: mảng dữ liệu truyền vào file
        extract($variable);
        ob_start();// Cơ chế dung bộ nhớ đệm để lưu file
        require $file_path;
        $content = ob_get_clean();//Kết thuc việc lưu file, trả về biến chứa nội dung file

        return $content;

    }
}