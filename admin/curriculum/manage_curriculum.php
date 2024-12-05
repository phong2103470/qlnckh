<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT * FROM `khoa` where id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>

<div class="container-fluid">
    <form action="" id="curriculum-form">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="form-group">
            <label for="ten" class="control-label">Tên Khoa</label>
            <input type="text" name="ten" id="ten" class="form-control form-control-border" placeholder="Tên khoa" value ="<?php echo isset($ten) ? $ten : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="matieuban" class="control-label">Tiểu Ban</label>
            <select name="matieuban" id="matieuban" class="form-control form-control-border" required data-placeholder="Chọn tiểu ban">
                <option <?= !isset($matieuaban) == 1 ? "selected" :"" ?>></option>
                <?php 
                $department = $conn->query("SELECT * FROM `tieuban` where `status` = 1 ".(isset($matieuban) ? "OR id = '{$matieuban}'" : "")." order by `ten` asc");
                while($row = $department->fetch_assoc()):
                ?>
                <option value="<?= $row['id'] ?>" <?= isset($matieuban) && $matieuban == $row['id'] ? "selected" : "" ?>><?= ucwords($row['ten']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="mota" class="control-label">Mô Tả</label>
            <textarea rows="3" name="mota" id="mota" class="form-control form-control-border" placeholder="Mô tả." required><?php echo isset($mota) ? $mota : '' ?></textarea>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Trạng Thái</label>
            <select name="status" id="status" class="form-control form-control-border" required>
                <option value="1" <?= isset($status) && $status == 1 ? "selected" :"" ?>>Active</option>
                <option value="0" <?= isset($status) && $status == 0 ? "selected" :"" ?>>Inactive</option>
            </select>
        </div>
    </form>
</div>
<script>
    $(function(){
        $('#matieuban').select2({
            width:"100%",
            dropdownParent: $("#uni_modal")
        })
        $('#uni_modal #curriculum-form').submit(function(e){
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
                el.addClass("pop-msg alert")
                el.hide()
            start_loader();
            $.ajax({
                url:_base_url_+"classes/Master.php?f=save_curriculum",
				data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
				error:err=>{
					console.log(err)
					alert_toast("Đã xảy ra lỗi",'error');
					end_loader();
				},
                success:function(resp){
                    if(resp.status == 'success'){
                        location.reload();
                    }else if(!!resp.msg){
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    }else{
                        el.addClass("alert-danger")
                        el.text("Đã xảy ra lỗi không rõ nguyên nhân.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    end_loader();
                }
            })
        })
    })
</script>