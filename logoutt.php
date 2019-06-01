<?php
/**
 * Created by PhpStorm.
 * User: 琛
 * Date: 2019/4/13
 * Time: 11:21
 */
var_dump(isset($_COOKIE['skf']['name']));
include_once './inc/tool.inc.php';
header('Content-type:text/html;charset=utf-8');
if(isset($_COOKIE['skf']['name'])){
    if (setcookie('sfk[name]',$_POST['name'],time()-3600)&& setcookie('sfk[password]',sha1(md5($_POST['password'])),time()-3600)
    ) {
        skip('index.html', 'ok', '退出成功！正在跳转中！');

    } else {
        skip('./teacher.php', 'error', '退出失败！正在跳转中！');

    }
}

?>