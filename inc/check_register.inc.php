<?php 
if(empty($_POST['name'])){
	skip('index(student).html', 'error', '用户名不得为空！');
}
if(mb_strlen($_POST['name'])>32){
	skip('index(student).html', 'error', '用户名长度不要超过32个字符！');
}
if(mb_strlen($_POST['password'])<6){
	skip('index(student).html', 'error','密码不得少于6位！');
}
if($_POST['password']!=$_POST['password2']){
	skip('index(student).html', 'error','两次密码输入不一致！');
}
if(strtolower($_POST['vcode'])!=strtolower($_SESSION['vcode'])){
    skip('index(student).html', 'error','验证码输入错误！');
}
$_POST=escape($link,$_POST);
$query="select * from student where name='{$_POST['name']}'";
$result=execute($link, $query);
if(mysqli_num_rows($result)){
	skip('index(student).html', 'error', '这个用户名已经被别人注册了！');
}
?>