<?
include("../inc/checkadmin.php");
include("../inc/conn.php");
include("../inc/func.php");
$act=$_GET["act"];
//删除操作
if($act=="del")
{
$id=$_GET["id"];
$url=$_SERVER["HTTP_REFERER"];
$sql="delete from pj where pj_id='$id'";
mysqli_query($conn, $sql);
echo "<script>alert('已经删除成功！'); window.location.href='".$url."';</script>";
}

?>