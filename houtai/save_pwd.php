<?
session_start();
include("../inc/checkadmin.php");
include("../inc/conn.php");
include("../inc/func.php");
$web_admin=$_POST["web_admin"];
$pwd=$_POST["pwd"];
$admin_id=$_POST["admin_id"];
$act=$_GET["act"];
//编辑操作
if($act=="edit")
{;
$sql="update web_admin set adminuser='$web_admin',password='$pwd' where admin_id='$admin_id'";
mysqli_query($conn, $sql);
echo "<script>alert('修改成功！'); window.location.href='edit_pwd.php';</script>";
}


?>