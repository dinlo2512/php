<div class="container">
    <a href="index.php?controller=product&action=create" class="btn btn-primary">Thêm mới sản phẩm</a>
    <hr>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>STT</th>
            <th width="5%">ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Creted_at</th>
            <th width="15%"></th>
        </tr>
        </thead>
        <?php foreach ($products as $key => $product): ?>
            <tr>
                <td><?php echo $key+1;?></td>
                <td><?php echo $product['id'];?></td>
                <td><?php echo $product['name'];?></td>
                <td><?php echo number_format($product['price']);?> $ </td>
                <td><?php echo date('d-m-Y H:i:s', strtotime($product['created_at']));?></td>
                <td>
                    <a href="index.php?controller=product&action=update&id=<?php echo $product['id'];?>" class="btn btn-success">Sửa</a>
                    <a href="index.php?controller=product&action=delete&id=<?php echo $product['id'];?>" class="btn btn-danger" onclick="return confirm('Bạn có muốn xóa?')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>