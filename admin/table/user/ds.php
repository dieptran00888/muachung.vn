<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:54 AM
 */
if(isset($_GET['id'])){
    $sql="delete from tbl_user WHERE id={$_GET['id']}";
    if(mysql_query($sql)){
        echo"Đã xóa";
    }
    else{
        echo"Chưa xóa";
    }
}

$sql= "select *from tbl_user";
$nd= mysql_query($sql);
?>
<table cellpadding="20px" border="1">
    <h2>Danh sách người dùng</h2>
    <a href="?tbl=user/them">Thêm người dùng</a>
    <tr>
        <td>STT</td>
        <td>Tên hiển thị</td>
        <td>Tên đăng nhập</td>
        <td>Mật khẩu</td>
        <td>Tác vụ</td>
    </tr>
    <?php $stt=1;
    while($r=mysql_fetch_object($nd)):
        ?>
        <tr>
            <td><?php echo $stt ?></td>
            <td><?php echo $r->tenhienthi ?></td>
            <td><?php echo $r->tendangnhap ?></td>
            <td><?php echo md5($r->matkhau) ?></td>
            <td><a href="?tbl=user/sua&id=<?php echo $r->id?>">Sửa</a>
                <a href="?tbl=user/ds&id=<?php echo$r->id ?>">Xóa</a></td>
        </tr>
        <?php $stt++;endwhile; ?>
</table>