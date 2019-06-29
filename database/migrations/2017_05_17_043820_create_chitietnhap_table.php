<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChitietnhapTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('cusc_chitietnhap', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->unsignedBigInteger('pn_ma')->comment('Phiếu nhập # pn_ma # pn_ma # Mã phiếu nhập');
            $table->unsignedBigInteger('sp_ma')->comment('Sản phẩm # sp_ma # sp_ten # Mã sản phẩm');
            $table->unsignedTinyInteger('m_ma')->comment('Màu sắc # m_ma # m_ten # Mã màu sản phẩm, 1-Phối màu (đỏ, vàng, ...)');
            $table->unsignedSmallInteger('ctn_soLuong')->default('1')->comment('Số lượng # Số lượng sản phẩm nhập kho');
            $table->unsignedInteger('ctn_donGia')->default('1')->comment('Đơng giá nhập # Giá nhập kho của sản phẩm');
            
            $table->primary(['pn_ma', 'sp_ma', 'm_ma']);
            $table->foreign('m_ma')->references('m_ma')->on('cusc_mau')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('pn_ma')->references('pn_ma')->on('cusc_phieunhap')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('sp_ma')->references('sp_ma')->on('cusc_sanpham')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        DB::statement("ALTER TABLE `cusc_chitietnhap` comment 'Chi tiết nhập # Chi tiết phiếu nhập: sản phẩm, màu, số lượng, đơn giá, phiếu nhập'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('cusc_chitietnhap');
    }
}
