<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhachhangTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_khachhang', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('kh_ma')->comment('Mã khách hàng');
            $table->string('kh_taiKhoan', 50)->comment('Tài khoản # Tài khoản');
            $table->string('kh_matKhau', 256)->comment('Mật khẩu # Mật khẩu');
            $table->string('kh_hoTen', 100)->comment('Họ tên # Họ tên');
            $table->unsignedTinyInteger('kh_gioiTinh')->default('1')->comment('Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác');
            $table->string('kh_email', 100)->comment('Email # Email');
            $table->dateTime('kh_ngaySinh')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Ngày sinh # Ngày sinh');
            $table->string('kh_diaChi', 250)->nullable()->default('NULL')->comment('Địa chỉ # Địa chỉ');
            $table->string('kh_dienThoai', 11)->nullable()->default('NULL')->comment('Điện thoại # Điện thoại');
            $table->timestamp('kh_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo khách hàng');
            $table->timestamp('kh_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật khách hàng gần nhất');
            $table->unsignedTinyInteger('kh_trangThai')->default('3')->comment('Trạng thái # Trạng thái khách hàng: 1-khóa, 2-khả dụng, 3-chưa kích hoạt');
            
            $table->unique(['kh_taiKhoan', 'kh_email', 'kh_dienThoai']);
        });
        DB::statement("ALTER TABLE `cusc_khachhang` comment 'Khách hàng # Khách hàng'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_khachhang');
    }
}
