

<div class="container">
<h2>Cập nhật sản phẩm </h2>
<form action="" method="post">
    <div class="md-3">
        <label for="form-title">Tên sản phẩm</label>
        <input class="form-control" type="text" name="name" value="<?php echo $product['name'];?>">

    </div>
    <div class="md-3">
        <label for="">Giá sản phẩm</label>
        <input class="form-control" type="text" name="price" value="<?php echo $product['price'];?>">

    </div>
    <br>
    <input type="submit" name="submit" value="Lưu sản phẩm" class="btn btn-primary">
    <a href="index.php?controller=product&action=index" class="btn btn-danger">HỦY</a>
</form>
</div>