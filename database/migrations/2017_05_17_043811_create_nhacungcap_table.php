<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNhacungcapTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_nhacungcap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('ncc_ma')->comment('Mã nhà cung cấp, 1-Tự tạo');
            $table->string('ncc_ten', 100)->comment('Tên nhà cung cấp # Tên nhà cung cấp');
            $table->string('ncc_daiDien', 100)->comment('Đại diện # Người đại diện');
            $table->string('ncc_diaChi', 250)->comment('Địa chỉ # Địa chỉ');
            $table->string('ncc_dienThoai', 11)->comment('Điện thoại # Điện thoại');
            $table->string('ncc_email', 100)->comment('Email # Email');
            $table->timestamp('ncc_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo nhà cung cấp');
            $table->timestamp('ncc_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật nhà cung cấp gần nhất');
            $table->tinyInteger('ncc_trangThai')->default('2')->comment('Trạng thái # Trạng thái nhà cung cấp: 1-khóa, 2-khả dụng');
            $table->unsignedSmallInteger('xx_ma')->comment('Xuất xứ # xx_ma # xx_ten # Mã xuất xứ');
            
            $table->unique(['ncc_ten', 'ncc_dienThoai', 'ncc_email']);
            $table->foreign('xx_ma')->references('xx_ma')->on('cusc_xuatxu')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_nhacungcap` comment 'Nhà cung cấp # Nhà cung cấp hoa'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_nhacungcap');
    }
}
