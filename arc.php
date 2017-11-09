<?
session_start();
include("inc/conn.php");
include("inc/func.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>无标题文档</title>
<link href="css.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
body {
	background-image: url(images/bj.jpg);
	background-repeat: repeat-x;
}
-->
</style></head>
<script>
function checkform()
{
    //
	if(form10.userid.value=="")    
	{
        form10.userid.focus();
        document.getElementById("div_username").innerHTML="请您输入账号!";
        return false;
    }
	else
	{
	  document.getElementById("div_username").innerHTML="";
	}
	//
	if(form10.password.value=="")    
	{
        form10.password.focus();
        document.getElementById("div_password").innerHTML="请您输入密码！!";
        return false;
    }
	else
	{
	  document.getElementById("div_password").innerHTML="";
	}

	//
	if(form10.name.value=="")    
	{
        form10.name.focus();
        document.getElementById("div_name").innerHTML="请您输入名字!";
        return false;
    }
	else
	{
	  document.getElementById("div_name").innerHTML="";
	}
	//
	if(form10.email.value=="")    
	{
        form10.email.focus();
        document.getElementById("div_email").innerHTML="请填写电子邮件!";
        return false;
    }
	else
	{
		 var strEmail = form10.email.value;  
		  var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
		  var email_Flag = reg.test(strEmail);
		  if(!email_Flag)
		  {
		    document.getElementById("div_email").innerHTML="请输入正确的格式";
			form10.email.focus();
		   return false;
		  }
	  document.getElementById("div_email").innerHTML="";
	}
	//

   form10.submit();
}
</script>
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
    <td align="left" valign="top"><table width="100%" height="506" border="0" cellpadding="0" cellspacing="0" class="border">
      <tr>
        <td height="32" background="images/lanmu.jpg"><table width="200" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td width="26" height="20">&nbsp;</td>
              <td width="174" align="left" valign="bottom" class="Zred">&nbsp;</td>
            </tr>
        </table></td>
      </tr>
      <tr>
        <td height="472" align="left" valign="top"><table width="97%" border="0" cellspacing="0" cellpadding="0">
          <?php
$c_id=$_GET["c_id"];
$sql="select * from arc where 1=1 and c_id='$c_id'";
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
          <tr>
            <td width="6%" height="30" align="center" valign="middle"><img src="images/icon_02.jpg" width="16" height="14" /></td>
            <td width="69%" align="left" valign="middle"><a href="show_arc.php?id=<?=$rs["arc_id"]?>" class="text12">
              <?=$rs["title"]?>
            </a></td>
            <td width="25%" align="center" valign="middle" class="text12"><?=$rs["rq"]?></td>
          </tr>
          <tr>
            <td height="1" colspan="3" background="images/dot.gif"></td>
          </tr>
          <?
}
}
?>
          <tr>
            <td height="31" colspan="3" align="center" valign="middle"><div align="center" class="text12"> 共有
              <?=$num?>
              条记录　分
              <?=ceil($num/$pagesize)?>
              页显示　当前是第
              <?=$page+1?>
              页 <a href="?page=0" class="text12">首页</a>
              <?
if ($page==0) echo "<span class='text12'>上一页</span>";
else echo "<a href='?page=$prepage' class='text12'>上一页</a>";
?>
              <?
if($page==$pagecount) echo "<span class='text12'>下一页</span>";
else echo "<a href='?page=$nextpage' class='text12'>下一页</a>"; 
?>
              <?
if($page==$pagecount) echo "<span class='text12'>尾页</span>";
else echo "<a href='?page=$pagecount' class='text12'>尾页</a>";
?>
            </div></td>
          </tr>
        </table></td>
      </tr>
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
