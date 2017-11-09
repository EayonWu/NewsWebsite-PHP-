<?
session_start();
if(empty($_SESSION["adminname"]))
{
echo "<script>alert('请先登录！');window.top.location.href='admin_login.php'</script>";
}
?> 
