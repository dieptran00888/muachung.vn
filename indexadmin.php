<?php
include_once"../kiemtradangnhap.php";
include_once"../connect.php";

?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <script src="ckeditor/ckeditor.js" type="text/javascript"></script>
</head>
<body>
<table>
    <h2>Trang index admin</h2>
    <nav>
        <ul>
            <li><a href="?tbl=danhmuc/ds">Danh mục</a></li>
            <li><a href="?tbl=sanpham/ds">Sản phẩm</a></li>
            <li><a href="?tbl=khachhang/ds">Khách hàng</a></li>
            <li><a href="?tbl=user/ds">Người dùng</a></li>
            <li><a href="dangxuat.php">Đăng xuất</a></li>
        </ul>
    </nav>
    <div class="content">
        <?php
            if(isset($_GET['tbl'])){
                include_once"table/".$_GET['tbl'].".php";
            }
            else{
                include_once"../home.php";
            }
        ?>
    </div>
</table>
</body>
</html>