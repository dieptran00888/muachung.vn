<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:54 AM
 */
if(isset($_GET['id'])){
    $sql="delete from tbl_sanpham WHERE id={$_GET['id']}";
    if(mysql_query($sql)){
        echo"Đã xóa";
    }
    else{
        echo"Chưa xóa";
    }
}

$sql="select *from tbl_sanpham";
$sp=mysql_query($sql);
?>
<table cellpadding="10px" border="1" style="width: 100%">
    <h2>Danh sách sản phẩm</h2>
    <a href="?tbl=sanpham/them">Thêm sản phẩm</a>
    <tr>
        <td>STT</td>
        <td>Tên sản phẩm</td>
        <td>Danh mục sản phẩm</td>
        <td>Giá</td>
        <td>Ảnh</td>
        <td>Mô tả</td>
        <td>Mẫu sản phẩm</td>
        <td>Địa chỉ</td>
        <td>Ngày đăng</td>
        <td>Người đăng</td>
        <td>Đăng</td>
        <td>Tác vụ</td>
    </tr>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($sp)):
    ?>
    <tr>
        <td><?php echo $stt ?></td>
        <td><?php echo $r->tensp ?></td>
        <td><?php echo $r->danhmucsp ?></td>
        <td><?php echo $r->gia ?></td>
        <td><img src="../lip/img/<?php echo $r->anh ?>" alt=""width="50px" height="50px"/></td>
        <td><?php echo $r->mota ?></td>
        <td><?php echo $r->mausp ?></td>
        <td><?php echo $r->diachi ?></td>
        <td><?php echo $r->ngaydang ?></td>
        <td><?php echo $_SESSION['tk']['tenhienthi'] ?></td>
        <td><?php echo $r->dang ?></td>
        <td><a href="?tbl=sanpham/sua&id=<?php echo $r->id?>">Sửa</a>
        <a href="?tbl=sanpham/ds&id=<?php echo $r->id?>">Xóa</a></td>
    </tr>
    <?php $stt++;endwhile ?>
<!--    ket thuc vong while-->
</table>