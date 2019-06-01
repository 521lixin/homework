<?php
include_once './inc/config.inc.php';
include_once './inc/mysql.inc.php';
include_once './inc/tool.inc.php';
$link=connect();
var_dump(isset($_COOKIE));
if(is_login($link)){
    skip('./subwork/teacher.php','error','你已经登录，请不要重复登录！');
}
if(isset($_POST['submit'])){
    include './inc/check_logint.inc.php';
    escape($link,$_POST);
    $query="select * from teacher where name='{$_POST['name']}' and password=md5('{$_POST['password']}')";
    $result=execute($link, $query);
    if(mysqli_num_rows($result)==1){
        setcookie('sfk[name]',$_POST['name'],time()+3600);
        setcookie('sfk[password]',sha1(md5($_POST['password'])),time()+3600);
        skip('./subwork/teacher.php','ok','登录成功！');
    }else{
        skip('index(teacher).html', 'error', '用户名或密码填写错误！');
    }
}

?>
