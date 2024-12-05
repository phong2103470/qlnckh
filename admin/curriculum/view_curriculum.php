<?php
require_once('../../config.php');
if(isset($_GET['id'])){
    $qry = $conn->query("SELECT c.*, d.ten as department from `khoa` c inner join `tieuban` d on c.matieuban = d.id where c.id = '{$_GET['id']}'");
    if($qry->num_rows > 0){
        $res = $qry->fetch_array();
        foreach($res as $k => $v){
            if(!is_numeric($k))
            $$k = $v;
        }
    }
}
?>
<style>
    #uni_modal .modal-footer{
        display:none !important;
    }
</style>
<div class="container-fluid">
    <dl>
        <dt class="text-muted">Tên khoa</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($ten) ? $ten : '' ?></dd>
        <dt class="text-muted">Thuộc tiểu ban</dt>
        <dd class='pl-4 fs-4 fw-bold'><?= isset($department) ? $department : '' ?></dd>
        <dt class="text-muted">Mô Tả</dt>
        <dd class='pl-4'>
            <p class=""><small><?= isset($mota) ? $mota : '' ?></small></p>
        </dd>
        <dt class="text-muted">Trạng Thái</dt>
        <dd class='pl-4'>
            <?php
            if(isset($status)):
                switch($status){
                    case '1':
                        echo "<span class='badge badge-success badge-pill'>Active</span>";
                        break;
                    case '0':
                        echo "<span class='badge badge-secondary badge-pill'>Inactive</span>";
                        break;
                }
            endif;
            ?>
        </dd>
    </dl>
    <div class="col-12 text-right">
        <button class="btn btn-flat btn-sm btn-dark" type="button" data-dismiss="modal"><i class="fa fa-times"></i>Đóng</button>
    </div>
</div>