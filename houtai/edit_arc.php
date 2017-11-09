<?
include("../inc/checkadmin.php");
include("../inc/conn.php");
include("../inc/func.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<title>添加</title>
<link rel="stylesheet" type="text/css" href="Admin_Style.css">
</head>

<body onLoad="">
<?
  
    $id=$_GET["id"];
	$query=mysqli_query($conn, "select * from arc where arc_id='$id'");
	$rs=mysqli_fetch_assoc($query);

  ?>
  <table border="0" align="center" cellpadding="0" cellspacing="0" class="border">
    <tr class="title">
      <td height="22" align="center">&nbsp;</td>
    </tr>
    <tr align="center">
      <td>
	<table width="100%" border="0" cellpadding="2" cellspacing="1">
	<form action="save_arc.php?act=edit" method="post" name="form10">
	<input type="hidden" name="id" value="<?=$id?>">
	<input type="hidden" name="url" value="<?=$_SERVER["HTTP_REFERER"]?>">
          <tr class="tdbg">
            <td height="32" align="right">分类：</td>
            <td><span style="COLOR: #880000">
              <select name="category" id="zt">
                <?
	 $q=mysqli_query($conn, "select * from category");
	 while($rst=mysqli_fetch_array($q))
	 {
	 ?>
                <option value="<?=$rst["c_id"]?>" <? if($rst["c_id"]==$rs["c_id"]) echo "selected"?>>
                <?=$rst["category"]?>
                </option>
                <?
	  }
	  mysqli_free_result($q);
	  ?>
              </select>
            </span></td>
          </tr>
          <tr class="tdbg"> 
            <td width="100" height="32" align="right"><strong>标题：</strong></td>
            <td width="595"><input name="title" type="text" id="title" size="50" value="<?=$rs["title"]?>">
            <font color="#FF0000">*</font></td>
          </tr>
          <tr class="tdbg">
            <td height="67" align="right" valign="middle"><strong>内容：</strong></td>
            <td><div align="left">
				   <script charset="utf-8" src="kindeditor/kindeditor.js"></script>
	<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="kindeditor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
				cssPath : 'kindeditor/plugins/code/prettify.css',
				uploadJson : 'kindeditor/php/upload_json.php',
				fileManagerJson : 'kindeditor/php/file_manager_json.php',
				allowFileManager : true,
				afterBlur : function() {
this.sync();
K.ctrl(document, 13, function() {
K('form[name=form10]')[0].submit();
});
K.ctrl(this.edit.doc, 13, function() {
K('form[name=form10]')[0].submit();
});
}
			});
			prettyPrint();
		});
	</script>
     <textarea name="content" display="none" style="width:650px;height:400px;"><?=$rs['content']?></textarea>
                      
                    </div></td>
          </tr>
          <tr class="tdbg">
            <td height="24" align="right" valign="middle">日期：</td>
            <td><input name="rq" type="text" id="rq" value="<?=$rs["rq"]?>"></td>
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
