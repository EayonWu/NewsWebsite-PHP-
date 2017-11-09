<?
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
    <td width="70" height="30" ><strong></strong></td>
    <td>&nbsp;</td>
  </tr>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tr>
        <td height="15" align="right"></td>
      </tr>
</table>
<table width="100%" border="0" cellpadding="2" cellspacing="1">
      <tr>
        <td height="10" align="right"></td>
      </tr>
</table>
<table width='66%' border="0" cellpadding="0" cellspacing="0" align=center>
  <tr>
   
     <td><table class="border" border="0" cellspacing="1" width="100%" cellpadding="0">
          <tr class="title" height="22"> 
            <td width="473" height="22" align="center">标题</td>
            <td width="127" align="center">分类</td>
            <td align="center"  width=132>时间</td>
            <td width="141" align="center" ><strong>操作</strong></td>
          </tr>
          <?php
$sql="select * from arc where 1=1";
$sql=$sql." order by arc_id desc";
$q_tj=mysqli_query($conn, $sql);
while($rst=mysqli_fetch_array($q_tj))
{
   $sum=$rst["sf"]+$sum;
}
mysqli_free_result($q_tj);
//
$num=mysqli_num_rows(mysqli_query($conn, $sql));
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
$exec=$sql." limit ".($page*$pagesize).",$pagesize"; 
$result=mysqli_query($conn, $exec);
if($num==0)
{
 echo "<tr><td colspan=7>暂时没有信息</td></tr>";
}
else
{
while($rs=mysqli_fetch_array($result))
{
?>
          <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'"> 
            <td height="24" align="center"><?=$rs["title"]?></td>
            <td height="24" align="center"><?=turn_category($conn, $rs["c_id"])?></td>
            <td align="center"><?=$rs["rq"]?></td>
            <td width="141" align="center"><a href="save_arc.php?act=del&id=<?=$rs["arc_id"]?>" onClick="{if(confirm('确定删除吗?')){return true;}return false;}"><font color="#000000">删除</font></a> <a href="edit_arc.php?id=<?=$rs["arc_id"]?>">修改</a></td>
          </tr>
<?
}
}
?>
		 
            </table></td>
  </tr>
		  <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'">
			<td align=center  colspan=7  height=30>
			<div align="center" class="text1">
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
</div>			</td>
		  </tr>
</table>

</td>
</tr></table>
</body>
</html>
