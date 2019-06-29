<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateXuatxuTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_xuatxu', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->smallIncrements('xx_ma')->comment('Mã xuất xứ');
            $table->string('xx_ten', 100)->comment('Xuất xứ # Xuất xứ của sản phẩm');
            $table->timestamp('xx_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo xuất xứ');
            $table->timestamp('xx_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật xuất xứ gần nhất');
            $table->tinyInteger('xx_trangThai')->default('2')->comment('Trạng thái # Trạng thái xuất xứ: 1-khóa, 2-khả dụng');
            
            $table->unique(['xx_ten']);
        });
        DB::statement("ALTER TABLE `cusc_xuatxu` comment 'Xuất xứ # Xuất xứ của sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_xuatxu');
    }
}
