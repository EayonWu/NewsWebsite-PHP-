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
        <td height="472" align="left" valign="top">
		<?
		$id=$_GET["id"];
		$q=mysqli_query($conn, "select * from arc where arc_id='$id'");
		$rs=mysqli_fetch_assoc($q);
		?>
		<table width="98%" border="0" align="center">
          <tr>
            <td height="29" align="center" class="Zred"><?=$rs["title"]?></td>
          </tr>
          <tr>
            <td height="28" align="left" class="text12"><div  class="text12" style='line-height:23px;'>&nbsp;&nbsp;
                    <?=$rs["content"]?>
            </div></td>
          </tr>
          <tr>
            <td height="28" align="center" class="Zred"></td>
          </tr>
        </table>
		
		
		</td>
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
