<?php
require './inc/config.inc.php';
require './inc/mysql.inc.php';
require './inc/tool.inc.php';
if(is_login($link)){
    skip('index.php','error','你已经登录，请不要重复注册！');
}
if(isset($_POST['submit'])){

    $link=connect();
    require './inc/check_register.inc.php';
    $query="insert into student(name,password,number) values('{$_POST['name']}',md5('{$_POST['password']}'),'{$_POST['number']}')";
    execute($link,$query);
    if(mysqli_affected_rows($link)==1){
        setcookie('sfk[name]',$_POST['name']);
        setcookie('sfk[password]',sha1(md5($_POST['password'])));
        skip('index.html','ok','注册成功！');
    }else{
        skip('index.html','eror','注册失败,请重试！');
    }
}
?>