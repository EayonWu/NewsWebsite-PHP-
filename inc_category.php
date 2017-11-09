<table width="100%" border="0" cellpadding="0" cellspacing="0" class="border">
          <tr>
            <td height="32" background="images/lanmu_x.jpg" bgcolor="#E4E4E4" class="Zred">　　新闻分类</td>
          </tr>
          <tr>
            <td height="147" align="center" valign="middle"><table width="93%" border="0" align="center" cellpadding="0" cellspacing="0">
<?
$q=mysqli_query($conn, "select * from category");
while($rst=mysqli_fetch_array($q))
{		  
?>
                <tr>
                  <td width="10%" height="25" align="center" valign="middle"><span class="red12"><img src="images/icon_02.jpg" width="11" height="12" /></span></td>
                  <td width="90%" align="left" valign="middle" class="text12"><a href="arc.php?c_id=<?=$rst["c_id"]?>" class="text12">
       <?=$rst["category"]?>
     </a></td>
                </tr>
                <tr>
                  <td height="1" colspan="2" background="images/dot.gif"></td>
                </tr>
<?
}
mysqli_free_result($q);
?>
                
            </table></td>
          </tr>
          <tr>
            <td height="8" colspan="2" background=""></td>
          </tr>
        </table>