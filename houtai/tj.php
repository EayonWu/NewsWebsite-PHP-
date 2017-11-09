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
<link rel="stylesheet" type="text/css" href="Admin_Style.css"></head>
<body leftmargin="2" topmargin="0" marginwidth="0" marginheight="0">
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg"> 
    <td height="22" colspan="2"  align="center"><strong>后 台 管 理</strong></td>
  </tr>
  <tr class="tdbg"> 
    <td width="143" height="30" ><strong></strong></td>
    <td width="1177">&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" border="0" align="center" cellpadding="2" cellspacing="1" class="border">
  <tr class="title"> 
    <td height="22">&nbsp;</td>
  </tr>
</table>
<br>
<table width="410" border="0" align="center" cellpadding="0" cellspacing="0">
  <form action="tj.php">
    <tr>
      <td width="85" height="33" align="center">查询类型:</td>
      <td width="113" align="center"><span style="COLOR: #880000">
        <select name="city" id="select">
       <option value="">请选择</option>
		  <?
	 $q=mysqli_query($conn, "select * from city");
	 while($rst=mysqli_fetch_array($q))
	 {
	 ?>
          <option value="<?=$rst["city_id"]?>">
          <?=$rst["city"]?>
          </option>
          <?
	  }
	  mysqli_free_result($q);
	  ?>
        </select>
      </span></td>
      <td width="122" align="center"><span style="COLOR: #880000">
        <select name="category" id="category">
          <option value="">请选择</option>
          <?
	 $q=mysqli_query($conn,"select * from category");
	 while($rst=mysqli_fetch_array($q))
	 {
	 ?>
          <option value="<?=$rst["c_id"]?>">
          <?=$rst["category"]?>
          </option>
     <?
	  }
	  mysqli_free_result($q);
	  ?>
        </select>
      </span></td>
      <td width="90" align="center"><input type="submit" name="Submit" value="查询"></td>
    </tr>
  </form>
</table>
<br>

<table width='800px' border="0" cellpadding="0" cellspacing="0" align=center>
  <tr>
   
     <td><table class="border" border="0" cellspacing="1" width="1013" cellpadding="0">
       <tr class="title" height="22">
         <td width="156" height="22" align="center">订单号</td>
         <td  width=209 align="center">名称</td>
         <td align="center"  width=114>生产地</td>
         <td align="center"  width=109>服装类型</td>
         <td align="center"  width=108>售出日期</td>
         <td align="center"  width=79>售出价格</td>
         <td align="center"  width=67>成本价</td>
         <td  width=66 align="center">数量</td>
         <td  width=93 align="center">盈利</td>
       </tr>
       <?php
$city=$_GET["city"];
$category=$_GET["category"];
$sql="select * from shop_order as a,product as b where a.product_id=b.product_id and a.order_state='已确认'";
if(!empty($city))
{
  $sql=$sql." and b.city_id='$city'";
}
if(!empty($category))
{
  $sql=$sql." and b.c_id='$category'";
}
//
$q_tj=mysqli_query($conn, $sql);
while($rst=mysqli_fetch_array($q_tj))
{
   $sum=$rst["order_price"]*$rst["order_num"]+$sum;
   $lr=$lr+($rst["order_price"]-$rst["cost_price"])*$rst["order_num"];
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
$exec=$sql." order by order_id desc limit ".($page*$pagesize).",$pagesize"; 
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
         <td height="24" align="center"><?=$rs["order_number"]?></td>
         <td align="center"><?=$rs["pro_name"]?></td>
         <td align="center"><?
			$r=get_city($rs["city_id"]);
			echo $r["city"];
			?>         </td>
         <td align="center"><?=turn_category($rs["c_id"])?></td>
         <td align="center"><?=$rs["ordertime"]?></td>
         <td align="center"><?=$rs["order_price"]?></td>
         <td align="center"><?=$rs["cost_price"]?></td>
         <td align="center"><?=$rs["order_num"]?></td>
         <td align="center"><?=($rs["order_price"]-$rs["cost_price"])*$rs["order_num"]?></td>
       </tr>
       <?
  }
}
?> 
<tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'">
         <td height="24" align="center">&nbsp;</td>
         <td colspan="8" align="left">总营业额：<font color="red"><?=$sum?></font>元 总利润：<font color="red"><?=$lr?></font>元 </td>
        </tr>
       <tr class="tdbg" onMouseOut="this.style.backgroundColor=''" onMouseOver="this.style.backgroundColor='#BFDFFF'">
         <td align=center  colspan=9  height=30><div align="center" class="text1"> 共有
               <?=$num?>
           条记录　分
           <?=ceil($num/$pagesize)?>
           页显示　当前是第
           <?=$page+1?>
           页 <a href="?page=0" class="text1">首页</a>
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
     </table></td>
  </tr></table>
</body>
</html>
