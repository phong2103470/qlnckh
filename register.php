<?php require_once('./config.php') ?>
<!DOCTYPE html>
<html lang="en" class="" style="height: auto;">
 <?php require_once('inc/header.php') ?>
<body class="hold-transition ">
  <script>
    start_loader()
  </script>
  <style>
    html, body{
      height:calc(100%) !important;
      width:calc(100%) !important;
    }
    body{
      background-image: url("<?php echo validate_image($_settings->info('cover')) ?>");
      background-size:cover;
      background-repeat:no-repeat;
    }
    .title{
        /* text-shadow: 2px 2px black */
        font-size: 5em !important;
        color: rgb(102, 178, 255) !important;
        text-shadow: 4px 5px 3px #68717a !important;
        text-align: center !important;
        width: 100% !important;
    }
    /* #login{
      flex-direction:column !important
    } */
    #login{
        direction:rtl
    }
    #login > *{
        direction:ltr
    }
    #logo-img{
        height:150px;
        width:150px;
        object-fit:scale-down;
        object-position:center center;
        border-radius:100%;
    }
    /* #login .col-7,#login .col-5{
      width: 100% !important;
      max-width:unset !important
    } */
    
  </style>
<div class="h-100 d-flex  align-items-center w-100" id="login">
    <div class="col-7 h-100 d-flex align-items-center justify-content-center">
      <div class="w-100">
        <center><img src="<?= validate_image($_settings->info('logo')) ?>" alt="" id="logo-img"></center>
        <h1 class="text-center py-5 title"><b><?php echo $_settings->info('ten') ?></b></h1>
      </div>
      
    </div>
    <div class="col-5 h-100 bg-gradient bg-navy">
        <div class="w-100 d-flex justify-content-center align-items-center h-100 text-navy">
            <div class="card card-outline card-primary rounded-0 shadow col-lg-10 col-md-10 col-sm-5">
                <div class="card-header">
                    <h5 class="card-title text-center text-dark"><b>ĐĂNG KÝ</b></h5>
                </div>
                <div class="card-body">
                    <form action="" id="registration-form">
                        <input type="hidden" name="id">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="hoten" id="hoten" placeholder="Nhập Họ Tên" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="mssv" id="mssv" placeholder="Nhập MSSV" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class = "row">
                        <div class="col-lg-6">
                                <div class="form-group">
                                    <input type="text" name="nganh_khoa" id="nganh_khoa" autofocus placeholder="Nhập Ngành-Khóa" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="genderMale" name="gioitinh" value="Nam" required checked>
                                    <label for="genderMale" class="custom-control-label">Nam</label>
                                </div>
                            </div>
                            <div class="form-group col-auto">
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="genderFemale" name="gioitinh" value="Nữ">
                                    <label for="genderFemale" class="custom-control-label">Nữ</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <span class="text-navy"><small>Tiểu Ban</small></span>
                                    <select name="matieuban" id="matieuban" class="form-control form-control-border select2" data-placeholder="Chọn Tiêu Ban" required>
                                        <option value="" disabled></option>
                                        <?php 
                                        $department = $conn->query("SELECT * FROM `tieuban` where status = 1 order by `ten` asc");
                                        while($row = $department->fetch_assoc()):
                                        ?>
                                        <option value="<?= $row['id'] ?>"><?= ucwords($row['ten']) ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <span class="text-navy"><small>Khoa</small></span>
                                    <select name="makhoa" id="makhoa" class="form-control form-control-border select2" data-placeholder="Chọn Khoa" required>
                                        <option value="" disabled selected>Select Deparment First</option>
                                        <?php 
                                        $curriculum = $conn->query("SELECT * FROM `khoa` where status = 1 order by `ten` asc");
                                        $cur_arr = [];
                                        while($row = $curriculum->fetch_assoc()){
                                            $row['ten'] = ucwords($row['ten']);
                                            // Chú ý
                                            $cur_arr[$row['matieuban']][] = $row;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email" name="email" id="email" placeholder="Nhập Email" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" placeholder="Nhập Mật Khẩu" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="password" id="cpassword" placeholder="Nhập Lại Mật Khẩu" class="form-control form-control-border" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group text-right">
                                    <button class="btn btn-default bg-navy btn-flat"> Đăng Ký</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url ?>plugins/select2/js/select2.full.min.js"></script>

<script>
    var cur_arr = $.parseJSON('<?= json_encode($cur_arr) ?>');
  $(document).ready(function(){
    end_loader();
    $('.select2').select2({
        width:"100%"
    })
    $('#matieuban').change(function(){
        var did = $(this).val()
        $('#makhoa').html("")
        if(!!cur_arr[did]){
            Object.keys(cur_arr[did]).map(k=>{
                var opt = $("<option>")
                    opt.attr('value',cur_arr[did][k].id)
                    opt.text(cur_arr[did][k].ten)
                $('#makhoa').append(opt)
            })
        }
        $('#makhoa').trigger("change")
    })

    // Registration Form Submit
    $('#registration-form').submit(function(e){
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
            method:'POST',
            data:_this.serialize(),
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
                    location.href= "./login.php"
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
</body>
</html>