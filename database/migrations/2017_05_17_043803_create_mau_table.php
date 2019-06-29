<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_mau', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('m_ma')->autoIncrement()->comment('Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)');
            $table->string('m_ten', 50)->comment('Tên màu # Tên màu sản phẩm');
            $table->timestamp('m_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo màu');
            $table->timestamp('m_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật màu gần nhất');
            $table->tinyInteger('m_trangThai')->default('2')->comment('Trạng thái # Trạng thái màu sản phẩm: 1-khóa, 2-khả dụng');
            
            $table->unique(['m_ten']);
        });
        DB::statement("ALTER TABLE `cusc_mau` comment 'Màu sắc # Màu sản phẩm'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_mau');
    }
}
