<?php include_once"connect.php"; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>muachung.vn</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="lip/css/demo.css"/>
<!--    <link rel="stylesheet" href="lip/css/bootstrap.min.css">-->
    <link rel="stylesheet" href="lip/css/style.css"/>
</head>
<body>
<div class="wapper">
    <?php include_once"code/header.php" ?>
    <div class="container">
        <div class="main">
                <?php include_once"code/nav.php"?>
            <div class="col-md-9">
                    <?php include_once"code/slideshow.php"?>
                <div class="noidung">
                    <div class="row ">
                        <?php
                            $sql=mysql_query("select *from tbl_sanpham WHERE danhmucsp='1' limit 0,3");
                            while($r=mysql_fetch_object($sql)):
                        ?>
                        <div class="col-md-4 sp">
                            <div class="content">
                                <h4><a href="sanpham.php?nd=<?php echo $r->id ?>"><?php echo $r->tensanpham ?></a></h4>
                                <span class="price">Giá: <?php echo $r->gia ?> VNĐ</span>
                                <a href="sanpham.php?nd=<?php echo $r->id ?>"><img src="lip/img/<?php echo $r->anh ?>" alt=""/></a>
                                <span class="detail"><?php echo $r->mota ?></span>
                            </div>
                        </div>

                        <?php endwhile; ?>
                    </div>
                    <div class="row">
                        <?php
                            $sql=mysql_query("select *from tbl_sanpham WHERE danhmucsp='2' limit 0,3");
                            while($r=mysql_fetch_object($sql)):
                        ?>
                        <div class="col-md-4">
                            <div class="content">
                            <h4><a href="sanpham.php?nd=<?php echo$r->id ?>"><?php echo $r->tensanpham ?></a></h4>
                            <span class="price">Giá: <?php echo$r->gia ?> VNĐ</span>
                            <a href="sanpham.php?nd=<?php echo$r->id ?>"><img src="lip/img/<?php echo $r->anh ?>" alt=""/></a>
                            <span class="detail"><?php echo $r->mota ?></span>
                        </div>
                        </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="row">
                        <?php
                        $sql=mysql_query("select *from tbl_sanpham WHERE danhmucsp='3' limit 0,3");
                        while($r=mysql_fetch_object($sql)):
                            ?>
                            <div class="col-md-4">
                                <div class="content">
                                <h4><a href="sanpham.php?nd=<?php echo$r->id ?>"><?php echo $r->tensanpham ?></a></h4>
                                <span class="price">Giá: <?php echo$r->gia ?> VNĐ</span>
                                <a href="sanpham.php?nd=<?php echo$r->id ?>"><img src="lip/img/<?php echo $r->anh ?>" alt=""/></a>
                                <span class="detail"><?php echo $r->mota ?></span>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
                </div>
                <!--end noidung-->
            </div>
            <!--end col-md-10-->


        <!--end main-->
        <?php include_once"code/block.php" ?>
    </div>
</div>
    <?php include_once"code/footer.php" ?>

<script src="lip/js/jquery-2.2.1.min.js"></script>
<script src="lip/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
//        var aboveHeight = $('header').outerHeight();
        $(window).scroll(function(){
            if ($(window).scrollTop() > 295){
                $('nav').addClass('fixed').css('top','0').next().css('padding-top','0');
            } else {
                $('nav').removeClass('fixed').next().css('padding-top','0');
            }
        });
    });
</script>
</body>
</html>