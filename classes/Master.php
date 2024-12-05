<?php
require_once('../config.php');
Class Master extends DBConnection {
	private $settings;
	public function __construct(){
		global $_settings;
		$this->settings = $_settings;
		parent::__construct();
	}
	public function __destruct(){
		parent::__destruct();
	}
	function capture_err(){
		if(!$this->conn->error)
			return false;
		else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
			return json_encode($resp);
			exit;
		}
	}
	function save_department(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `tieuban` set {$data} ";
		}else{
			$sql = "UPDATE `tieuban` set {$data} where id = '{$id}' ";
		}
		$check = $this->conn->query("SELECT * FROM `tieuban` where `ten`='{$ten}' ".($id > 0 ? " and id != '{$id}'" : ""))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Tên Tiểu Ban Đã Tồn Tại.";
		}else{
			$save = $this->conn->query($sql);
			if($save){
				$rid = !empty($id) ? $id : $this->conn->insert_id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = "Chi tiết tiểu ban đã được thêm thành công.";
				else
					$resp['msg'] = "Chi tiết tiểu ban đã được cập nhật thành công.";
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "Đã xảy ra lỗi.";
				$resp['err'] = $this->conn->error."[{$sql}]";
			}
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function delete_department(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `tieuban` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Tiểu ban đã được xóa thành công.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_curriculum(){
		extract($_POST);
		$data = "";
		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id'))){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		if(empty($id)){
			$sql = "INSERT INTO `khoa` set {$data} ";
		}else{
			$sql = "UPDATE `khoa` set {$data} where id = '{$id}' ";
		}
		$check = $this->conn->query("SELECT * FROM `khoa` where `ten`='{$ten}' and `matieuban` = '{matieuban}' ".($id > 0 ? " and id != '{$id}'" : ""))->num_rows;
		if($check > 0){
			$resp['status'] = 'failed';
			$resp['msg'] = "Tên Khoa Đã Tồn Tại.";
		}else{
			$save = $this->conn->query($sql);
			if($save){
				$rid = !empty($id) ? $id : $this->conn->insert_id;
				$resp['status'] = 'success';
				if(empty($id))
					$resp['msg'] = "Đã thêm chi tiết khoa thành công.";
				else
					$resp['msg'] = "Chi tiết khoa đã được cập nhật thành công
					.";
			}else{
				$resp['status'] = 'failed';
				$resp['msg'] = "Đã xảy ra lỗi.";
				$resp['err'] = $this->conn->error."[{$sql}]";
			}
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
	function delete_curriculum(){
		extract($_POST);
		$del = $this->conn->query("DELETE FROM `khoa` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Khoa đã được xóa thành công.");
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);

	}
	function save_archive(){
			$_POST['mssv'] = $this->settings->userdata('id');//Chú ý
			$_POST['makhoa'] = $this->settings->userdata('makhoa');
		
		if(isset($_POST['madetai']))
		$_POST['madetai'] = htmlentities($_POST['madetai']);
		if(isset($_POST['kinhphi'])) {
			// Lấy giá trị từ trường "kinhphi"
			$kinhphi = $_POST['kinhphi'];
			
			// Chuyển đổi giá trị int
			$kinhphi = intval($kinhphi);
		}
		if(isset($_POST['motadetai']))
		$_POST['motadetai'] = htmlentities($_POST['motadetai']);
		if(isset($_POST['thanhvien']))
		$_POST['thanhvien'] = htmlentities($_POST['thanhvien']);
		$data = "";		

		foreach($_POST as $k =>$v){
			if(!in_array($k,array('id')) && !is_array($_POST[$k])){
				if(!is_numeric($v))
					$v = $this->conn->real_escape_string($v);
				if(!empty($data)) $data .=",";
				$data .= " `{$k}`='{$v}' ";
			}
		}
		$id = $_POST['id'];
		if(empty($id)){
			$sql = "INSERT INTO `detai` set {$data} ";
		}else{
			$sql = "UPDATE `detai` set {$data} where id = $id ";
			$sql = "UPDATE `detai` set `status` = 0 where id = $id ";
		}
		
		

		$save = $this->conn->query($sql);
		if($save){
    		$aid = !empty($id) ? $id : $this->conn->insert_id;
			$resp['status'] = 'success';
			$resp['id'] = $aid;
		if(empty($id))
			$resp['msg'] = "Đề xuất đề tài thành công.";
		else
			$resp['msg'] = "Chi tiết đề tài đã được cập nhật.";

		if(isset($_FILES['img']) && $_FILES['img']['tmp_name'] != ''){
			// Xử lý tải lên hình ảnh
				$fname = 'uploads/banners/archive-'.$aid.'.png';
				$dir_path = base_app . $fname;
				$upload = $_FILES['img']['tmp_name'];
				$type = mime_content_type($upload);
				$allowed = array('image/png', 'image/jpeg');
				$uploaded = move_uploaded_file($_FILES['img']['tmp_name'], $dir_path);
				$this->conn->query("UPDATE `detai` SET `banner_path` = CONCAT('{$fname}','?v=',unix_timestamp(CURRENT_TIMESTAMP)) WHERE id = '{$aid}' ");
		}

			if(isset($_FILES['pdf']) && $_FILES['pdf']['tmp_name'] != ''){
				// Xử lý tải lên tệp PDF
				$fname = 'uploads/pdf/archive-'.$aid.'.pdf';
				$dir_path = base_app . $fname;
				$upload = $_FILES['pdf']['tmp_name'];
				$type = mime_content_type($upload);
				$allowed = array('application/pdf');
				$uploaded = move_uploaded_file($_FILES['pdf']['tmp_name'], $dir_path);
				$this->conn->query("UPDATE `detai` SET `document_path` = CONCAT('{$fname}','?v=',unix_timestamp(CURRENT_TIMESTAMP)) WHERE id = '{$aid}' ");
			}
	} else {
			$resp['status'] = 'failed';
			$resp['msg'] = "Đã xảy ra lỗi.";
			$resp['err'] = $this->conn->error . " [{$sql}]";
		}

		if($resp['status'] == 'success')
			$this->settings->set_flashdata('success', $resp['msg']);
		return json_encode($resp);
	}
	function delete_archive(){
		extract($_POST);
		$get = $this->conn->query("SELECT * FROM `detai` where id = '{$id}'");
		$del = $this->conn->query("DELETE FROM `detai` where id = '{$id}'");
		if($del){
			$resp['status'] = 'success';
			$this->settings->set_flashdata('success',"Đã xóa thành công.");
			if($get->num_rows > 0){
				$res = $get->fetch_array();
				$banner_path = explode("?",$res['banner_path'])[0];
				$document_path = explode("?",$res['document_path'])[0];
				if(is_file(base_app.$banner_path))
					unlink(base_app.$banner_path);
				if(is_file(base_app.$document_path))
					unlink(base_app.$document_path);
			}
		}else{
			$resp['status'] = 'failed';
			$resp['error'] = $this->conn->error;
		}
		return json_encode($resp);
	}
	function update_status(){
		extract($_POST);
		$update = $this->conn->query("UPDATE `detai` set status  = '{$status}' where id = '{$id}'");
		if($update){
			$resp['status'] = 'success';
			$resp['msg'] = "Trạng thái lưu trữ đã được cập nhật thành công.";
		}else{
			$resp['status'] = 'failed';
			$resp['msg'] = "Đã xảy ra lỗi. Lỗi: " .$this->conn->error;
		}
		if($resp['status'] =='success')
		$this->settings->set_flashdata('success',$resp['msg']);
		return json_encode($resp);
	}
}

$Master = new Master();
$action = !isset($_GET['f']) ? 'none' : strtolower($_GET['f']);
$sysset = new SystemSettings();
switch ($action) {
	case 'save_department':
		echo $Master->save_department();
	break;
	case 'delete_department':
		echo $Master->delete_department();
	break;
	case 'save_curriculum':
		echo $Master->save_curriculum();
	break;
	case 'delete_curriculum':
		echo $Master->delete_curriculum();
	break;
	case 'save_archive':
		echo $Master->save_archive();
	break;
	case 'delete_archive':
		echo $Master->delete_archive();
	break;
	case 'update_status':
		echo $Master->update_status();
	break;
	// case 'save_payment':
	// 	echo $Master->save_payment();
	// break;
	// case 'delete_payment':
	// 	echo $Master->delete_payment();
	// break;
	default:
		// echo $sysset->index();
		break;
}