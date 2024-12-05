<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT a.* FROM `detai` a where a.id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    $submitted = "N/A";
    if(isset($mssv)){
        $student = $conn->query("SELECT * FROM sinhvien where id = '{$mssv}'");
        if($student->num_rows > 0){
            $res = $student->fetch_array();
            $submitted =$res['hoten']." ".$res['mssv'];//Chú ý
        }
    }
    $submitted1 = "N/A";
    if(isset($msgv)){
        $gv = $conn->query("SELECT * FROM giangvien where msgv = '{$msgv}'");
        if($gv->num_rows > 0){
            $res = $gv->fetch_array();
            $submitted1 =$res['hocham']." ".$res['hocvi']." ".$res['hoten'];//Chú ý
        }
    }
}
?>
<style>
    #document_field{
        min-height:80vh
    }
</style>
<div class="content py-4">
    <div class="col-12">
        <div class="card card-outline card-primary shadow rounded-0">
            <div class="card-header">
                <h1 class="card-title">
                    <?= isset($tendetai) ? $tendetai : "" ?> - <?= isset($madetai) ? $madetai : "" ?>
                </h3>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <h2><b><?= isset($title) ? $title : "" ?></b></h2>
                    <small class="text-muted">Đăng bởi <b class="text-info"><?= $submitted ?></b> lúc  <?= date("h:i A, d F Y",strtotime($date_created)) ?></small>
                    <!-- <?php if(isset($mssv) && $mssv == $_settings->userdata('id')): ?>
                        <div class="form-group">
                            <a href="./?page=submit-archive&id=<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-default bg-navy btn-sm"><i class="fa fa-edit"></i> Sửa</a>
                            <button type="button" data-id = "<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-danger btn-sm delete-data"><i class="fa fa-trash"></i> Xóa</button>
                        </div>
                    <?php endif; ?> -->
                    <hr>
                    <center>
                        <img src="<?= validate_image(isset($banner_path) ? $banner_path : "") ?>" alt="Banner Image" id="banner-img" class="img-fluid border bg-gradient-dark">
                    </center>
                    <fieldset>
                        <legend class="text-navy">Năm thực hiện:</legend>
                        <div class="pl-4"><large><?= isset($namthuchien) ? $namthuchien : "----" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Mô tả đề tài:</legend>
                        <div class="pl-4"><large><?= isset($motadetai) ? html_entity_decode($motadetai) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Chủ nhiệm đề tài:</legend>
                        <div class="pl-4"><large><?= isset($submitted) ? html_entity_decode($submitted) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Giảng viên hướng dẫn:</legend>
                        <div class="pl-4"><large><?= isset($submitted1) ? html_entity_decode($submitted1) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Thành viên:</legend>
                        <div class="pl-4"><large><?= isset($thanhvien) ? html_entity_decode($thanhvien) : "" ?></large></div>
                    </fieldset>
                    <fieldset>
                        <legend class="text-navy">Thông tin kết quả:</legend>
                        <div class="pl-4">
                            <iframe src="<?= isset($document_path) ? base_url.$document_path : "" ?>" frameborder="0" id="document_field" class="text-center w-100">Loading Document ...</iframe>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.delete-data').click(function(){
            _conf("Bạn có chắc chắn xóa <b>Đề tài-<?= isset($madetai) ? $madetai : "" ?></b>","delete_archive")
        })
    })
    function delete_archive(){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_archive",
			method:"POST",
			data:{id: "<?= isset($id) ? $id : "" ?>"},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("Đã xảy ra lỗi.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.replace("./");
				}else{
					alert_toast("Đã xảy ra lỗi.",'error');
					end_loader();
				}
			}
		})
	}
</script>