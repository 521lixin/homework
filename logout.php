<?php
/**
 * Created by PhpStorm.
 * User: 琛
 * Date: 2019/4/13
 * Time: 11:21
 */

if(isset($_COOKIE['skf']['number'])){
    if (setcookie('sfk[number]',$_POST['number'],time()-3600,"/")&& setcookie('sfk[password]',sha1(md5($_POST['password'])),time()-3600,"/")
) {
        header('Location:skip.php?url=index.html&info=退出成功！正在跳转中！');

    } else {
        header('Location:skip.php?url=""&info=退出失败！请稍后重试！');

    }
}

?>