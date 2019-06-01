<?php 
function skip($url,$pic,$message){
$html=<<<A
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8" />
<meta http-equiv="refresh" content="3;URL={$url}" />
<title>正在跳转中</title>
<link rel="stylesheet" type="text/css" href="style/remind.css" />
</head>
<body>
<div class="notice"><span class="pic {$pic}"></span> {$message} <a href="{$url}">3秒后自动跳转中!</a></div>
</body>
</html>
A;
echo $html;
exit();
}
function is_login($link){
    if(isset($_COOKIE['sfk']['name']) && isset($_COOKIE['sfk']['password'])){
        $query="select * from student where name='{$_COOKIE['sfk']['name']}' and sha1(password)='{$_COOKIE['sfk']['password']}'";
        $result=execute($link,$query);
        $queryt="select * from teacher where name='{$_COOKIE['sfk']['name']}' and sha1(password)='{$_COOKIE['sfk']['password']}'";
        $resultt=execute($link,$queryt);

        if(mysqli_num_rows($result)==1){
            $data=mysqli_fetch_assoc($result);
            return $data['id'];
        }elseif (mysqli_num_rows($resultt)==1){
            $data=mysqli_fetch_assoc($resultt);
            return $data['id'];
        }else{
            return false;
        }
    }else{
        return false;
    }
}
?>