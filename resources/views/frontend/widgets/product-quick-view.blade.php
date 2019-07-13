<div class="wrap-modal1 js-modal-{{ $sp->sp_ma }} p-t-60 p-b-20">
    <div class="overlay-modal1 js-hide-modal" data-sp-ma="{{ $sp->sp_ma }}"></div>
    <!-- Product info -->
    @include('frontend.widgets.product-info', ['sp' => $sp, 'hinhanhlienquan' => $danhsachhinhanhlienquan])
</div>