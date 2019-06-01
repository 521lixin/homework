<?php 
include_once 'inc/config.inc.php';
include_once 'inc/mysql.inc.php';
include_once 'inc/tool.inc.php';
$link=connect();
if(is_login($link)){
	skip('./subwork/student.php','error','你已经登录，请不要重复登录！');
}
if(isset($_POST['submit'])){
	include 'inc/check_login.inc.php';
	escape($link,$_POST);
	$query="select * from student where number='{$_POST['number']}' and password=md5('{$_POST['password']}')";
	$result=execute($link, $query);
	if(mysqli_num_rows($result)==1){
		setcookie('sfk[number]',$_POST['number'],time()+3600,"/");
		setcookie('sfk[password]',sha1(md5($_POST['password'])),time()+3600,"/");
		skip('./subwork/student.php','ok','登录成功！');
	}else{
		skip('login.php', 'error', '用户名或密码填写错误！');
	}
}

?>
