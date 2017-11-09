<?
include("../inc/conn.php");
include("../inc/func.php");
$category=$_POST["category"];
$act=$_GET["act"];
//添加操作
if($act=='add')
{
 $sql="insert into category(category) values('$category')";
 $query=mysqli_query($conn, $sql);
 echo "<script>alert('添加成功！'); window.location.href='add_category.php';</script>";
}
//修改操作
if($act=='edit')
{
$id=$_POST["id"];
 $sql="update category set category='$category' where c_id='$id'";
 $query=mysqli_query($conn, $sql);
 echo "<script>alert('修改成功！'); window.location.href='categorylist.php';</script>";
}
//删除操作
if($act=="del")
{
$id=isint($_GET["id"]);
$url=$_SERVER["HTTP_REFERER"];
$sql="delete from category where c_id='$id'";
mysqli_query($conn, $sql);
mysqli_query($conn, "delete from product where c_id='$id'");
echo "<script>alert('已经删除成功！'); window.location.href='".$url."';</script>";
}

?>