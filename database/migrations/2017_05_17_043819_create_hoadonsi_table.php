<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHoadonsiTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_hoadonsi', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('hds_ma')->comment('Mã hóa đơn bán sỉ');
            $table->string('hds_nguoiMuaHang', 100)->comment('Người mua hàng # Họ tên người mua hàng');
            $table->string('hds_tenDonVi', 200)->comment('Đơn vị # Tên đơn vị');
            $table->string('hds_diaChi', 250)->comment('Địa chỉ # Địa chỉ đơn vị');
            $table->string('hds_maSoThue', 14)->comment('Mã số thuế # Mã số thuế đơn vị');
            $table->string('hds_soTaiKhoan', 20)->nullable()->default('NULL')->comment('Số tài khoản # Số tài khoản');
            $table->unsignedSmallInteger('nv_lapHoaDon')->comment('Lập hóa đơn # nv_ma # nv_hoTen # Mã nhân viên (người lập hóa đơn)');
            $table->dateTime('hds_ngayXuatHoaDon')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm xuất # Thời điểm xuất hóa đơn');
            $table->unsignedSmallInteger('nv_thuTruong')->default('1')->comment('Thủ trưởng # nv_ma # nv_hoTen # Mã nhân viên (thủ trưởng), 1-chưa phân công');
            $table->timestamp('hds_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo hóa đơn');
            $table->timestamp('hds_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật hóa đơn gần nhất');
            $table->unsignedTinyInteger('hds_trangThai')->default('1')->comment('Trạng thái # Trạng thái hóa đơn: 1-lập hóa đơn, 2-xuất hóa đơn, 3-hủy');
            $table->unsignedBigInteger('dh_ma')->default('1')->comment('Đơn hàng # dh_ma # dh_ma # Mã đơn hàng, 1-Không xuất hóa đơn');
            $table->unsignedTinyInteger('tt_ma')->comment('Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán');
            
            $table->foreign('dh_ma')->references('dh_ma')->on('cusc_donhang')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_lapHoaDon')->references('nv_ma')->on('cusc_nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('nv_thuTruong')->references('nv_ma')->on('cusc_nhanvien')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('tt_ma')->references('tt_ma')->on('cusc_thanhtoan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_hoadonsi` comment 'Hóa đơn bán sỉ # Hóa đơn bán sỉ: sản phẩm, màu, số lượng, đơn giá, đơn hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_hoadonsi');
    }
}
