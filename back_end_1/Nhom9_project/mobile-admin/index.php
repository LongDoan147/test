<?php
$open = "home";
require '../config/database.php';
require '../modules/db.php';
require '../modules/category.php';
require '../modules/manufactures.php';
require '../modules/product.php';
require '../modules/bill.php';
require '../modules/customer.php';
require '../modules/user.php';
$star = 0;
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else{
    $page = 1;
}

$open = "product";
$title = "Sản Phẩm";

// session_start();
// $title = "Trang Chủ";
// if(!isset($_SESSION['login'])){
//     header('location:login.php');
// }
require './layout/header.php';

?>
<div class="wraper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Trang Chủ
            </h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> trang chủ
                </li>
            </ol>
        </div>
    </div>
    <div class="value">
        <div class="col-md-12">
            <table class="table table-bordered text-center table-hover">
                <thead>
                    <tr class="bg-primary">
                        <th class="text-center">Hình Ảnh</th>
                        <th class="text-center">Tên</th>
                        <th class="text-center">Giá</th>
                        <th class="text-center">Giá Sale</th>
                        <th class="text-center">Hãng XS</th>
                        <th class="text-center">Danh Mục</th>
                        <th class="text-center">Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                
                    $products = new Db();
                    $sql = "SELECT * FROM products,manufactures,category WHERE (products.manu_id = manufactures.manu_id AND products.cate_id = category.cate_id) ORDER BY id DESC";
                    $product = $products->pagination($sql,$page,10);
                    foreach ($product as $key => $value) {
                    
                 ?>
                    <tr>
                        <td><img src="../public/image/<?php echo $value['image'] ?>" alt="" width="50px" height="50px;">
                        </td>
                        <td>
                            <?php echo $value['name'] ?>
                        </td>
                        <td>
                            <?php echo number_format($value['price']); ?> đ
                        </td>
                        <td>
                            <?php echo number_format($value['sale']); ?> đ
                        </td>
                        <td>
                            <?php echo $value['manu_name'] ?>
                        </td>
                        <td>
                            <?php echo $value['cate_name'] ?>
                        </td>
                        <td>
                            <a href="modules/product/edit.php?id=<?php echo $value['id'] ?>" class="btn btn-info"><span
                                    class="fas fa-edit"></span> Sửa</a>
                            <a href="modules/product/delete.php?id=<?php echo $value['id'] ?>"
                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger"><i
                                    class="fas fa-trash-alt"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            <center>
                <?php 
        
        $products = new Db();
        $sql = "SELECT * FROM products,manufactures,category WHERE (products.manu_id = manufactures.manu_id AND products.cate_id = category.cate_id) ORDER BY id DESC";
        $product = $products->numPagination("product",$sql,$page,10);
        
        ?>
            </center>
        </div>
    </div>
    <?php
require './layout/footer.php';