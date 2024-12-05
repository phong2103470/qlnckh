<?php 
$user = $conn->query("SELECT s.*,d.ten as department, c.ten as curriculum FROM sinhvien s inner join tieuban d on s.matieuban = d.id inner join khoa c on s.makhoa = c.id where s.id ='{$_settings->userdata('id')}'");
foreach($user->fetch_array() as $k =>$v){
    $$k = $v;
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
            <h5 class="card-title">Cập nhật thông tin</h5>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <form action="" id="update-form">
                    <input type="hidden" name="id" value="<?= $_settings->userdata('id') ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="hoten" class="control-label text-navy">Họ Tên</label>
                                <input type="text" name="hoten" id="hoten" placeholder="Nhập họ tên" class="form-control form-control-border" value="<?= isset($hoten) ?$hoten : "" ?>" required>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="mssv" class="control-label text-navy">MSSV</label>
                                <input type="text" name="mssv" id="mssv" placeholder="Nhập MSSV" class="form-control form-control-border" value="<?= isset($mssv) ?$mssv : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nganh_khoa" class="control-label text-navy">Ngành-Khóa</label>
                                <input type="text" name="nganh_khoa" id="nganh_khoa" autofocus placeholder="Nhập ngành-khóa" class="form-control form-control-border" value="<?= isset($nganh_khoa) ?$nganh_khoa : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-auto">
                        <label for="" class="control-label text-navy">Giới Tính</label>
                        </div>
                        <div class="form-group col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="genderMale" name="gioitinh" value="Nam" required  <?= isset($gioitinh) && $gioitinh == "Nam" ? "checked" : "" ?>>
                                <label for="genderMale" class="custom-control-label">Nam</label>
                            </div>
                        </div>
                        <div class="form-group col-auto">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="genderFemale" name="gioitinh" value="Nữ" <?= isset($gioitinh) && $gioitinh == "Nữ" ? "checked" : "" ?>>
                                <label for="genderFemale" class="custom-control-label">Nữ</label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="email" class="control-label text-navy">Email</label>
                                <input type="email" name="email" id="email" placeholder="Email" class="form-control form-control-border" required value="<?= isset($email) ?$email : "" ?>">
                            </div>
                            <div class="form-group">
                                <label for="password" class="control-label text-navy">Mật khẩu mới</label>
                                <input type="password" name="password" id="password" placeholder="Nhập mật khẩu" class="form-control form-control-border">
                            </div>

                            <div class="form-group">
                                <label for="cpassword" class="control-label text-navy">Xác nhận lại mật khẩu</label>
                                <input type="password" id="cpassword" placeholder="Nhập lại mật khẩu" class="form-control form-control-border">
                            </div>
                            <small class='text-muted'>Để trống Mật khẩu mới và Xác nhận lại mật khẩu mới nếu bạn không muốn thay đổi mật khẩu của mình.</small>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="img" class="control-label text-muted">Chọn ảnh</label>
                                <input type="file" id="img" name="img" class="form-control form-control-border" accept="image/png,image/jpeg" onchange="displayImg(this,$(this))">
                            </div>

                            <div class="form-group text-center">
                                <img src="<?= validate_image(isset($avatar) ? $avatar : "") ?>" alt="My Avatar" id="cimg" class="img-fluid student-img bg-gradient-dark border">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="oldpassword">Nhập mật khẩu hiện tại</label>
                                <input type="password" name="oldpassword" id="oldpassword" placeholder="Nhập mật khẩu hiện tại của bạn" class="form-control form-control-border" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button class="btn btn-default bg-navy btn-flat"> Cập nhật</button>
                                <a href="./?page=profile" class="btn btn-light border btn-flat"> Hủy</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function displayImg(input,_this) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        reader.onload = function (e) {
	        	$('#cimg').attr('src', e.target.result);
	        }

	        reader.readAsDataURL(input.files[0]);
	    }else{
            $('#cimg').attr('src', "<?= validate_image(isset($avatar) ? $avatar : "") ?>");
        }
	}
    $(function(){
        // Update Form Submit
        $('#update-form').submit(function(e){
            e.preventDefault()
            var _this = $(this)
                $(".pop-msg").remove()
                $('#password, #cpassword').removeClass("is-invalid")
            var el = $("<div>")
                el.addClass("alert pop-msg my-2")
                el.hide()
            if($("#password").val() != $("#cpassword").val()){
                el.addClass("alert-danger")
                el.text("Password does not match.")
                $('#password, #cpassword').addClass("is-invalid")
                $('#cpassword').after(el)
                el.show('slow')
                return false;
            }
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Users.php?f=save_student",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType:'json',
                error:err=>{
                    console.log(err)
                    el.text("Đã xảy ra lỗi khi lưu dữ liệu")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('slow')
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href= "./?page=profile"
                    }else if(!!resp.msg){
                        el.text(resp.msg)
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }else{
                        el.text("Đã xảy ra lỗi khi lưu dữ liệu")
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }
                    end_loader();
                    $('html, body').animate({scrollTop: 0},'fast')
                }
            })
        })
    })
</script>