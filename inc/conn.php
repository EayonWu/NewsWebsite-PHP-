<?
error_reporting(E_ALL ^ E_NOTICE);//报错级别设置
$conn=mysqli_connect("localhost:8889","root", "root", "2017news");//127.0.0.1是MySql IP,root是帐号,如果有密码请填写在""中
#mysqli_select_db("2017news"); 
mysqli_query($conn, "set names utf8");
function txtClean($valueString){
            $txt=array("\n","\r");
            $html=array(" "," ");
            return str_replace($txt,$html,$valueString);
        }
?> 