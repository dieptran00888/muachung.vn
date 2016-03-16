<?php include_once"connect.php" ?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>muachung.vn</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="lip/css/demo.css"/>
    <!--    <link rel="stylesheet" href="lip/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="lip/css/style_second.css"/>
</head>
<body>
<div class="wapper">
    <?php include_once"code/header.php" ?>
    <div class="container">
        <div class="main">
<!--            --><?php //include_once"code/nav.php"?>
            <div class="col-md-9">
                <form action="">
                    <table>
                        <tr>
                            <td>Họ tên</td>
                            <td><input type="text" name="ten"/></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ</td>
                            <td><input type="text" name="diachi"/></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><input type="tel" name="sdt"/></td>
                        </tr>
                        <tr>
                            <td><button type="submit" name="mua">Mua sản phẩm</button></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <!--end main-->
        <?php include_once"code/block.php" ?>
    </div>
    <?php include_once"code/footer.php" ?>
</div>
<script src="lip/js/jquery-2.2.1.min.js"></script>
<script src="lip/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
//        var aboveHeight = $('header').outerHeight();
        $(window).scroll(function(){
            if ($(window).scrollTop() > 300){
                $('nav').addClass('fixed').css('top','0').next().css('padding-top','0');
            } else {
                $('nav').removeClass('fixed').next().css('padding-top','0');
            }
        });
    });
</script>
</body>
</html>