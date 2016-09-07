<?php
/**
 * Created by PhpStorm.
 * User: 李庆芳
 * Date: 2016/9/7
 * Time: 15:16
 */

//获取当前文件所在目录
define("__S__",str_replace("\\","/",dirname(__FILE__)));
//获取wordpress所在目录
define("__ROOT__",substr(__S__,0,-24));
//引用wp-config.php文件，获取数据库信息
require(__ROOT__."/wp-config.php");
//链接mysql 服务器
$conn = mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("连接服务器出错：".mysql_error());
//链接网站所在数据库
mysql_select_db(DB_NAME) or die("连接数据库出错：".mysql_error());
//设置字符编码
@mysql_query('SET NAMES UTF8');

?>