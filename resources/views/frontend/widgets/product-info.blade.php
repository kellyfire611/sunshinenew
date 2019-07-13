<div class="container">
    <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
        <button class="how-pos3 hov3 trans-04 js-hide-modal" data-sp-ma="{{ $sp->sp_ma }}">
            <img src="{{ asset('themes/cozastore/images/icons/icon-close.png') }}" alt="CLOSE">
        </button>

        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                        <div class="slick3 gallery-lb">
                            <div class="item-slick3" data-thumb="{{ asset('storage/photos/' . $sp->sp_hinh) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('storage/photos/' . $sp->sp_hinh) }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/photos/' . $sp->sp_hinh) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>

                            <?php
                            // Lọc các hình ảnh liên quan đến sản phẩm
                            $id = $sp->sp_ma;
                            $hinhanhlienquan = $hinhanhlienquan->toArray();
                            $filteredItems = array_filter($hinhanhlienquan, function ($item) use ($id) {
                                return $item->sp_ma == $id;
                            });
                            ?>
                            @foreach($filteredItems as $hinhanh)
                            <div class="item-slick3" data-thumb="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}" alt="IMG-PRODUCT">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04" href="{{ asset('storage/photos/' . $hinhanh->ha_ten) }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        <a href="{{ route('frontend.productDetail', ['id' => $sp->sp_ma]) }}">{{ $sp->sp_ten }}</a>
                    </h4>

                    <span class="mtext-106 cl2">
                        {{ $sp->sp_giaBan }}
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        {{ $sp->sp_thongTin }}
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-203 flex-c-m respon6">
                                Màu sắc
                            </div>

                            <div class="size-204 respon6-next">
                                <div class="rs1-select2 bor8 bg0">
                                    <select class="js-select2" name="time">
                                        <option>Chọn màu</option>
                                        @foreach($danhsachmau as $mau)
                                        <option value="{{ $mau->m_ma }}">{{ $mau->m_ten }}</option>
                                        @endforeach
                                    </select>
                                    <div class="dropDownSelect2"></div>
                                </div>
                            </div>
                        </div>

                        <div class="flex-w flex-r-m p-b-10">
                            <div class="size-204 flex-w flex-m respon6-next">
                                <ngcart-addtocart template-url="{{ asset('vendor/ngCart/template/ngCart/addtocart.html') }}" id="{{ $sp->sp_ma }}" name="{{ $sp->sp_ten }}" price="{{ $sp->sp_giaBan }}" quantity="1" quantity-max="30" data="{ sp_hinh_url: '{{ asset('storage/photos/' . $sp->sp_hinh) }}' }">Thêm vào giỏ hàng</ngcart-addtocart>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="flex-w flex-m p-l-100 p-t-40 respon7">
                        <div class="flex-m bor9 p-r-10 m-r-11">
                            <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 js-addwish-detail tooltip100" data-tooltip="Add to Wishlist">
                                <i class="zmdi zmdi-favorite"></i>
                            </a>
                        </div>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Facebook">
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="#" class="fs-14 cl3 hov-cl1 trans-04 lh-10 p-lr-5 p-tb-2 m-r-8 tooltip100" data-tooltip="Google Plus">
                            <i class="fa fa-google-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>