
<table width="980" height="35" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#999999">
  <tr>
    <td background="images/dh.jpg"><table width="935" height="22" border="0" cellpadding="0" cellspacing="0">
      <tr>
        <td width="145" align="center"><a href="index.php" class="bs">首 页</a></td>
<?
$q=mysqli_query($conn, "select * from category");
while($rst=mysqli_fetch_array($q))
{		  
?>
 <td width="138" align="center"><a href="arc.php?c_id=<?=$rst["c_id"]?>" class="bs"><?=$rst["category"]?></a></td>
<?
}
mysqli_free_result($q);
?>
      
        <td width="514" class="bs">&nbsp;</td>
        <td width="138">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>

