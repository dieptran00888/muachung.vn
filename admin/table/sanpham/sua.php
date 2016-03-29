<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:55 AM
 */
if(isset($_POST['sua'])){
    $tensanpham=$_POST['tensanpham'];
    $danhmucsp=$_POST['danhmucsp'];
    $gia=$_POST['gia'];
    $mota=htmlentities($_POST['mota']);
    $mausp=$_POST['mausp'];
    $diachi=$_POST['diachi'];
    $dang=$_POST['dang'];

    $ngaydang=strtotime(date_default_timezone_set('Asia/Ho_Chi_Minh'));
    $ngaydang=date_create($ngaydang);
    $ngaydang=date_format($ngaydang,'Y-m-d H:i:s');

    $nguoidang=$_SESSION['tk']['id'];
    $anh='';
    if($_FILES['anh']['name']!=null){
        $anh=$_FILES['anh']['name'];
        move_uploaded_file($_FILES['anh']['name'],'../lip/img'.$anh);
    }else{
        $anh=mysql_query("select anh from tbl_sanpham WHERE  id={$_GET['id']}");
        $anh=mysql_fetch_object($anh);
        $anh=$anh->anh;
    }

    if(trim($tensanpham)==''||$gia<0||trim($diachi)==''){
        echo"Bạn chưa nhập đúng dữ liệu!";
    }else{
        $sql= "update tbl_sanpham set
            tensp='$tensanpham',danhmucsp='$danhmucsp',gia='$gia',anh='$anh',mota='$mota',mausp='$mausp',diachi='$diachi',ngaydang='$ngaydang',nguoidang='$nguoidang',dang='$dang' WHERE id={$_GET['id']}";
        if(mysql_query($sql)) echo "Done!";
        else echo"Error!";
    }
}
$sp1=mysql_query("select *from tbl_sanpham WHERE id={$_GET['id']}");
$sua=mysql_fetch_object($sp1);

$dm= mysql_query("select *from tbl_danhmuc");

?>
<h2>Sửa sản phẩm</h2>
<form action="" method="post" enctype="multipart/form-data">
    <table>
        <a href="?tbl=sanpham/ds">Back to list</a>
        <tr>
            <td>Tên sản phẩm</td>
            <td><input type="text" name="tensanpham" value="<?php echo $sua->tensp ?>"/></td>
        </tr>
        <tr>
            <td>Danh mục sản phẩm</td>
            <td><select name="danhmucsp" >
                    <?php while ($r = mysql_fetch_object($dm)):
                        $sl=($r->id==$sua->danhmucsp)?'selected':'';
                        ?>
                        <option <?php echo $sl ?> value="<?php echo $r->id ?>"><?php echo $r->tendanhmuc ?></option>
                    <?php endwhile; ?>
                </select></td>
        </tr>
        <tr>
            <td>Giá</td>
            <td><input type="number" name="gia"value="<?php echo $sua->gia ?>"/></td>
        </tr>
        <tr>
            <td>Ảnh</td>
            <td><input type="file" name="anh" value="<?php echo $sua->anh ?>"/><?php echo$sua->anh ?></td>
        </tr>
        <tr>
            <td>Mô tả</td>
            <td><textarea name="mota" id="aa" cols="50" rows="20" value="<?php echo $sua->mota ?>"><?php echo $sua->mota ?></textarea>
                <script>CKEDITOR.replace('aa');config.entities_latin=false</script></td>
        </tr>
        <tr>
            <td>Mẫu sản phẩm</td>
            <td><select name="mausp" id="" value="<?php echo $sua->mausp ?>">
                    <option selected="selected">Lớn</option>
                    <option selected="selected">Vừa</option>
                    <option selected="selected">Nhỏ</option>
                </select></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi"value="<?php echo $sua->diachi ?>"/></td>
        </tr>
        <tr>
            <td>Người đăng</td>
            <td><?php echo $_SESSION['tk']['tenhienthi']?></td>
        </tr>
        <tr>
            <td><input name="dang" <?php echo isset($dang)?($dang==1)?'checked':'':'checked'
                ?> type="checkbox" value="1">Đăng bài viết này </td>
        </tr>
        <tr>
            <td><button type="submit" name="sua">Lưu thay đổi</button></td>
        </tr>
    </table>
</form>