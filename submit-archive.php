<?php 
if(isset($_GET['id']) && $_GET['id'] > 0){
    $qry = $conn->query("SELECT * FROM `detai` where id = '{$_GET['id']}'");
    if($qry->num_rows){
        foreach($qry->fetch_array() as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
    if(isset($student_id)){
        if($student_id != $_settings->userdata('id')){
            echo "<script> alert('You don\'t have an access to this page'); location.replace('./'); </script>";
        }
    }
}
?>
<style>
    .banner-img{
		object-fit:scale-down;
		object-position:center center;
        height:30vh;
        width:calc(100%);
	}
</style>
<div class="content py-4">
    <div class="card card-outline card-primary shadow rounded-0">
        <div class="card-header rounded-0">
            <!-- <h5 class="card-title"><?= isset($id) ? "Update Archive-{$madetai} Details" : "Submit Project" ?></h5> -->
            <h5 class="card-title"><?= isset($id) ? "Update Archive" : "Nộp Đề Tài" ?></h5>
        </div>
        <div class="card-body rounded-0">
            <div class="container-fluid">
                <form action="" id="archive-form">
                    <input type="hidden" name="id" value="<?= isset($id) ? $id : "" ?>">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="madetai" class="control-label text-navy">Mã Đề Tài</label>
                                <input type="text" name="madetai" id="madetai" autofocus placeholder="Mã Đề Tài" class="form-control form-control-border" value="<?= isset($madetai) ?$madetai : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tendetai" class="control-label text-navy">Tên Đề Tài</label>
                                <input type="text" name="tendetai" id="tendetai" autofocus placeholder="Tên Đề Tài" class="form-control form-control-border" value="<?= isset($tendetai) ?$tendetai : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="msgv" class="control-label text-navy">Giảng Viên Hướng Dẫn</label>
                                <input type="text" name="msgv" id="msgv" autofocus placeholder="Nhập mã số giảng viên" class="form-control form-control-border" value="<?= isset($msgv) ?$msgv : "" ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
            <div class="form-group">
                                <label for="namthuchien" class="control-label text-navy">Năm</label>
                                <select name="namthuchien" id="namthuchien" class="form-control form-control-border" required>
                                    <?php 
                                        for($i= 0;$i < 51; $i++):
                                    ?>
                                    <option <?= isset($namthuchien) && $namthuchien == date("Y",strtotime(date("Y")." -{$i} years")) ? "selected" : "" ?>><?= date("Y",strtotime(date("Y")." -{$i} years")) ?></option>
                                    <?php endfor; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kinhphi" class="control-label text-navy">Kinh Phí Thực Hiện</label>
                                <input type="number" min="0" name="kinhphi" id="kinhphi" autofocus placeholder="Kinh phí thực hiện" class="form-control form-control-border" value="<?= isset($kinhphi) ? $kinhphi : "" ?>" required>
                            </div>
                        </div>
                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var kinhphiInput = document.getElementById("kinhphi");

                                kinhphiInput.addEventListener("input", function() {
                                    var value = this.value.trim();

                                    // Kiểm tra xem giá trị nhập vào có phải là số không
                                    if (isNaN(value)) {
                                        this.value = ""; // Xóa giá trị nhập nếu không phải là số
                                    }
                                });
                            });
                        </script>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="motadetai" class="control-label text-navy">Mô Tả Đề Tài</label>
                                <textarea rows="3" name="motadetai" id="motadetai" placeholder="abstract" class="form-control form-control-border summernote" required><?= isset($motadetai) ? html_entity_decode($motadetai) : "" ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="thanhvien" class="control-label text-navy">Thành Viên</label>
                                <textarea rows="3" name="thanhvien" id="thanhvien" placeholder="members" class="form-control form-control-border summernote-list-only"><?= isset($thanhvien) ? html_entity_decode($thanhvien) : "" ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="img" class="control-label text-muted">Ảnh</label>
                                <input type="file" id="img" name="img" class="form-control form-control-border" accept="image/png,image/jpeg" onchange="displayImg(this,$(this))" <?= !isset($id) ? "required" : "" ?>>
                            </div>
<div class="form-group text-center">
                                <img src="<?= validate_image(isset($banner_path) ? $banner_path : "") ?>" alt="My Avatar" id="cimg" class="img-fluid banner-img bg-gradient-dark border">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="pdf" class="control-label text-muted">File kết quả (PDF)</label>
                                <input type="file" id="pdf" name="pdf" class="form-control form-control-border" accept="application/pdf" <?= !isset($id) ? "required" : "" ?>>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group text-center">
                                <button class="btn btn-default bg-navy btn-flat"> Nộp đề tài</button>
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
        $('.summernote').summernote({
            height: 200,
            toolbar: [
                [ 'style', [ 'style' ] ],
                [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ],
                [ 'fontsize', [ 'fontsize' ] ],
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
                [ 'table', [ 'table' ] ],
                ['insert', ['link', 'picture']],
                [ 'view', [ 'undo', 'redo', 'help' ] ]
            ]
        })
        $('.summernote-list-only').summernote({
            height: 200,
            toolbar: [
                [ 'font', [ 'bold', 'italic', 'clear'] ],
                [ 'fontname', [ 'fontname' ] ]
                [ 'color', [ 'color' ] ],
                [ 'para', [ 'ol', 'ul' ] ],
                [ 'view', [ 'undo', 'redo', 'help' ] ]
            ]
        })
        // Archive Form Submit
        $('#archive-form').submit(function(e){
            e.preventDefault()
            var _this = $(this)
                $(".pop-msg").remove()
            var el = $("<div>")
el.addClass("alert pop-msg my-2")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_archive",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType:'json',
                error:err=>{
                    console.log(err)
                    el.text("An error occured while saving the data")
                    el.addClass("alert-danger")
                    _this.prepend(el)
                    el.show('slow')
                    end_loader()
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        location.href= "./?page=projects"
                        // location.href= "./?page=view_archive&id="+resp.id
                    }else if(!!resp.msg){
                        el.text(resp.msg)
                        el.addClass("alert-danger")
                        _this.prepend(el)
                        el.show('show')
                    }else{
                        el.text("An error occured while saving the data")
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