<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMauSanphamTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_mau_sanpham', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('sp_ma')->comment('Màu sắc # m_ma # m_ten # Mã sản phẩm');
            $table->unsignedTinyInteger('m_ma')->comment('Sản phẩm # sp_ma # sp_ten # Mã màu sản phẩm');
            $table->unsignedSmallInteger('msp_soluong')->default('0')->comment('Số lượng # Số lượng sản phẩm tương ứng với màu');
            
            $table->primary(['sp_ma', 'm_ma']);
            $table->foreign('m_ma')->references('m_ma')->on('cusc_mau')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_mau_sanpham` comment 'Số lượng sản phẩm theo màu # Số lượng sản phẩm tương ứng với các màu'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_mau_sanpham');
    }
}
