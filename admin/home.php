<h1>Welcome to <?php echo $_settings->info('ten') ?></h1>
<hr class="border-info">
<div class="row">
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-th-list"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Tiểu ban</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `tieuban` where status = 1")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-scroll"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Khoa</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `khoa` where `status` = 1")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">SV thực hiện đề tài</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT distinct mssv FROM `detai`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">GV hướng dẫn đề tài</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT distinct msgv FROM `detai`")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Not Verified Students</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `sinhvien` where `status` = 0")->num_rows;
                ?>
            </span>
            </div>
        </div>
    </div>  -->
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-archive"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Đề tài đã được đăng</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `detai` where `status` = 1")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <span class="info-box-icon bg-dark elevation-1"><i class="fas fa-archive"></i></span>

            <div class="info-box-content">
            <span class="info-box-text">Đề tài đang chờ xác nhận</span>
            <span class="info-box-number text-right">
                <?php 
                    echo $conn->query("SELECT * FROM `detai` where `status` = 0")->num_rows;
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-12 col-sm-12 col-md-6 col-lg-3">
        <div class="info-box bg-light shadow">
            <!-- <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span> -->
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-coins"></i></span>
            <div class="info-box-content">
            <span class="info-box-text">Tổng kinh phí đã cấp</span>
            <span class="info-box-number text-right">
                <?php 
                    // Thực hiện truy vấn
                $result = $conn->query("SELECT sum(kinhphi) as total FROM `detai` where `status` = 1");

                // Kiểm tra kết quả và hiển thị
                if ($result) {
                    // Lấy dữ liệu từ kết quả truy vấn
                    $row = $result->fetch_assoc();
                    // Lấy tổng kinh phí từ kết quả
                    $total = $row['total'];
                    // Kiểm tra nếu tổng không rỗng
                    if ($total !== null) {
                        // Hiển thị tổng kinh phí đã được định dạng
                        echo number_format($total);
                    } else {
                        // Hiển thị thông báo nếu không có dữ liệu
                        echo "Không có dữ liệu";
                    }
                } else {
                    // Hiển thị thông báo nếu có lỗi truy vấn
                    echo "Lỗi truy vấn: " . $conn->error;
                }

                // Giải phóng kết quả
                $result->free_result();
                ?>
            </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>