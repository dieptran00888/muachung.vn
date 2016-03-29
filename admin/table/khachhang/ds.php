<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:55 AM
 */
if(isset($_GET['id'])){
    $sql="delete from tbl_khachhang WHERE id={$_GET['id']}";
    if(mysql_query($sql)){
        echo"Đã xóa";
    }
    else{
        echo"Chưa xóa";
    }
}

$sql= "select *from tbl_khachhang";
$kh=mysql_query($sql);
?>

<table cellpadding="20px" border="1">
    <h2>Danh sách khách hàng</h2>
    <tr>
        <td>STT</td>
        <td>Tên khách hàng</td>
        <td>Số điện thoại</td>
        <td>Sản phẩm</td>
        <td>Số lượng</td>
        <td>Địa chỉ</td>
        <td>Tổng tiền</td>
        <td>Tác vụ</td>
    </tr>
    <?php
        $stt=1;
        while($r=mysql_fetch_object($kh)):
    ?>
    <tr>
        <td><?php echo $stt ?></td>
        <td><?php echo $r->tenkh ?></td>
        <td><?php echo $r->sdt ?></td>
        <td><?php echo $r->sanpham ?></td>
        <td><?php echo $r->soluong ?></td>
        <td><?php echo $r->diachi ?></td>
        <td><?php echo $r->tongtien ?></td>
        <td>
            <a href="?tbl=khachhang/sua&id=<?php echo $r->id; ?>">Sửa</a>
            <a href="?tbl=khachhang/ds&id=<?php echo $r->id ?>">Xóa</a>
        </td>
    </tr>
    <?php $stt++;endwhile; ?>
</table>