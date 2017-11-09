<?
include("../inc/checkadmin.php");
include("../inc/conn.php");
include("../inc/func.php");
$title=$_POST["title"];
$category=$_POST["category"];
$rq=$_POST["rq"];
$content=$_POST["content"];
date_default_timezone_set("PRC");
$time=date("Y-m-d");
$act=$_GET['act'];
//添加操作 
if($act=="add")
{
$sql="insert into arc(c_id,title,content,rq) values('$category','$title','$content','$rq')";
mysqli_query($conn, $sql);
echo "<script>alert('已经添加成功！'); window.location.href='add_arc.php';</script>";
}
//编辑操作
if($act=="edit")
{
$id=$_POST["id"];
$url=$_POST["url"];
$sql="update arc set title='$title',c_id='$category',content='$content',rq='$rq' where arc_id='$id'";
mysqli_query($conn, $sql);
echo "<script>alert('已经修改成功！'); window.location.href='".$url."';</script>";
}

//删除操作
if($act=="del")
{
$id=$_GET["id"];
$url=$_SERVER["HTTP_REFERER"];
$sql="delete from arc where arc_id='$id'";
mysqli_query($conn, $sql);
echo "<script>alert('已经删除成功！'); window.location.href='".$url."';</script>";
}
?>