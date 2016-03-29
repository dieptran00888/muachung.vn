<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:54 AM
 */
if(isset($_GET['id'])){
    $sql="delete from tbl_danhmuc WHERE id={$_GET['id']}";
    if(mysql_query($sql)){
        echo"Đã xóa";
    }
    else{
        echo"Chưa xóa";
    }
}

$sql= "select *from tbl_danhmuc";
$dm= mysql_query($sql);
?>

<table border="1" style="width: 70%">
    <h2>Danh sách danh mục</h2>
    <a href="?tbl=danhmuc/them" >Thêm danh mục</a>

    <tr>
        <td>STT</td>
        <td>Tên danh mục</td>
        <td>Danh mục</td>
        <td>Ghi chú</td>
        <td>Tác vụ</td>
    </tr>
    <?php $stt=1;
        while($r=mysql_fetch_object($dm)):
    ?>
    <tr>
        <td><?php echo $stt ?></td>
        <td><?php echo $r->tendanhmuc ?></td>
        <td><?php echo $r->danhmuc ?></td>
        <td><?php echo $r->ghichu ?></td>
        <td><a href="?tbl=danhmuc/sua&id=<?php echo $r->id?>">Sửa</a>
            <a href="?tbl=danhmuc/ds&id=<?php echo$r->id ?>">Xóa</a></td>
    </tr>
    <?php $stt++;endwhile; ?>
</table>