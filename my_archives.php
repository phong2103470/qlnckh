<div class="content py-3">
    <div class="container-fluid">
        <div class="card card-outline card-primary shadow rounded-0">
            <div class="card-header rounded-0">
                <h4 class="card-title">Đề tài của tôi</h4>
            </div>
            <div class="card-body rounded-0">
                <div class="container-fluid">
                    <table class="table table-hover table-striped">
                        <colgroup>
                            <col width="5%">
                            <col width="15%">
                            <col width="15%">
                            <col width="20%">
                            <col width="20%">
                            <col width="10%">
                            <col width="10%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Ngày gửi</th>
                                <th>Mã đề tài</th>
                                <th>Tên đề tài</th>
                                <th>Khoa</th>
                                <th>Trạng thái</th>
                                <th>Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i = 1;
                                $curriculum = $conn->query("SELECT * FROM khoa where id in (SELECT makhoa from `detai` where mssv = '{$_settings->userdata('id')}' )");
                                $cur_arr = array_column($curriculum->fetch_all(MYSQLI_ASSOC),'ten','id');
                                $qry = $conn->query("SELECT * from `detai` where mssv = '{$_settings->userdata('id')}' order by unix_timestamp(`date_created`) asc ");
                                while($row = $qry->fetch_assoc()):
                            ?>
                                <tr>
                                    <td class="text-center"><?php echo $i++; ?></td>
                                    <td class=""><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td>
                                    <td><?php echo ($row['madetai']) ?></td>
                                    <td><?php echo ucwords($row['tendetai']) ?></td>
                                    <td><?php echo $cur_arr[$row['makhoa']] ?></td>
                                    <td class="text-center">
                                        <?php
                                            switch($row['status']){
                                                case '1':
                                                    echo "<span class='badge badge-success badge-pill'>Published</span>";
                                                    break;
                                                case '0':
                                                    echo "<span class='badge badge-secondary badge-pill'>Not Published</span>";
                                                    break;
                                            }
                                        ?>
                                    </td>
                                    <td align="center">
                                        <button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
                                                Tác vụ
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a class="dropdown-item" href="<?= base_url ?>/?page=view_archive&id=<?php echo $row['id'] ?>" target="_blank"><span class="fa fa-external-link-alt text-gray"></span> Xem</a>
                                            <div class="dropdown-divider"></div>
                                            <!-- <a class="dropdown-item" href="./?page=submit-archive&id=<?= isset($id) ? $id : "" ?>" class="btn btn-flat btn-default bg-navy btn-sm"><i class="fa fa-edit"></i> Sửa</a> -->
                                            <a class="dropdown-item" href="<?= base_url ?>/?page=submit-archive&id=<?php echo $row['id'] ?>" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit"></span> Sửa</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Xóa</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){
        $('.delete_data').click(function(){
			_conf("Bạn có chắc chắn xóa đề tài này vĩnh viễn không?","delete_archive",[$(this).attr('data-id')])
		})
        $('.table td,.table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
            columnDefs: [
                { orderable: false, targets: 5 }
            ],
        });
    })
    function delete_archive($id){
		start_loader();
		$.ajax({
			url:_base_url_+"classes/Master.php?f=delete_archive",
			method:"POST",
			data:{id: $id},
			dataType:"json",
			error:err=>{
				console.log(err)
				alert_toast("An error occured.",'error');
				end_loader();
			},
			success:function(resp){
				if(typeof resp== 'object' && resp.status == 'success'){
					location.reload();
				}else{
					alert_toast("An error occured.",'error');
					end_loader();
				}
			}
		})
	}

</script>