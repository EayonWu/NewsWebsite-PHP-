<?
include("../inc/checkadmin.php");
include("../inc/conn.php");
include("../inc/func.php");
?>
<html>
<head>
<title>管理</title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<meta name="GENERATOR" content="Microsoft FrontPage 6.0">
<link rel="stylesheet" type="text/css" href="Admin_Style.css">

</head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg"> 
    <td height="22" colspan="2"  align="center"><strong>后 台 管 理</strong></td>
  </tr>
  <tr class="tdbg"> 
    <td width="160" height="30" ><strong></strong></td>
    <td width="1160">&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="title"> 
    <td height="22">&nbsp;</td>
  </tr>
</table>
<br><br>
<table width='63%' border="0" cellpadding="0" cellspacing="0" align=center>
  <tr>
   
     <td><table class="border" border="0" cellspacing="1" width="100%" cellpadding="0">
          <tr class="title" height="22"> 
            <td width="696" height="22" align="center">内容</td>
            <td width="139" align="center" ><strong>操作</strong></td>
          </tr>
           <?php
 $execc="select count(*) from pj";
$resultc=mysqli_query($conn, $execc);
$rsc=mysqli_fetch_array($resultc);
$num=$rsc[0];
$pagesize=15;
$pagecount=ceil($num/$pagesize)-1;

if(empty($_GET["page"]))
{
$page=0;
}
else
{
$page=$_GET["page"];
}
if($page<0)
{
$page=0;
}
if($page>$pagecount)
{
$page=ceil($num/$pagesize)-1;
}
$nextpage=$page+1;
$prepage=$page-1;
$exec="select * from pj order by pj_id desc limit ".($page*$pagesize).",$pagesize"; 

$result=mysqli_query($conn, $exec);
if($num==0)
{
 echo "暂无信息";
}
else
{
while($rs=mysqli_fetch_array($result))
{
?>
          <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'"> 
            <td height="24" align="center"><?=left($rs["content"],100)?></td>
            <td width="139" align="center"><a href="save_pl.php?act=del&id=<?=$rs["pj_id"]?>" class="text12">删除</a></td>
          </tr>
<?
  }
}
?>
		  <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'">
			<td align=center  colspan=2  height=30><div align="center" class="text1">
共有<?=$num?>条记录　分<?=ceil($num/$pagesize)?>页显示　当前是第<?=$page+1?>页
<a href="?page=0" class="text1">首页</a>
<?
if ($page==0) echo "<span class='text1'>上一页</span>";
else echo "<a href='?page=$prepage' class='text1'>上一页</a>";
?>
<?
if($page==$pagecount) echo "<span class='text1'>下一页</span>";
else echo "<a href='?page=$nextpage' class='text1'>下一页</a>"; 
?>

<?
if($page==$pagecount) echo "<span class='text1'>尾页</span>";
else echo "<a href='?page=$pagecount' class='text1'>尾页</a>";
?>

</div></td>
		  </tr>
        </table>

</td>
</tr></table>
</body>
</html>
