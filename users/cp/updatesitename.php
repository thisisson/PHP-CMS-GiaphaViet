<?php
	session_start();
	if(!isset($_SESSION["userType"])||$_SESSION["userType"]!=1)	die("Hackingout...");
	include("../../config/config.php");
	
	$content = m_htmlchars($_POST['title']);
	
	$tmp = array();
	$db = new DB();
	$sql = "update SITE_INFO SET INFO='".$content."' where ID = 1";
	
	$result = $db->Query($sql);
		if(!$result){
			$tmp['status'] = false;
			$tmp['msg'] = "Lỗi xảy ra";
		}
		else{
			$tmp['status'] = true;
			$tmp['msg'] = "Thành công";
		}

	echo json_encode($tmp);
?>