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
            <?php include_once"code/nav.php"?>
            <div class="col-md-9">
                <?php
                if (isset($_GET['tk'])) {
                    // Gán hàm addslashes để chống sql injection
                    $search = addslashes($_GET['search']);
                    $query = "select * from tbl_sanpham where tensp like '%$search%'";


                    $sql = mysql_query($query);
                    $num = mysql_num_rows($sql);

                    if (empty($search)) {
                        echo "Yêu cầu nhập dữ liệu";
                    } else {
                        if ($num > 0 && $search != "") {
                            echo "<h4>$num kết quả trả về với từ khóa <b>$search</b></h4>";
                            while ($row = mysql_fetch_assoc($sql)) {
                                $tensp = $row['tensp'];
                                $gia=$row['gia'];
                                $anh = $row['anh'];
                                $mota = $row['mota'];

                                echo "<br /><h3>Tên sản phẩm: $tensp </h3><br />Giá: $gia </br />";
                                echo"<img src=lip/img/$anh /></br>";
                                echo"$mota";
                            }
                        } else {
                            echo "Không tìm thấy kết quả!";
                        }
                    }
                }
                ?>
            </div>
            <!--end col-md-19-->
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
            if ($(window).scrollTop() > 400){
                $('nav').addClass('fixed').css('top','0').next().css('padding-top','0');
            } else {
                $('nav').removeClass('fixed').next().css('padding-top','0');
            }
        });
    });
</script>
<script lang="javascript">
    (function() {var _h1= document.getElementsByTagName('title')[0] || false;
        var product_name = ''; if(_h1){product_name= _h1.textContent || _h1.innerText;}var ga = document.createElement('script'); ga.type = 'text/javascript';
        ga.src = '//live.vnpgroup.net/js/web_client_box.php?hash=55f1dac4f661c12a42785b6a2e17c3b6&data=eyJzc29faWQiOjM2NDIyNzAsImhhc2giOiIyY2NkYjY3YTY4ODEwODBjY2UxNzE3Y2YxNDg4NjYwZSJ9&pname='+product_name;
        var s = document.getElementsByTagName('script');s[0].parentNode.insertBefore(ga, s[0]);})();
</script>
</body>
</html>