<?
//公用函数，截取字符串,汉字专用
function left($title,$length){  
$encoding='gb2312'; 
if(mb_strlen($title,$encoding)>$length){ 
$title=mb_substr($title,0,$length,$encoding); 
} 
return $title; 
} 
function get_category($conn, $id)
{
         $gs="";
$result=mysqli_query($conn, "select * from category where c_id='$id'");
	     $rs=mysqli_fetch_assoc($result);
  return $rs;
}
function get_hy($conn, $id)
{
 $result=mysqli_query($conn, "select * from hy where hy_id='$id'");
	     $rs=mysqli_fetch_assoc($result);
  return $rs;
}
//函数作用：根据帮助文档大类ID数值判断出对应的分类
function turn_category($conn, $id)
{
         $gs="";
		 $result=mysqli_query($conn, "select * from category where c_id='$id'");
	     $rs=mysqli_fetch_assoc($result);
		 $gs=$rs["category"];
  return $gs;
}
//自动生成订单号
function get_dingdan()
{
$dingdanhao=date("Y-m-dH-i-s");
$dingdanhao=str_replace("-","",$dingdanhao);
$dingdanhao .= rand(1000,2000);
return $dingdanhao;
}
//根据现存库存来决定是否报警
function get_warning($kc,$bj)
{
	$s="";
	if($kc>$bj)
	{
	  $s="正常";
	}
	else
	{
	  $s="<font color=red>低于安全库存</font>";
	}
	return $s;
}
//验证会员帐号是否存在
function exist_member($conn, $userid)
{
  $query=mysqli_query($conn, "select * from hy where userid='$userid'");
  $num=mysqli_num_rows($query);
   mysqli_free_result($query);
   return $num;
}
//根据session参数得到会员ID
function getmemberid($conn, $userid)
{
$query=mysqli_query($conn,"select * from shop_member where userid='$userid'");
$rs=mysqli_fetch_assoc($query);
$member_id=$rs["member_id"];
mysqli_free_result($query);
return $member_id;
}
//根据ID参数得到会员姓名
function getmembername($conn, $id)
{
$query=mysqli_query($conn, "select * from shop_member where member_id='$id'");
$rs=mysqli_fetch_assoc($query);
$name=$rs["name"];
mysqli_free_result($query);
return $name;
}
//检查是否为空或是否是数字
function isint($id)
{
  if(empty($id))
   {
   echo "<script>";
   echo "location.href='error.php';";
   echo "</script>";
   }
   //如果不为空，判断是否是数字
   if(!is_numeric($id))
   {
   echo "<script>";
   echo "location.href='error.php';";
   echo "</script>";
   }
   return $id;
}
//实现商品编号的自动(5位编码)
function init_prono()
{
  $query=mysqli_query($conn, "select product_id from shop_product");
  $num=mysqli_num_rows($query);
  $autoid="";
  if($num==0){
       $autoid=1;
       }
   else{
        $autoid=$num+1;
        }
	$autoid=(string)$autoid;
	 switch (strlen($autoid)){
	     case 1:$autoid="p000".$autoid;
		 break;
		 case 2: $autoid="p00".$autoid;
		 break;
		 case 3: $autoid="p0".$autoid;
		 break;
		 case 4: $autoid="p".$autoid;
		 break;
	        }
		return $autoid;
}
//根据订单数字状态返回订单的操作状态
function get_orderstage($state)
{
   $order_state="";
   switch($state){
       case 0:$order_state="正在处理";break;
	   case 1:$order_state="已发货";break;
	   case 2:$order_state="货已经收到";break;
	   case 3:$order_state="交易完成";break;
	}
	return $order_state;
}
//根据表名和数字返回头几条
function query($sql)
{
$query=mysqli_query($conn, $sql);
return $query;
}
//关闭查询
function closequery($query)
{
  mysqli_free_result($query);
}
?>
