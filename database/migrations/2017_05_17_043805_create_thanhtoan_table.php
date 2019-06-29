<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThanhtoanTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_thanhtoan', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('tt_ma')->autoIncrement()->comment('Mã phương thức thanh toán');
            $table->string('tt_ten')->comment('Tên phương thức # Tên phương thức thanh toán');
            $table->text('tt_dienGiai')->comment('Thông tin # Thông tin về phương thức thanh toán');
            $table->timestamp('tt_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo phương thức thanh toán');
            $table->timestamp('tt_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật phương thức thanh toán gần nhất');
            $table->unsignedTinyInteger('tt_trangThai')->default('2')->comment('Trạng thái # Trạng thái phương thức thanh toán: 1-khóa, 2-hiển thị');
            
            $table->unique(['tt_ten']);
        });
        DB::statement("ALTER TABLE `cusc_thanhtoan` comment 'Phương thức thanh toán # Phương thức thanh toán'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_thanhtoan');
    }
}
