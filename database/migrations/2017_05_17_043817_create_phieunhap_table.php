<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhieunhapTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_phieunhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('pn_ma')->comment('Mã phiếu nhập');
            $table->string('pn_nguoiGiao', 100)->comment('Người giao hàng # Người giao hàng');
            $table->string('pn_soHoaDon', 15)->comment('Số hóa đơn # Số hóa đơn');
            $table->dateTime('pn_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày xuất hóa đơn # Ngày xuất hóa đơn');
            $table->text('pn_ghiChu')->comment('Ghi chú # Ghi chú phiếu nhập');
            $table->unsignedSmallInteger('nv_nguoiLapPhieu')->comment('Lập phiếu # Mã nhân viên (người lập phiếu nhập)');
            $table->dateTime('pn_ngayLapPhieu')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm lập phiếu # Thời điểm lập phiếu nhập kho');
            $table->unsignedSmallInteger('nv_keToan')->default('1')->comment('Xác nhận # Mã nhân viên (kế toán trưởng), 1-chưa phân công');
            $table->dateTime('pn_ngayXacNhan')->nullable()->default(NULL)->comment('Thời điểm xác nhận # Thời điểm xác nhận thanh toán phiếu nhập kho');
            $table->unsignedSmallInteger('nv_thuKho')->default('1')->comment('Thủ kho # Mã nhân viên (thủ kho/giám đốc), 1-chưa phân công');
            $table->dateTime('pn_ngayNhapKho')->nullable()->default(NULL)->comment('Ngày nhập kho # Ngày nhập kho');
            $table->timestamp('pn_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo phiếu nhập');
            $table->timestamp('pn_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật phiếu nhập gần nhất');
            $table->tinyInteger('pn_trangThai')->default('2')->comment('Trạng thái # Trạng thái phiếu nhập sản phẩm: 1-khóa, 2-lập phiếu, 3-thanh toán, 4-nhập kho');
            $table->unsignedSmallInteger('ncc_ma')->comment('Nhà cung cấp # ncc_ma # ncc_ten # Mã nhà cung cấp');
            
            $table->unique(['pn_soHoaDon']);
            $table->foreign('ncc_ma')->references('ncc_ma')->on('cusc_nhacungcap')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_keToan')->references('nv_ma')->on('cusc_nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_nguoiLapPhieu')->references('nv_ma')->on('cusc_nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_thuKho')->references('nv_ma')->on('cusc_nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_phieunhap` comment 'Phiếu nhập # Phiếu nhập'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_phieunhap');
    }
}
