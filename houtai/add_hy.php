
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>添加用户</title>
<link rel="stylesheet" type="text/css" href="Admin_Style.css">
</head>

<body onLoad="">

  <table border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr class="title">
      <td height="22" align="center">&nbsp;</td>
    </tr>
    <tr align="center">
      <td>
	<table width="100%" border="0" cellpadding="2" cellspacing="1">
	<form action="save_hy.php?act=add" method="post" name="form10">
          <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>账号：</strong></td>
            <td width="595"><span style="COLOR: #880000">
              <input name="username" type="text" id="username">
            </span><font color="#FF0000">*</font></td>
          </tr>
		   <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>密码：</strong></td>
            <td width="595"><span style="COLOR: #880000">
              <input name="password" type="text" id="password">
            </span><font color="#FF0000">*</font></td>
          </tr>
		   <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>姓名：</strong></td>
            <td width="595"><span style="COLOR: #880000">
              <input name="realname" type="text" id="realname">
            </span><font color="#FF0000">*</font></td>
          </tr>
		   <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>邮箱：</strong></td>
            <td width="595"><span style="COLOR: #880000">
              <input name="email" type="text" id="email">
            </span><font color="#FF0000">*</font></td>
          </tr>
		  <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>性别：</strong></td>
            <td width="595"><span style="COLOR: #880000">
              <select id="sex" name="sex">
				<option value="男">男</option>
			  <option value="女">女</option>
			  </select>
            </span><font color="#FF0000">*</font></td>
          </tr>
          <tr class="tdbg"> 
            <td width="100" height="24" align="right" valign="middle"></td>
            <td><input type="submit" name="Submit" value="提交"> <input type="reset" name="Submit2" value="重置"></td>
          </tr>
		  </form>
        </table>
      </td>
    </tr>
  </table>
  

</body>
</html>
