
<?php 
require_once('../../config.php');
if(isset($_GET['id']) && $_GET['id'] > 0){
    $user = $conn->query("SELECT g.*,k.ten as khoa, hoten FROM giangvien g inner join khoa k on g.makhoa = k.id where g.msgv ='{$_GET['id']}'");
    foreach($user->fetch_array() as $k =>$v){
        $$k = $v;
    }
}
?>
<style>
	#uni_modal .modal-footer{
		display:none
	}
	.student-img{
		object-fit:scale-down;
		object-position:center center;
	}
</style>
<div class="container-fluid">
	<div class="col-md-12">
		<div class="row">
			<!-- <div class="col-6">
				<center>
					<img src="<?= validate_image($avatar) ?>" alt="Student Image" class="img-fluid student-img bg-gradient-dark border">
				</center>
			</div> -->
			<div class="col-12">
				<dl>
					<dt class="text-navy">Họ tên:</dt>
					<dd class="pl-4"><?= ucwords($hoten) ?></dd>
					<dt class="text-navy">Mã số giảng viên:</dt>
					<dd class="pl-4"><?= ucwords($msgv) ?></dd>
					<dt class="text-navy">Học hàm:</dt>
					<dd class="pl-4"><?= ucwords($hocham) ?></dd>
					<dt class="text-navy">Học vị:</dt>
					<dd class="pl-4"><?= ucwords($hocvi) ?></dd>
					<!-- <dt class="text-navy">Email:</dt>
					<dd class="pl-4"><?= $email ?></dd> -->
					<!-- <dt class="text-navy">Tên Tiểu Ban:</dt>
					<dd class="pl-4"><?= ucwords($department) ?></dd> -->
					<dt class="text-navy">Khoa:</dt>
					<dd class="pl-4"><?= ucwords($khoa) ?></dd>
					<!-- <dt class="text-navy">System Account Status:</dt>
					<dd class="pl-4">
						<?php if($status == 1): ?>
							<span class="badge badge-pill badge-success">Verified</span>
						<?php else: ?>
						<span class="badge badge-pill badge-primary">Not Verified</span>
						<?php endif; ?>
					</dd> -->
				</dl>
			</div>
		</div>
		<div class="row">
			<div class="col-12 text-right">
				<button class="btn btn-dark btn-flat btn-sm" data-dismiss="modal" type="button"><i class="fa fa-times"></i> Đóng</button>
			</div>
		</div>
	</div>
</div>