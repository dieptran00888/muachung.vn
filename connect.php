<?php
/**
 * Created by PhpStorm.
 * User: DiepTran
 * Date: 3/11/2016
 * Time: 8:55 AM
 */
define('HOSTNAME','localhost');
define('USERNAME','root');
define('USERPASS','');
define('DB_NAMES','muachung');
define('BASEURL','muachung.vn');

$con=mysql_connect(HOSTNAME,USERNAME,USERPASS) OR DIE("Khong ket noi den db");
mysql_select_db(DB_NAMES,$con) or die('Khong tim thay db');
mysql_query("SET NAMES 'utf8'")
;
?>