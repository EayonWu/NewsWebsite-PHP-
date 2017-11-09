<?
session_start();
include("inc/conn.php");
include("inc/func.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>或许这就是新闻网站吧</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/bj.jpg);
	background-repeat: repeat-x;
}
-->
</style></head>

<body>
<?
include("top.php");
?>


<table width="100" height="6" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
</table>
<table width="980" height="386" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td width="240" height="386" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0">
     
      <tr>
        <td height="186" align="left" valign="top">
		<?
		include("inc_category.php");
		?>
		</td>
      </tr>
    </table></td>
    <td width="10">&nbsp;</td>
    <td align="left" valign="top">
	<table width="100%" border="0" cellspacing="0" cellpadding="0">
<?
$sql=mysqli_query($conn, "select * from category order by c_id desc");
while($row=mysqli_fetch_array($sql))
{
$m=$m+1;
$arry[$m]=$row["category"];
$arryid[$m]=$row["c_id"];
}
mysqli_free_result($sql);
?>
<?
for($i=1;$i<=3;$i++){
?>
      <tr>
	  <?
		  for($j=1;$j<=2;$j++)
			{
			  $t++;
		?>
        <td width="358" height="188" align="left" valign="top"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
          <tr>
            <td height="32" background="images/lanmu_z.jpg">　　<span class="Zred"><? echo $arry[$t]?></span></td>
          </tr>
          <tr>
   <td height="147" align="left" valign="top">
   <!--开始-->
   <table width="97%" border="0" align="center" cellpadding="0" cellspacing="0">
   <?
   $query=mysqli_query($conn ,"select * from arc where c_id='".$arryid[$t]."' order by arc_id desc limit 6");
   while($rs=mysqli_fetch_array($query))
   {
   ?>
                <tr>
                  <td width="8%" height="25" align="center" valign="middle"><span class="red12"><img src="images/icon_02.jpg" width="11" height="12" /></span></td>
                  <td width="67%" align="left" valign="middle"><a href="show_arc.php?id=<?=$rs["arc_id"]?>" class="text12"><?=left($rs["title"],16)?></a></td>
                  <td width="25%" align="left" valign="middle" class="text12">&lt;<?=$rs["rq"]?>&gt;</td>
                </tr>
                <tr>
                  <td height="1" colspan="3" background="images/dot.gif"></td>
                </tr>
				<?
				}
				mysqli_free_result($query);
				?>
                
            </table>
   <!--结束--></td>
   
          </tr>
          <tr>
            <td height="8" colspan="2" background=""></td>
          </tr>
        </table></td>
        <td width="13">&nbsp;</td>
		<?
				if($t==sizeof($arry)) break;
				}
			?>
       
      </tr>
	   <tr>
        <td height="8" colspan="3"></td>
        </tr>
      <tr>
      <?
	if($t==sizeof($arry)) break;
		}
		unset($t);
		unset($i);
		unset($j);
		unset($arry);
	    unset($arryid);
		unset($m);
				?>
    </table></td>
  </tr>
</table>
<table width="100" height="10" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="6"></td>
  </tr>
</table>
<?
include("copy.php");
?>
</body>
</html>
