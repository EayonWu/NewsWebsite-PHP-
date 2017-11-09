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
    <td width="145" height="30" ><strong></strong></td>
    <td width="1175">&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="title"> 
    <td height="22">管理</td>
  </tr>
</table>
<table width="351" border="0" align="center" cellpadding="0" cellspacing="0">
  <form action="hylist.php">
    <tr>
      <td width="98" height="33" align="center">姓名:</td>
      <td width="173" align="center"><input name="key" type="text" id="key" size="15"></td>
      <td width="80" align="center"><input type="submit" name="Submit" value="查询"></td>
    </tr>
  </form>
</table>
<br>
<table width='70%' border="0" cellpadding="0" cellspacing="0" align=center>
  <tr>
   
     <td><table class="border" border="0" cellspacing="1" width="100%" cellpadding="0">
          <tr class="title" height="22"> 
            <td height="22" width="40" align="center">&nbsp;</td>
            <td width="95" align="center"  height="22"><strong>账号</strong></td>
            <td align="center"  width=223><strong>密码</strong></td>
            <td align="center"  width=183>姓名</td>
            <td align="center"  width=75>性别</td>
            <td  width=152 align="center">email</td>
            <td width="155" align="center" ><strong>操作</strong></td>
          </tr>
           <?php
$key=$_GET["key"];
$sql="select * from hy where 1=1";
if(!empty($key))
{
  $sql=$sql." and name like '%".$key."%'";
}

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
$exec=$sql." order by hy_id desc limit ".($page*$pagesize).",$pagesize"; 
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
            <td width="40" height="24" align="center">&nbsp;</td>
            <td width="95" align="center"><?=$rs["userid"]?></td>
            <td align="center"><?=$rs["password"]?></td>
            <td align="center"><?=$rs["name"]?></td>
            <td align="center"><?=$rs["sex"]?></td>
            <td align="center"><?=$rs["email"]?></td>
            <td width="155" align="center"><a href="save_hy.php?act=del&id=<?=$rs["hy_id"]?>" class="text12">删除</a></td>
          </tr>
<?
  }
}
?>
		  <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'">
			<td align=center  colspan=7  height=30><div align="center" class="text1">
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
