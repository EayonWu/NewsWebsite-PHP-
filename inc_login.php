<table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
          <tr>
            <td height="32" background="images/lanmu_x.jpg">　　<span class="Zred">会员中心</span></td>
          </tr>
          <tr>
            <td height="155" align="center" valign="middle">
<?
	if(empty($_SESSION["userid"]))
	{
?>
			<table width="95%" border="0" cellspacing="0" cellpadding="0">
			<form action="login.php" method="post">
                <tr>
                  <td width="36%" height="39" align="right" valign="middle" class="hei14">帐号：</td>
                  <td width="64%" align="left" valign="middle" class="hei14"><input name="userid" type="text" class="shuru" id="userid" size="12" /></td>
                </tr>
                <tr>
                  <td height="38" align="right" valign="middle" class="hei14">密码：</td>
                  <td height="38" align="left" valign="middle"><input name="password" type="password" class="shuru" id="password" size="12" /></td>
                </tr>
                <tr>
                  <td height="45" align="right" valign="middle" class="hei14">&nbsp;</td>
                  <td height="45" align="left" valign="middle"><input name="Submit" type="submit" class="hei14" value="登 陆" />
                    <a href="reg.php" class="zong">注册</a></td>
                </tr>
              </form>
            </table>
<?
	}
	else
	{
?>
<table width="95%" border="0" cellspacing="0" cellpadding="0">
			
                <tr>
                  <td height="39" align="center" valign="middle" class="hei14">欢迎您,<?=$_SESSION["userid"]?></td>
                </tr>
                <tr>
                  <td height="38" align="center" valign="middle"><a href="edit_hy.php" class="text12">修改资料</a></td>
                </tr>
                <tr>
             <td height="35" align="center" valign="middle"><a href="exit.php" class="text12">退出登录</a></td>
                </tr>
               
            </table>
<?
}
?>
			</td>
          </tr>
        </table>