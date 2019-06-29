<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChudeTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_chude', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedTinyInteger('cd_ma')->autoIncrement()->comment('Mã chủ đề');
            $table->string('cd_ten', 50)->comment('Tên chủ đề # Tên chủ đề');
            $table->timestamp('cd_taoMoi')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm tạo # Thời điểm đầu tiên tạo chủ đề');
            $table->timestamp('cd_capNhat')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('Thời điểm cập nhật # Thời điểm cập nhật chủ đề gần nhất');
            $table->tinyInteger('cd_trangThai')->default('2')->comment('Trạng thái # Trạng thái chủ đề: 1-khóa, 2-khả dụng');
            
            $table->unique(['cd_ma', 'cd_ten']);
        });
        DB::statement("ALTER TABLE `cusc_chude` comment 'Chủ đề # Chủ đề: cưới, sinh nhật, chúc mừng, chia buồn, ...'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_chude');
    }
}
