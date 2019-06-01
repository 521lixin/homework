<?php 
if(empty($_POST['name'])){
	skip('index(teacher).html', 'error', '用户名不得为空！');
}
if(mb_strlen($_POST['name'])>32){
	skip('index(teacher).html', 'error', '用户名长度不要超过32个字符！');
}
if(empty($_POST['password'])){
	skip('index(teacher).html', 'error', '密码不得为空！');
}
if(strtolower($_POST['vvcode'])!=strtolower($_SESSION['vcode'])){
	skip('index(teacher).html', 'error','验证码输入错误！');
}

?>