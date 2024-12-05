<style>
    .img-avatar{
        width:45px;
        height:45px;
        object-fit:cover;
        object-position:center center;
        border-radius:100%;
    }
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Danh sách đề tài</h3>
	</div>
	<div class="card-body">
		<div class="container-fluid">
        <div class="container-fluid">
			<table class="table table-hover table-striped">
				<colgroup>
					<col width="5%">
					<col width="9%">
					<col width="15%">
					<col width="9%">
					<col width="10%">
					<col width="15%">
					<col width="15%">
					<col width="15%">
					<col width="5%">
					<col width="4%">
				</colgroup>
				<thead>
					<tr>
						<th>STT</th>
						<!-- <th>Nga gửi</th> -->
						<th>Mã đề tài</th>
						<th>Tên Đề Tài</th>
						<th>Kinh phí</th>
						<th style="text-align: center">Năm thực hiện</th>
						<th>Chủ nhiệm</th>
						<th>GV hướng dẫn</th>
						<th>Thuộc khoa</th>
						<th style="text-align: center">Trạng thái</th>
						<th>Tác vụ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i = 1;
						$gv = $conn->query("SELECT * from `giangvien` where msgv in (SELECT msgv from `detai`)");
						$gv_arr = array_column($gv->fetch_all(MYSQLI_ASSOC),'hoten','msgv');
						$sv = $conn->query("SELECT * from `sinhvien` where id in (SELECT mssv from `detai`)");
						$sv_arr = array_column($sv->fetch_all(MYSQLI_ASSOC),'hoten','id');
						$curriculum = $conn->query("SELECT * FROM khoa where id in (SELECT makhoa from `detai`)");
						$cur_arr = array_column($curriculum->fetch_all(MYSQLI_ASSOC),'ten','id');
						$qry = $conn->query("SELECT * from `detai` order by `namthuchien` desc, `tendetai` desc ");
						while($row = $qry->fetch_assoc()):
					?>
						<tr>
							<td class="text-center"><?php echo $i++; ?></td>
							<!-- <td class=""><?php echo date("Y-m-d H:i",strtotime($row['date_created'])) ?></td> -->
							<td><?php echo ($row['madetai']) ?></td>
							<td><?php echo ucwords($row['tendetai']) ?></td>
							<td><?php echo number_format($row['kinhphi'] )?></td>
							<td style="text-align: center"><?php echo ucwords($row['namthuchien']) ?></td>
							<td><?php echo $sv_arr[$row['mssv']] ?></td>
							<td><?php echo $gv_arr[$row['msgv']] ?></td>
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
									<?php if($_settings->userdata('type') == 1): ?>
				                    <div class="dropdown-divider"></div>
				                    <a class="dropdown-item update_status" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>" data-status="<?php echo $row['status'] ?>"><span class="fa fa-check text-dark"></span> Cập nhật trạng thái</a>
									<div class="dropdown-divider"></div>
				                    <a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Xóa</a>
									<?php endif; ?>
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
<script>
	$(document).ready(function(){
		$('.verified').click(function(){
			_conf("Bạn có chắc chắn xác không?","verified",[$(this).attr('data-id')])
		})
		$('.delete_data').click(function(){
			_conf("Bạn có chắc chắn xóa đề tài này vĩnh viễn không?","delete_archive",[$(this).attr('data-id')])
		})
		$('.update_status').click(function(){
            uni_modal("Cập nhật trạng thái","archives/update_status.php?id="+$(this).attr('data-id')+"&status="+$(this).attr('data-status'))
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