<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 9:54 AM
 */
if(isset($_POST['sua'])){
    $tendanhmuc=$_POST['tendanhmuc'];
    $ghichu=$_POST['ghichu'];
    $danhmuc=$_POST['danhmuc'];
    if(trim($tendanhmuc)===null){
        echo"Phải nhập tên danh mục";
    }
    else{
        $sql="update tbl_danhmuc set tendanhmuc='$tendanhmuc',ghichu='$ghichu',danhmuc='$danhmuc' WHERE id={$_GET['id']}";
        if(mysql_query($sql)){
            echo"Done!";
        }
        else echo"Error!";
    }
}
$cm1=mysql_query("SELECT * FROM tbl_danhmuc WHERE id={$_GET['id']}");
$sua=mysql_fetch_object($cm1);
$cm = mysql_query("SELECT * FROM tbl_danhmuc");
?>
<h2>Thay đổi chuyên mục</h2>
<a href="?tbl=danhmuc/ds">Quay lại danh sách</a>
<form method="post">
    <table>
        <tr>
            <td>Tên chuyên mục</td>
            <td><input type="text" name="tendanhmuc" value="<?php echo $sua->tendanhmuc ?>"></td>
        </tr>
        <tr>
            <td>Ghi chú</td>
            <td><input type="text" name="ghichu" value="<?php echo $sua->ghichu ?>"></td>
        </tr>
        <tr>
            <td>Chuyên mục gốc</td>
            <td>
                <select name="danhmuc">
                    <option value="">-----Chọn chuyên mục gốc------</option>
                    <?php while ($r = mysql_fetch_object($cm)):
                        ?>
                        <option value="<?php echo $r->id ?>"><?php echo
                            $r->tendanhmuc ?></option>
                    <?php endwhile; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td >
                <button type="submit" name="sua">Lưu thay đổi</button>
            </td>
        </tr>
    </table>
</form>