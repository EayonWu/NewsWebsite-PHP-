<?
session_start();
include("../inc/conn.php");
include("../inc/func.php");
$user=$_POST["username"];
$password=$_POST["password"];
   $query=mysqli_query($conn, "select * from web_admin where web_admin='$user' and password='$password'");
   if(mysqli_num_rows($query)==0)
    {   
      echo "<script>alert('请输入正确的帐号密码！');window.top.location.href='admin_login.php'</script>";
    }
	else
	{
	  $rs=mysqli_fetch_assoc($query);
	  $_SESSION["adminname"]=$user;
	  $_SESSION["user_id"]=$rs["admin_id"];
	  echo "<script>window.location.href='index.php'</script>";
	}

?>