<?php 

include "../../config/connect.php";

if(isset($_POST['action']) && $_POST['action']=="edit"){
	$_error_msg = null;
	$_success_msg = null;	
	// อัพเดทข้อมูลโดยอ้างอิงจาก primary ในที่นี้ส่ง userid 
	if(isset($_POST['userid']) && $_POST['userid']!=""){			
		$sql = "
		UPDATE tm02_otherinc SET 
		OthINCEDesc='".$_POST['password']."',
		OthINCTDesc='".$_POST['fullname']."',
        OthIncAmt='".$_POST['usertype']."',
        TaxCalFlag='".$_POST['TaxCalFlag']"'
		WHERE OthINCCode=".$_POST['userid']."		
		";
		$result = $mysqli->query($sql);
		if($result){
			if($mysqli->affected_rows>0){
				$_success_msg = "Change user data successful!";
			}else{
				$_success_msg = "Update user successful!";
			}			
		}else{
			$_error_msg = "Eror, please try again!";
		}
	}
	$json_data[]=array(  
		"success" => $_success_msg,
		"error" => $_error_msg
	);     
	// จะได้ตัวแปร $json_data  สำหรับสร้างเป็น json data					
}

?>