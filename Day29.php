<?php
/**
 * Step_build_web_from_scratch
 *- xác định chủ đề
 *- Chuẩn bị dao điện cho cả front-end và back-end
 *- Phân tích cơ sỏ dữ liệu từ dao diện tĩnh: đi qua từng file.htlm, đi từ trên xuống dưới để phần tích
 *      + Thông tin thay đổi thường xuyên cần lưu vào cơ sở dữ liệu
 *      + Quản trị thông tin bằng dao diện backend -> CRUD (Giảm bớt truy vấn trên trang)
 *
 */