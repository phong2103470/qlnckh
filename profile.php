<?php 
        $user = $conn->query("SELECT s.*, c.ten as khoa FROM sinhvien s inner join khoa c on s.makhoa = c.id where s.id ='{$_settings->userdata('id')}'");
        // foreach($user->fetch_array() as $k =>$v){
        //     $$k = $v;
        // }
        if ($user && $user->num_rows > 0) {
            // Fetch the row as an associative array
            $row = $user->fetch_assoc();
        
            // Iterate over the associative array
            foreach ($row as $k => $v) {
                $$k = $v; // Assigning values to variables dynamically
            }
        }
?>
<style>
    .student-img{
		object-fit:scale-down;
		object-position:center center;
        height:200px;
        width:200px;
	}
</style>
<div class="content py-4">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header rounded-0">
            <h5 class="card-title">Thông tin cá nhân:</h5>
            <div class="card-tools">
                <a href="./?page=my_archives" class="btn btn-default bg-primary btn-flat"><i class="fa fa-archive"></i> Đề tài của tôi</a>
                <a href="./?page=manage_account" class="btn btn-default bg-navy btn-flat"><i class="fa fa-edit"></i> Cập nhật thông tin</a>
            </div>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-sm-12">
                            <center>
                                <img src="<?= validate_image($avatar) ?>" alt="Student Image" class="img-fluid student-img bg-gradient-dark border">
                            </center>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <dl>
                                <dt class="text-navy">Họ Tên SV:</dt>
                                <dd class="pl-4"><?= ucwords($hoten) ?></dd>
                                <dt class="text-navy">Mã Số SV:</dt>
                                <dd class="pl-4"><?= ucwords($mssv) ?></dd>
                                <dt class="text-navy">Ngành - Khóa:</dt>
                                <dd class="pl-4"><?= ucwords($nganh_khoa) ?></dd>
                                <dt class="text-navy">Giới Tính:</dt>
                                <dd class="pl-4"><?= ucwords($gioitinh) ?></dd>
                                <dt class="text-navy">Email:</dt>
                                <dd class="pl-4"><?= $email ?></dd>
                                <!-- <dt class="text-navy">Tiểu Ban:</dt>
                                <dd class="pl-4"><?= ucwords($department) ?></dd> -->
                                <dt class="text-navy">Khoa:</dt>
                                <dd class="pl-4"><?= ucwords($khoa) ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>